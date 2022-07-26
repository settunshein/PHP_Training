<form action="" style="display: inline;">
    <input type="hidden" value="<?=$student->id?>" name="del_student_id">
    <div class="container">
        <div class="row">
            <div class="modal fade" tabindex="-1" role="dialog" id="showDeleteStudentModal<?=$student->id?>">
                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <span class="custom-card-title">Delete Student Form</span>
                            <button type="button" class="close" data-dismiss="modal"> 
                                <span>&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <p class="text-center pt-3">
                                <i class="fas fa-exclamation-circle"></i>
                                Are You Sure? Do You Want to Delete this Student?
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-outline-dark rounded-0" data-dismiss="modal">
                                <i class="fa fa-times"></i>&nbsp;
                                Cancel
                            </button>
        
                            <button class="btn btn-sm submit btn-outline-dark rounded-0">
                                <i class="fa fa-trash-alt"></i>
                                Delete
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>