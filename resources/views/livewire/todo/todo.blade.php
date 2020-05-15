<div class="container-fluid" >
    <style>
    
    </style>

    <div class="wrapper">
        <div class="title-container">
            <h1 class="title text-center">Laravel Livewire | Todo Application with Pagination</h1>
        </div>

        <div class="form-container">
            <div class="row">
                <div class="col-md-12">
                    <label for="">Title</label>
                    <input type="text" class="form-control" wire:model="form.title" >
                    @error('form.title')
                        <label class="error">{{ $message }}</label>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea rows="3" class="form-control" wire:model="form.desc" ></textarea>
                    @error('form.desc')
                        <label class="error">{{ $message }}</label>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="">Task Status</label>
                    <select class="form-control" wire:model="form.status" >
                        <option value="">Choose One</option>
                        <option value="pending">Task Pending</option>
                        <option value="accomplished">Task Accomplished</option>
                    </select>
                    @error('form.status')
                        <label class="error">{{ $message }}</label>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-md" >{{ $submit_btn_title }}</button>
                </div>
            </div>
        </div>

        <div class="list-container">

        </div>

        <div class="pagination-container">
        
        </div>
    </div>

</div>