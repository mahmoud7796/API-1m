<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="display: none" id="addContactMsg" class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                            id="type-error">Your Contact Added Successfully
                    </button>
                </div>
                <div class="row  d-flex justify-content-center " style="font: normal normal bold 24px/45px Cairo; color: #0D67CB">
                    <p class="text-center">New Contact</p>
                </div>
                <form id="addContactForm">
                <div class="row pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                    <select name="provider" class="form-control" id="provider" >
                        @if(isset($providers) && $providers->count()>0)
                            @foreach($providers as $provider)
                        <option value="{{$provider->id}}">{{$provider->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                    <div class="row mt-3 pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                        <input id="contactName" name="contact" type="text" class="form-control" placeholder="Enter Your Contact">
                        <small id="contact_error" class="form-text text-danger"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer pr-5 pt-5 pb-5">
                <button onclick="resetForm()" id="resetAddContact" type="button" class="btn btn-light">Reset</button>
                <button type="submit" id="saveContact" class="btn btn-warning">Save Contact</button>
            </div>
        </div>
    </div>
</div>

</div>
