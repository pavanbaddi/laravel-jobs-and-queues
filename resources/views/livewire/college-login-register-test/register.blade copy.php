<style>
label{
    color: #000000;
}
#register-container{
    background: #999;
    padding: 15px 0;
    height: 100vh;
}

#register-container > .wrapper{
    width: 40%;
    background: #fff;
    margin: auto;
    padding: 15px 10px;
}

.form-fields-container > .row{
    margin-bottom: 25px;
}
</style>

<div class="" id="register-container" >
    
    <div class="row wrapper">

        <div class="col-md-12">
            <h2 class="text-center" >Registration</h2>
        </div>

        <div class="col-md-12 role-choice-wrapper">
            <label for="">Select Role</label>
            <select class="form-control" wire:model="user.role">
                <option value="teacher">Register as Teacher</option>
                <option value="student">Register as Student</option>
            </select>

            <hr>
        </div>

        <div class="col-md-12 form-fields-container">
            <div class="row">
                <div class="col-md-6">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" wire:model="user.name" > 
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
                </div>

                <div class="col-md-6">
                    <label for="">DOB</label>
                    <input type="date" class="form-control"  wire:model="user.date_of_birth" > 
                </div>
            </div>

            @if($user["role"]=="student")
            <div class="row">
                <div class="col-md-6">
                    <label for="">Course</label>
                    <select class="form-control" wire:model="user.course" >
                        <option value="bca">M.Tech</option>
                        <option value="bca">BE</option>
                        <option value="bca">BCA</option>
                        <option value="bca">Bsc</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="">Semester</label>
                    <input type="text" class="form-control" wire:model="user.sem" > 
                </div>
            </div>
            @endif

            <div class="row">

                <div class="col-md-6">
                    <label for="">Parent Mobile No</label>
                    <input type="text" class="form-control" wire:model="user.parent_mobile_no" > 
                </div>

                <div class="col-md-6">
                    <label for="">Mobile No</label>
                    <input type="text" class="form-control" wire:model="user.mobile_no" > 
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="">Password</label>
                    <input type="password" class="form-control"  wire:model="user.password" > 
                </div>

                <div class="col-md-6">
                    <label for="">Confirm Password</label>
                    <input type="text" class="form-control" wire:model="user.confirm_password" > 
                </div>
            </div>

        </div>


        <div class="col-md-12">
            <div class="form-group">
                <input type="submit" class="btn btn-primary"  value="Register" > 
            </div>
        </div>
    </div>

</div>
