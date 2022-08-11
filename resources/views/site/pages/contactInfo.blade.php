<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    {{--jquery and ajax--}}
    {{--jquery and ajax--}}
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    {{--jquery and ajax--}}
    <style type="text/css">
        @import url("{{asset('css/style1.css')}}");
        body {
        }
    </style>
    <title>Contact info</title>
</head>

<body>
<div class="container-fluid">
    @include('site.includes.header')
    <div style="@if($verifiedContacts) margin-bottom:90px @else margin-bottom:230px @endif
        ;margin-right:0px;" class="row justify-content-center pt-5">
        <div class="card col-md-8 o-hidden border-0 shadow-lg my-5 ">
            <div style="width:1200px;" class="card-body pt-5 layout">
                <!-- Nested Row within Card Body -->
                <div class="row ">
                    <div class="col-md-6 pt-3 text-left">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group rounded"> <span style="background-color: #E4E7EB; border-top-left-radius: 15px; border-bottom-left-radius: 15px;" class="input-group-text border-0" id="search-addon"><i class="fas fa-search"></i></span>
                                    <input style="border: none; background-color: #E4E7EB; height:  53px; font: 18px/29px Cairo;" type="search" class="form-control" id="searchinput" placeholder=" Enter a Card Name" aria-label="Search"
                                           aria-describedby="search-addon" />
                                    <span style="background-color: #52606D; color: #FFFFFF; border-bottom-right-radius: 15px; border-top-right-radius: 15px; font: 18px/29px Cairo;" class="input-group-text border-0" id="search-addon">search</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-3 text-center">
                        <div style=" border-radius: 10px; height: 54px;" class="row justify-content-end">
                            <div style="background-color: #E7F0FB; border-bottom-left-radius: 10px; border-top-left-radius: 10px; " class="col-md-4 pt-2"> <a style="font: normal normal normal 20px/32px cairo; color: #1F2933;" href="{{route('home')}}">Your Cards</a></div>
                            <div style="background-color: #0E67CB;  border-radius: 10px;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color:#FFFFFF;" href="{{route('site.contacts.index')}}">Your Contact Info</a></div>
                            <div style="background-color: #E7F0FB; border-bottom-right-radius: 10px; border-top-right-radius: 10px;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="{{route('site.contacts.addedContact')}}">Your Contacts</a></div>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom:100px;" class="row pt-5">
                    <div class="col-md-9 pt-5">
                        <h3 style="font: normal normal bold  24px/45px Cairo; color: #1F2933;">Contact Information</h3>
                    </div>
                    <div class="col-md-3 pt-5"><a style="font: 20px cairo; color: #FFFFFF" type="submit" class="btn btn-block float-right" id="newContactInfoBtn" data-toggle="modal" data-target="#contactModal"><img class="pr-2" src="{{asset('img/Icon ionic-ios-add.svg')}}" alt=""/>New Contact</a></div>
                </div>

                <div style="margin-bottom: 100px;" class="row">
                    @if(isset($verifiedContacts) && $verifiedContacts->count()>0)
                        @foreach($verifiedContacts as $verifiedContact)
                            <div class="col-md-6 col-sm-12 pr-5">
                                <div class="row pt-5">
                                    <div class="col-1 pt-2">
                                        @if($verifiedContact->provider->imgURL)
                                            <img src="{{$verifiedContact->provider->imgURL}}" alt="" style="width: 40px; height: 40px;"/>
                                        @else
                                            <img src="{{asset('public/img/catalog-default-img-modified.png')}}" alt="" style="width: 40px; height: 40px;"/>
                                        @endif

                                    </div>
                                    <div class="col-10">
                                        <h1 style="margin-left: 30px;font:normal 15px/30px Cairo; color: #1F2933;">{{$verifiedContact->contact_string}}</h1>
                                    </div>
                                    <div class="col-1">
                                        <a id="getContact" data-id="{{$verifiedContact->id}}" class="pr-3" data-toggle="modal" data-target="#contactModalEdit" href=""><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#7B8794" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                            </svg></a>
                                        <a class="pr-3" id="getDeleteId" data-id="{{$verifiedContact->id}}" data-toggle="modal" data-target="#deleteModal2" href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#7B8794" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="width: 100%">
                            <h4 style="color: gray; text-align: center">There is no verified contact</h4>
                        </div>
                    @endif
                </div>

                {{--PAGINATION--}}
                <div class="d-flex justify-content-center">
                    {!! $verifiedContacts->appends(['verified' => $verifiedContacts->currentPage()])->links('site.pagination.links') !!}
                </div>
                {{--End PAGINATION--}}


                {{--delete modal--}}
                <div class="modal fade" id="deleteModal2" tabindex="-1" role="dialog" aria-labelledby="deleteModal2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" id="deleteModal2">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <h5 style="font: normal normal bold 24px/45px Cairo;">Delete This Contact ?</h5>
                                </div>
                                <div class="row justify-content-center">
                                    <h7 style="font: 20px/45px Cairo; color: #52606D;">Are you sure ? This Cannot be undone</h7>
                                </div>
                                <div class="row justify-content-center pt-3 pb-3">
                                    <input type="hidden" id="deleteContactId">
                                    <button style="margin-right: 20px" id="confirmDelete" aria-hidden="true" type="button" class="btn btn-danger">Yes</button>
                                    <button type="button" class="modal-delete-cancel btn btn-warning" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">No</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--END delete modal--}}

                {{--Contact modal--}}
                <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div style="display: none" id="addContactMsg" class="row mr-2 ml-2">
                                    <button class="btn btn-lg btn-block btn-outline-success mb-2"
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
            {{--END Contact modal--}}


            {{--edit Contact modal--}}

            <div class="modal fade" id="contactModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div style="display: none" id="editContactMsg" class="row mr-2 ml-2">
                                <button class="btn btn-lg btn-block btn-outline-success mb-2"
                                        id="type-error">Your Contact Updated Successfully
                                </button>
                            </div>
                            <div class="row  d-flex justify-content-center " style="font: normal normal bold 24px/45px Cairo; color: #0D67CB">
                                <p class="text-center">Edit Contact</p>
                            </div>
                            <form id="editContactForm">
                                <input id="contactId" type="hidden" class="form-control" placeholder="">
                                <div class="row pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                                    <select name="provider" class="form-control" id="providerEdit" >
                                        @if(isset($providers) && $providers->count()>0)
                                            @foreach($providers as $provider)
                                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="row mt-3 pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                                    <input id="contactNameEdit" name="contact" type="text" class="form-control" placeholder="example@contact.com Or 01xxxxxxxx">
                                    <small id="contact_edit_error" class="form-text text-danger"></small>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer pr-5 pt-5 pb-5">
                            <button onclick="resetEditForm()" id="resetEditContact" type="button" class="btn btn-light">Reset</button>
                            <button type="submit" id="updateContact" class="btn btn-warning">Update Contact</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
            </div>
        </div>
        {{--edit Contact modal--}}



    </div>
