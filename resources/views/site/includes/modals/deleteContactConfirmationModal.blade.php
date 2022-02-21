<div class="modal fade" id="modaldelete-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div style="display: none" id="" class="row mr-2 ml-2">
                    <button type="button" class="btn btn-lg btn-block btn-outline-success mb-2"
                            id="type-error">Your Contact Updated Successfully
                    </button>
                </div>
                <div class="row  d-flex justify-content-center " style="font: normal normal bold 24px/45px Cairo; color: #0D67CB">
                    <p class="text-center">Are you sure to delete this contact? </p>
                </div>
                <div style="text-align: center">
                    <input type="hidden" id="deleteId">
                <button id="confirmDelete" aria-hidden="true" type="button" class="btn btn-danger">Yes</button>
                <button type="button" class="modal-delete-cancel btn btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">No</span>
                </button>
                </div>
            </div>
        </div>
    </div>
</div>
