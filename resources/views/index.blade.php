@extends('layout')

@section('main-content')
        <div>
            <div class="float-start mt-4">
                <h4 class="pb-3"> My Tasks </h4>
            </div>
            <div class="float-end mt-4">
                <a href="{{route('task.create')}}" class="btn btn-info">
                    <i class="fa fa-plus-circle"></i> create task
                </a>
            </div>
            <div class="clearfix"></div>


        </div>
    @foreach ($tasks as $task)
        
        <div class="card">
            <h5 class="card-header">

                @if ($task->status === 'Todo')
                {{$task->title}}
                @else
                <del>
                {{$task->title}} 
                </del>
                @endif           
                <span class="badge text-bg-warning">{{$task->created_at->diffForHumans()}}</span>
            </h5>
            <div class="card-body">
                <div class="card-text">
                    <div class="float-start ">
                        <div class="clearfix"></div>
                        @if ($task->status === 'Todo')
                        {{$task->description}}
                        @else
                        <del>
                        {{$task->description}}

                        </del>
                        @endif        
                        <br>
                        @if ($task->status === 'Todo')
                        <span class="badge text-bg-info">Todo </span>
                        @else
                        <span class="badge text-bg-success"> Done  </span>

                        @endif
                
                        <small> Updated at -  {{$task->updated_at->diffForHumans()}}</small>
                    </div>
                    <div class="float-end ">
                        <a href="{{route('task.edit', $task->id  )}}" class="btn btn-success">
                           <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{route('task.destroy' , $task->id )}}" style="display: inline" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                               <i class="fa fa-trash"></i> delete
                            </button>
                        </form>
                    </div>          
                </div>
            </div>
        </div>
    @endforeach
    @if (count($tasks) === 0)
        <div class="alert alert-danger p2">
                No Task Found
            <br>
            <br>
            <a href="{{route('task.create')}}" class="btn btn-info btn-sm">
                <i class="fa fa-plus-circle"></i>  create task
            </a>
        </div>  
    @endif

@endsection
    
  