<div class="list-container">

    <style>
        .table p{
            margin: 0;
        }
    </style>

    <div wire:loading wire:init="loadList" >
        {{ $loading_message }}
    </div>


    <div class="filter-container">
        <!-- <button type="button" wire:click="loadList" >Checkout</button> -->
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="width:50%;" >Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr> 
            </thead>
            <tbody>
                
                @if(!empty($objects))
                    @foreach($objects as $k => $v)
                        <tr>
                            <td>
                                <div>
                                    <p><strong>Title:</strong> {{ $v["title"] }}</p>
                                    <p><strong>Description:</strong> {{ $v["desc"] }}</p>
                                </div>        
                            </td>
                            <td>
                                @if($v["status"]=="pending")
                                    Pending
                                @endif  

                                @if($v["status"]=="accomplished")
                                    Accomplished
                                @endif 
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" wire:click="$emitTo('todo.form-component', 'edit', {{ $v['todo_id'] }})" >Edit</button>
                                <button type="button" class="btn btn-danger" >Remove</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center" >No Tasks found.</td>
                    </tr>
                @endif
            </tbody>
    </table>
    </div>


    <div class="pagination-container">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
</div>