<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="display: none" id="editContactMsg" class="row mr-2 ml-2">
                    <button type="button" class="btn btn-lg btn-block btn-outline-success mb-2"
                            id="type-error">Your Contact Updated Successfully
                    </button>
                </div>
                <div class="row  d-flex justify-content-center " style="font: normal normal bold 24px/45px Cairo; color: #0D67CB">
                    <p class="text-center">Edit Contact</p>
                </div>
                <form id="editContactForm">
                    <div class="row pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                        <select name="providerEdit" class="form-control" id="providerEdit" >
                            @if(isset($providers) && $providers->count()>0)
                                @foreach($providers as $provider)
                                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="row mt-3 pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                        <input id="contactNameEdit" type="text" class="form-control" placeholder="Enter Your Contact">
                        <input id="contactId" type="hidden" class="form-control" placeholder="">
                        <small id="contact_edit_error" class="form-text text-danger"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer pr-5 pt-5 pb-5">
                <button type="button" class="modal-delete-cancel btn btn-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Cancel</span>
                </button>
                <button type="submit" id="updateContact" class="btn btn-warning">Update Contact</button>

            </div>
        </div>
    </div>
</div>

</div>
