<div class="container" >

    <style>

        body{
            background: #eee;
            margin: 0;
            padding: 0;
        }

        .wrapper{
            width: 60%;
            margin: 15px auto;
            background: #fff;
        }

        .header-container{
            background: #eee;
            border:2px solid #888;
        }

        .row{
            margin-left: 0;
            margin-right: 0;
        }

        .form-container{
            padding: 15px;
        }
    </style>

    <div class="wrapper">

        <form wire:submit.prevent="uploadFiles" method="post" enctype="multipart/form-data" >

            <div class="row header-container">
                <div class="col-md-12">
                    <h2 class="text-center" >Laravel LiveWire Multiple File Validation and Uploads</h2>
                </div>
            </div>

            <div class="form-container">
                @if(session()->has('error'))
                    <div>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @if(session()->has('success'))
                    <div>
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Single Image Upload</label>
                        <input type="file" class="form-control" wire:change="$emit('single_file_choosed')" ><br>
                        <span>Only image files are allowed to upload</span>
                        @if(!empty($validation_errors["image"]))
                            @foreach($validation_errors["image"] as $k => $v)
                                <label for="" class="error" >{{ $v }}</label>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-md-12">
                        @if($image)
                            <br>
                            <img src="{{ $image }}" alt="" style="height: 150px;" class="img-thumbnail" >
                        @endif
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Multiple Image Uploads</label>
                        <input type="file"  class="form-control"  wire:change="$emit('multiple_file_choosed')" multiple> 
                        @if(!empty($files)) <button type="button" wire:click="$emit('confirm_remove_files')"  class="btn btn-danger" >Clear Files</button> @endif <br>
                        <span>You can upload multiple image files here</span>
                        @if(!empty($validation_errors["files"]))
                            @foreach($validation_errors["files"] as $k => $v)
                                <label for="" class="error" >{{ $v }}</label>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-md-12">
                        @if(!empty($files))
                            <div class="row">
                                @foreach($files as $k => $v)
                                    <div class="col-md-3">
                                        <img src="{{ $v }}" alt="" style="height: 100px;object-fit:contain;" class="img-thumbnail" >
                                        <br>
                                        <button type="button" wire:click="$emit('confirm_remove_file', {{ $k }})"  class="btn btn-danger btn-sm" >Clear Files</button>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <br>
                        <input type="submit" class="btn btn-success" value="Upload Now">
                    </div>
                </div>
            </div>
        </form>

    </div>


    <script>
        window.livewire.on('single_file_choosed', function(){
            try {
                let file = event.target.files[0];
                if(file){
                    let reader = new FileReader();

                    reader.onloadend = () => {
                        window.livewire.emit('single_file_uploaded', reader.result);
                    }
                    reader.readAsDataURL(file);
                }
            } catch (error) {
                console.log(error);
            }

        });

        window.livewire.on('multiple_file_choosed', function(){
            try {
                let files = event.target.files;
                let read_files = [];
                if(files.length>0){
                    for(let index in files){
                        if(typeof files[index] == "object"){
                            let reader = new FileReader();
                            reader.onloadend = () => {
                                window.livewire.emit('add_file', reader.result);
                            }
                            reader.readAsDataURL(files[index]);
                        }
                    }
                }
            } catch (error) {
                console.log(error);
            }

        });

        window.livewire.on('confirm_remove_files', function(){
            let cfn = confirm("Confirm to remove all files");
            if(cfn){
                return  window.livewire.emit('clear_files');
            }
            return false;
        });


        window.livewire.on('confirm_remove_file', function(index){
            let cfn = confirm("Confirm to remove this file");
            if(cfn){
                return  window.livewire.emit('clear_file', index);
            }
            return false;
        });
    </script>
</div>



