<div class="container" >
    <form method="post" enctype="multipart/form-data" >
        <div class="row">
            <div class="col-md-6">
                <label for="">Single File Upload</label>
                @if($image)
                    <img src="{{ $image }}" alt="" style="width: 200px;" >
                @endif
                <input type="file" wire:change="$emit('single_file_choosed')" >
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <input type="submit" value="Save">
            </div>
        </div>
    </form>

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

    </script>
</div>



