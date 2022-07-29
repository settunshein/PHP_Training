@extends('layouts.master')

@section('title', 'Day 11 | Laravel 101')

@section('content')
<div class="col-6">
    <div class="py-3">
        <h3 class="text-center mb-3">ToDo List</h3>

        <form action="{{ route('task.store') }}" method="POST">
        @csrf
            <div class="form-row my-3">
                <div class="col-10">
                    <input type="text" class="form-control rounded-0 @error('title') is-invalid @enderror" placeholder="Enter New Task . . ." name="title">
                    <small class="text-danger fw-bold">
                        {{ $errors->first('title') }}
                    </small>
                </div>
    
                <div class="col-2">
                    <button type="submit" class="btn btn-block btn-outline-dark rounded-0">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                </div>
            </div>
        </form>

        <div class="list-group">
            @foreach($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center rounded-0 px-3">
                <div class="d-flex justify-content-between">
                    <form action="{{ url('updateTaskStatus/'.$task->id) }}" class="d-none" method="POST" id="updateTaskStatusForm{{$task->id}}">
                    @csrf
                    </form>
                    <a href="javascript:;" class="task-status-btn"
                    onclick="document.getElementById('updateTaskStatusForm{{$task->id}}').submit()">
                        <i class="{{ $task->checkTaskStatus($task) }} task-status-icon"></i>
                    </a>
                    <div class="{{ $task->status == 1 ? 'line-through text-black-50' : '' }}">
                        <p class="mb-0">{{ $task->title }}</p>
                        <small class="text-black-50">{{ $task->created_at->toFormattedDateString() }}</small>
                    </div>
                </div>
                
                <div>
                    <a type="button" class="btn btn-sm btn-outline-dark rounded-0"
                    data-toggle="modal" data-target="#showEditTaskModal{{$task->id}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    @include('task.edit')
                    
                    <form action="{{ route('task.destroy', $task->id) }}" style="display: inline;"
                    class="taskDeleteForm{{$task->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                        <a href="javascript:;" class="del-task-btn btn btn-sm btn-outline-dark" data-id="{{ $task->id }}">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                    </form>
                </div>
            </li>
            @endforeach
            <li class="list-group-item">
                <small>
                    <span class="text-success">{{ $completed_tasks }} Tasks Completed</span> / {{ count($tasks) }} Tasks
                </small>
            </li>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).on('click', '.del-task-btn', function(e){
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: "Do You Want to Delete this Task?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            onfirmButtonText: 'OK',
            cancelButtonText: 'CANCEL',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $('.taskDeleteForm'+id).submit();
            }
        })
    })
</script>
@endpush