</div>
</div>
@include('site.includes.footer')
<script>
    //Add New Contact
    function resetEditForm(){
        $('#editContactForm')[0].reset();
    }
    $(document).on('click', '#saveContact', function(e){
        e.preventDefault();
        $("#saveContact").attr("disabled", true);
        $('#contact_error').text('');
        var selectedProviderId= $('#provider').find(":selected").val();
        var contactName= $('#contactName').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: "{{route('site.contacts.create')}}",
            data:{
                contact:contactName,
                providerId:selectedProviderId
            } ,
            cache: false,
            success: function (response){
                if(response.status===true){
                    $('#addContactMsg').show();
                    $('#addContactForm')[0].reset();
                    window.location.href = "{{route('site.contacts.index')}}";
                }
            }, error: function (reject){
                $("#saveContact").attr("disabled", false);
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function(key, val){
                    $("#" + key + "_error").text(val[0]);
                });
            }
        });
    });
    function resetForm(){
        $('#addContactForm')[0].reset();
    }
    $('#contactModal').on('hidden.bs.modal', function () {
        resetForm();
        $('#contact_error').text('');
    });

    //get specific Contact getContactId

    $('body').on('click', '#getContact', function (event) {
        event.preventDefault();
        var contact_id = $(this).data('id');
        $.get("{{url("contact/show")}}" + "/"+contact_id, function (data) {
            var providerId = data.contact.provider_id;
            $('#contactNameEdit').val(data.contact.contact_string);
            $('#contactId').val(data.contact.id);
            $("#providerEdit").children('[value="'+providerId+'"]').attr('selected', true);
        })
        function contactFormEdit(){
            $('#editContactForm')[0].reset();
        }
        $('#contactModalEdit').on('hidden.bs.modal', function () {
            contactFormEdit();
            $('#contact_error_edit').text('');
        });
    });

    //Update Contact

    $(document).on('click', '#updateContact', function(e){
        e.preventDefault();
        $("#updateContact").attr("disabled", true);
        $('#contact_edit_error').text('');
        var selectedProviderId= $('#providerEdit').find(":selected").val();
        var contactName= $('#contactNameEdit').val();
        var contactId= $('#contactId').val();
        console.log(contactId)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: "{{url('/contact/update')}}" +'/'+ contactId,
            data: {
                contact:contactName,
                providerId:selectedProviderId
            },
            cache: false,
            success: function (response){
                if(response.status===true){
                    $('#editContactMsg').show();
                    window.location.href = "{{route('site.contacts.index')}}";
                }
            },
            error: function (reject){
                $("#updateContact").attr("disabled", false);
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function(key, val){
                    $("#" + key + "_edit_error").text(val[0]);
                });
            }
        });
        function resetEditForm(){
            $('#editContactForm')[0].reset();
        }
        $('#contactModalEdit').on('hidden.bs.modal', function () {
            resetEditForm();
            $('#contact_edit_error').text('');
        });
    });


    //get deleteId CardContact getDeleteId
    $(document).on('click', '#getDeleteId', function(e){
        event.preventDefault();
        var contact_id = $(this).data('id');
        $('#deleteContactId').val(contact_id);
    });

    //delete CardContact
    $(document).on('click', '#confirmDelete', function(e){
        e.preventDefault();
        $("#confirmDelete").attr("disabled", true);
        var deleteId= $('#deleteContactId').val();
        console.log(deleteId)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            url: "{{url('/contact/delete')}}" +'/'+ deleteId,
            data: {
            },
            cache: false,
            success: function (response){
                if(response.status===true){
                    window.location.href = "{{route('site.contacts.index')}}";
                }
            },
            error: function (reject){
            }
        });
    });

    $('#contactModal').on('hidden.bs.modal', function () {
        changePlaceHolder()
    });

    $( document ).ready(function() {
        changePlaceHolder()
    });

    function changePlaceHolder()
    {
        var val = $('#provider').find(":selected").val();
        var id = Number(val)
        switch (id) {
            case 1:
                $("#contactName").attr("placeholder", "Facebook UserName");
                break;
            case 2:
                $("#contactName").attr("placeholder", "Instagram User ID");
                break;
            case 3:
                $("#contactName").attr("placeholder", "LinkedIn Profile ID");
                break;
            case 4:
                $("#contactName").attr("placeholder", "Phone Number");
                break;
            case 5:
                $("#contactName").attr("placeholder", "WhatsApp Phone Number");
                break;
            case 6:
                $("#contactName").attr("placeholder", "Email Address");
                break;
            case 7:
                $("#contactName").attr("placeholder", "Phone Number");
                break;
            case 8:
                $("#contactName").attr("placeholder", "Twitter UserName");
                break;
            case 9:
                $("#contactName").attr("placeholder", "GitHub Username");
                break;
            case 10:
                $("#contactName").attr("placeholder", "Pintrest Email Or Username");
                break;
            case 11:
                $("#contactName").attr("placeholder", "Website");
                break;
        }
    }

    $('#provider').on('change', function() {
        changePlaceHolder()
    });

          var email = "madasacgmail.com";
        var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        var mada =  reg.test(email);
    console.log(mada);


</script>
@yield("scripts")

<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
