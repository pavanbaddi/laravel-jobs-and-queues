
<div id="auth-container" >

    <style>
        label{
            color: #000000;
        }
        #auth-container{
            background: #999;
            padding: 15px 0;
            height: 100vh;
        }

        #auth-container > .wrapper{
            width: 40%;
            background: #fff;
            margin: auto;
            padding: 15px 10px;
        }

        .form-fields-container .row{
            margin-bottom: 25px;
        }
    </style>
    
    <div class="row wrapper">
        @if($wants_to_register == 0 && $wants_to_login == 0)
            <div class="col-md-12 text-center"  >   
                <button type="button" class="btn btn-primary" wire:click="show('login')" >Login</button> 
                <button type="button" class="btn btn-success" wire:click="show('register')" >Register</button>
            </div>
        @else

            @if($wants_to_login)
                <div class="col-md-12">
                    <a href="javascript::void" wire:click="show('')" >Go back to Home Page</a>
                    <h2 class="text-center" >Login</h2>
                </div>

                <div class="col-md-12 role-choice-wrapper">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                
                <div class="col-md-12 form-fields-container">
                    <form wire:submit.prevent="verify" method="post">
                        <div class="row col-md-12">
                            <label for="">Email</label>
                            <input type="text" class="form-control" wire:model="login.email" > 
                            @if(isset($validation_errors["email"]))
                                @foreach($validation_errors["email"] as $k => $v)
                                <label for="" class="error">{{ $v }}</label>
                                @endforeach
                            @endif
                        </div>

                        <div class="row col-md-12">
                            <label for="">Password</label>
                            <input type="password" class="form-control" wire:model="login.password" > 
                            @if(isset($validation_errors["password"]))
                                @foreach($validation_errors["password"] as $k => $v)
                                <label for="" class="error">{{ $v }}</label>
                                @endforeach
                            @endif
                        </div>

                        <div class="row col-md-12">
                            <input type="submit" class="btn btn-success" value="Login" > 
                        </div>
                    </form>
                </div>                    
            @endif

            @if($wants_to_register)
                <form class="col-md-12" wire:submit.prevent="save" method="post">
                    <div class="col-md-12">
                        <a href="javascript::void" wire:click="show('')" >Go back to Home Page</a>
                        <h2 class="text-center" >Registration</h2>
                    </div>

                    <div class="col-md-12 role-choice-wrapper">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{ session('error') }}
                            </div>
                        @endif


                        <label for="">Select Role</label>
                        <select class="form-control" wire:model="user.role">
                            <option value="teacher">Register as Teacher</option>
                            <option value="student">Register as Student</option>
                        </select>
                        @if(isset($validation_errors["role"]))
                                @foreach($validation_errors["role"] as $k => $v)
                                    <label for="" class="error">{{ $v }}</label>
                                @endforeach
                            @endif
                        <hr>

                    </div>

                    <div class="col-md-12 form-fields-container">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" wire:model="user.first_name" > 
                                @if(isset($validation_errors["first_name"]))
                                    @foreach($validation_errors["first_name"] as $k => $v)
                                    <label for="" class="error">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" wire:model="user.last_name" > 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" wire:model="user.email" > 
                                @if(isset($validation_errors["email"]))
                                    @foreach($validation_errors["email"] as $k => $v)
                                    <label for="" class="error">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="">DOB</label>
                                <input type="date" class="form-control"  wire:model="user.date_of_birth" > 
                                @if(isset($validation_errors["date_of_birth"]))
                                    @foreach($validation_errors["date_of_birth"] as $k => $v)
                                    <label for="" class="error">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        @if($user["role"]=="student")
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Course</label>
                                <select class="form-control" wire:model="user.course" >
                                    <option value="">Choose one</option>
                                    <option value="mtech">M.Tech</option>
                                    <option value="be">BE</option>
                                    <option value="bca">BCA</option>
                                    <option value="bsc">BSc</option>
                                </select>
                                @if(isset($validation_errors["course"]))
                                    @foreach($validation_errors["course"] as $k => $v)
                                    <label for="" class="error">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="">Semester</label>
                                <input type="text" class="form-control" wire:model="user.sem" > 
                                @if(isset($validation_errors["sem"]))
                                    @foreach($validation_errors["sem"] as $k => $v)
                                    <label for="" class="error">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @endif

                        <div class="row">

                            <div class="col-md-6">
                                <label for="">Parent Mobile No</label>
                                <input type="text" class="form-control" wire:model="user.parent_mobile_no" > 
                                @if(isset($validation_errors["parent_mobile_no"]))
                                    @foreach($validation_errors["parent_mobile_no"] as $k => $v)
                                    <label for="" class="error">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="">Mobile No</label>
                                <input type="text" class="form-control" wire:model="user.mobile_no" > 
                                @if(isset($validation_errors["mobile_no"]))
                                    @foreach($validation_errors["mobile_no"] as $k => $v)
                                    <label for="" class="error">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Password</label>
                                <input type="password" class="form-control"  wire:model="user.password" > 
                                @if(isset($validation_errors["password"]))
                                    @foreach($validation_errors["password"] as $k => $v)
                                    <label for="" class="error">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" wire:model="user.confirm_password" > 
                                @if(isset($validation_errors["confirm_password"]))
                                    @foreach($validation_errors["confirm_password"] as $k => $v)
                                    <label for="" class="error">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="col-md-12"> 
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary"  value="Register" > 
                        </div>
                    </div>
                </form>
            @endif
        @endif
    </div>

</div>