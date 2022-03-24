<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
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
    <div class="row justify-content-center pt-5">
        <div class="card col-md-8 o-hidden border-0 shadow-lg my-5 ">
            <div class="card-body pt-5">
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
                <div class="row pt-5">
                    <div class="col-md-9 pt-5">
                        <h3 style="font: normal normal bold  24px/45px Cairo; color: #1F2933;">Verified Contact Information</h3>
                    </div>
                    <div class="col-md-3 pt-5"><a style="font: 20px cairo; color: #FFFFFF" type="submit" class="btn btn-block float-right" id="newContactInfoBtn" data-toggle="modal" data-target="#contactModal"><img class="pr-2" src="{{asset('img/Icon ionic-ios-add.svg')}}" alt=""/>New Contact</a></div>
                </div>

                <div class="row">
                    @if(isset($verifiedContacts) && $verifiedContacts->count()>0)
                        @foreach($verifiedContacts as $verifiedContact)
                    <div class="col-md-4 pl-5 pr-5">
                        <div class="row pt-5">
                            <div class="col-md-2 pt-2 "><img src="{{$verifiedContact->provider->imgURL}}" alt="" style="width: 40px; height: 40px;"/></div>
                            <div class="col-md-7">
                                <h1 style="margin-left: 30px;font:normal 15px/30px Cairo; color: #1F2933;">{{$verifiedContact->contact_string}}</h1>
                            </div>
                            <div class="col-md-3 pt-2"> <img data-toggle="modal" data-target="#deleteModal" class="float-right" src="{{asset('img/Group 322.svg')}}" alt=""/></div>
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
                    {!! $verifiedContacts->appends(['verified' => $verifiedContacts->currentPage()])->links('vendor.pagination.bootstrap-4') !!}
                </div>
                {{--End PAGINATION--}}

                {{--delete modal--}}
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" id="deleteModal">
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
                                    <div class="col-md-3"><a style="font: 20px/37px Cairo; color: #1F2933;" href="" class="btn btn-block">Cancel</a></div>
                                    <div class="col-md-3"><a style="background: #C52528 0% 0% no-repeat padding-box; font: 20px/32px Cairo; color: #FFFFFF;" href="" class="btn btn-block" id="deletemodalBtn">Delete</a> </div>
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


                <div class="row pt-5 pl-2">
                    <h3 style="font: normal normal bold  24px/45px Cairo; color: #1F2933;">Unverified Contact Information</h3>
                </div>

                <div class="row">
                    @if(isset($unVerifiedContacts) && $unVerifiedContacts->count()>0)
                        @foreach($unVerifiedContacts as $unVerifiedContact)
                    <div class="col-md-4 pl-5 pr-5">
                        <div class="row pt-5">
                            <div class="col-md-2 pt-2 "><img src="{{$unVerifiedContact->provider->imgURL}}" alt="" style="width: 40px; height: 40px;"/></div>
                            <div class="col-md-7">
                                <h6 style="font: normal normal normal 15px/30px Cairo; color: #1F2933;">{{$unVerifiedContact->contact_string}}</h6>
                            </div>
                            <div class="col-md-3 pt-2"><img class="float-right" src="{{asset('img/Group 323.svg')}}" alt=""/></div>
                        </div>
                    </div>
                        @endforeach
                    @else
                        <div style="width: 100%">
                            <h4 style="color: gray; text-align: center">There is no unverified contact</h4>
                        </div>
                    @endif
                </div>

                {{--PAGINATION--}}
            <div class="d-flex justify-content-center">
                {!! $unVerifiedContacts->appends(['unverified' => $unVerifiedContacts->currentPage()])->links('vendor.pagination.bootstrap-4') !!}
            </div>
                {{--End PAGINATION--}}

            </div>
        </div>
    </div>
    @include('site.includes.footer')
<script>
    //Add New Contact
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
    });
</script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
