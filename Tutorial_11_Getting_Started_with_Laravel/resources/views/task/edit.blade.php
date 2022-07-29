<form action="{{ route('task.update', $task->id) }}" method="POST" style="display: inline;">
@csrf
@method('PATCH')
    <div class="modal fade" role="dialog" tabindex="-1" id="showEditTaskModal{{$task->id}}">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <span>Edit Task Form</span>
                    <button class="close" type="button" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control form-control rounded-0" value="{{ $task->title }}" name="title">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-outline-dark rounded-0">
                        <i class="fa fa-edit"></i>
                        Update
                    </button>
                </div>
            </div>

        </div>
    </div>
</form>