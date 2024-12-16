@extends('layout')

@section('main-content')
  <div>
    <div class="float-start mt-4">
        <h4 class="pb-3"> Edit Task  - <span class="badge bg-info">{{$task->title}}</span></h4>
    </div>
    <div class="float-end mt-4">
        <a href="{{route('index')}}" class="btn btn-info">
           <i class="fa fa-arrow-left"></i> All Task
        </a>
    </div>
    <div class="clearfix"></div>
  </div>
 
    <div class="card card-body bg-light p-4">
      <form action="{{route('task.update', $task->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">description</label>
          <textarea  class="form-control" id="description" name="description" rows="5" value="" >{{$task->description}}</textarea>
        </div>
        <div class="mb-3">
          <label for="ststus" class="form-label">status</label>
          <select name="status" id="status" class="form-control">
            @foreach ($statuses as $status )
                <option value="{{$status['value']}}"{{$task->status === $status['value'] ? 'selected' : ''}}>{{$status['label']}}</option>
            @endforeach
          </select>
        </div>  
        <a href="{{route('index')}}" class="btn btn-secondary mr-2">
           <i class="fa fa-arrow-left"></i> cancel 
         </a>     
        {{-- <button type="submit" class="btn btn-success">
          <i class="fa fa-check"></i> Save</button> --}}
          
          <x-button />
      </form>
    </div>
  
@endsection
    
  