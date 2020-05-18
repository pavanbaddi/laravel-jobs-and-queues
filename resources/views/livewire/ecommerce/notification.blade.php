<div class="container">
    @if($flash["type"]=="success")
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $flash["message"] }}
        </div>
    @endif

    @if($flash["type"]=="error")
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $flash["message"] }}
        </div>
    @endif
</div> 
 