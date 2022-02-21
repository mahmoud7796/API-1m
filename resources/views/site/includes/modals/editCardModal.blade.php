        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div style="display: none" id="editCardMsg" class="row mr-2 ml-2">
                    <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                            id="type-error">Your Card Updated Successfully
                    </button>
                </div>
                <input type="hidden" id="cardId" class="form-control" placeholder="Card ID">

                <div class="row  d-flex justify-content-center " style="font: normal normal bold 24px/45px Cairo; color: #0D67CB">
                    <p class="text-center">Edit Card</p>
                </div>
                <div class="row pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                    <form id="addCardForm">
                        @csrf
                        <input type="text" id="editCardName" class="form-control" placeholder="Card Name">
                        <small id="card_edit_error" class="form-text text-danger"></small>

                    </form>
                </div>
                <div class="row pt-5 d-flex justify-content-center" style="font: normal normal bold 18px/33px Cairo; color: #171717;">
                    <p class="text-center">Edit a Verified Contact to your Card</p>
                </div>
                @if(isset($verifiedContacts) && $verifiedContacts->count()>0)
                    @foreach($verifiedContacts as $contact)
                        <div class="row pt-5 d-flex justify-content-center align-content-center">
                            <div style="width: 10%">
                                <div style="width: 50px;height: 50px">
                                    <img width="100%" height="100%" src="{{$contact->provider->imgURL}}" alt="face">
                                </div>
                            </div>
                            <div style="width: 80%">
                                <form id="editCheckboxesReset">
                                    <label style="width: 90%" class="pl-5 pt-2 pr-5">{{$contact->contact_string}}</label>
                                    <input id="contactsCheckboxEdit" name="contactsCheckboxEdit"  type="checkbox" value="{{$contact->id}}">

                                </form>

                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row pt-5 d-flex justify-content-center align-content-center">
                        <p class="pl-5 pt-2 pr-5">You have no contacts add at least one contact</p>
                    </div>
                @endif
            </div>
            <div class="modal-footer pr-5 pt-5 pb-5">
                <button type="button" class="modal-delete-cancel btn btn-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Cancel</span>
                </button>
                <button type="button" id="updateCard" class="btn btn-warning">Update Card</button>
            </div>
    </div>

