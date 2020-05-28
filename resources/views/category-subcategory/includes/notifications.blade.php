@if(session()->get('success'))
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-success">
            {{ session()->get('success') }}
            </div>
        </div>
    </div>
@endif

@if(session()->get('error'))
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-danger">
            {{ session()->get('error') }}
            </div>
        </div>
    </div>
@endif