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
        <button type="button" wire:click="updateQuery" >Checkout</button>
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
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)" 
                    @if($paginator["current_page"] > 1) 
                        wire:click="applyPagination('previous_page', {{ $paginator["current_page"]-1 }})"
                    @endif             
                >
                    Previous
                </a>
            </li>

            <?php // $paginator["last_page"]=3; ?>

            <?php

                $current_page = $paginator["current_page"];
                $last_page = $paginator["last_page"];

            ?>

            @for($i=1; $i <= $paginator["last_page"]; $i++ )
                <?php 
                    $show=TRUE; 
                ?>

                @if($i>5)
                    <?php $show=FALSE; ?>
                @endif 

                @if($paginator["last_page"]<=5)
                    <?php $show=TRUE; ?>
                @endif

                @if($show)
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)"
                            wire:click="applyPagination('page', {{ $i }})"
                        >{{ $i }}</a>
                    </li>
                @endif

                @if($i == $paginator["last_page"] && $paginator["last_page"]>5)
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">...</a>
                    </li>
                @endif
            @endfor

            <li class="page-item">
                <a class="page-link" href="javascript:void(0)" 
                    @if(($paginator["current_page"]+1) <= $paginator["last_page"]) 
                        wire:click="applyPagination('next_page', {{ $paginator["current_page"]+1 }})"
                    @endif    
                >
                Next
                </a>
            </li>
        </ul>
    </div>
</div>