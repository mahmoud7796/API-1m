<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    {{--jquery and ajax--}}
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    {{--jquery and ajax--}}
    <style type="text/css">
        @import url("css/style1.css");

        body {
        }
    </style>
    <title>Home</title>
</head>

<body>
<div class="container-fluid">
    @include('site.includes.header')
    <div class="row justify-content-center ">
        <div class="card col-md-8 o-hidden border-0 shadow-lg my-5 ">
            <div class="card-body pt-5">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md-6 text-left pt-5">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group rounded"><span
                                        style="background-color: #E4E7EB; border-top-left-radius: 15px; border-bottom-left-radius: 15px;"
                                        class="input-group-text border-0" id="search-addon"><i
                                            class="fas fa-search"></i></span>
                                    <input
                                        style="border: none; background-color: #E4E7EB; height:  53px; font: 18px/29px Cairo;"
                                        type="search" class="form-control" id="searchinput"
                                        placeholder=" Enter a Card Name" aria-label="Search"
                                        aria-describedby="search-addon"/>
                                    <span
                                        style="background-color: #52606D; color: #FFFFFF; border-bottom-right-radius: 15px; border-top-right-radius: 15px; font: 18px/29px Cairo;"
                                        class="input-group-text border-0" id="search-addon">search</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center pt-5">
                        <div style=" border-radius: 10px; height: 54px;" class="row justify-content-end">
                            <div style="background-color: #0E67CB; border-radius: 10px;" class="col-md-4 pt-2"><a
                                    style="font: normal normal normal 20px/32px cairo; color: #FFFFFF;"
                                    href="{{route('home')}}">Your Cards</a></div>
                            <div style="background-color: #E7F0FB;" class="col-md-4 pt-2"><a
                                    style=" font: normal normal normal 20px/32px cairo; color: #1F2933;"
                                    href="{{route('site.contacts.index')}}">Your Contact Info</a></div>
                            <div
                                style="background-color: #E7F0FB; border-bottom-right-radius: 10px; border-top-right-radius: 10px;"
                                class="col-md-4 pt-2"><a
                                    style=" font: normal normal normal 20px/32px cairo; color: #1F2933;"
                                    href="{{route('site.contacts.addedContact')}}">Your Contacts</a></div>
                        </div>
                    </div>
                </div>

                @if($cards->count()>0)
                    <div class="row pt-4">
                        <div class="col-md-6 pt-5">
                            <h3 style="font: normal normal bold 32px/60px Cairo; color: #1F2933;">Your Cards</h3>

                        </div>
                        <div class="col-md-6 pt-5">
                            <a style="font: 20px/32px cairo; color: #FFFFFF" type="submit" class="btn btn-block float-right" id="newCardBtn" data-toggle="modal" data-target="#exampleModal">
                                <img class="pr-2" src="img/Icon ionic-ios-add.svg" alt=""/> New Card </a>
                        </div>
                        <!-- new card Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <h4 style="font: normal normal bold 24px/45px Cairo;">New Card</h4>
                                        </div>
                                        <div style="display: none" id="addCardMsg" class="row mr-2 ml-2">
                                            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                                    id="type-error">Your Card Added Successfully
                                            </button>
                                        </div>
                                        <div class="row pb-5">
                                            <div class="col-md-7">
                                                <div class="row pl-5 pt-5">
                                                    <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Contact information</h5>
                                                </div>
                                                <div class="row pl-5 pt-">
                                                    <h6 style="font: 20px/37px Cairo; color: #52606D;">Add verified contact information to this card</h6>
                                                </div>
                                                <div class="pt-3">
                                                    <div class="card card-modal" style="">
                                                        <div class="card-body">
                                                            @if(isset($contacts) && $contacts->count()>0)
                                                                @foreach($contacts as $contact)
                                                                    <div class="row">
                                                                        <div class="col-md-2 pt-3 pl-4">
                                                                            <img src="{{$contact->provider->imgURL}}" alt="" style="width: 40px; height: 40px;"/>
                                                                        </div>
                                                                        <div class="col-md-6 pl-5">
                                                                            <div class="row">
                                                                                <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">{{$contact->contact_string}}</h6>
                                                                                {{--                                                                        <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">
                                                                                                                                                            /Johnsmith22
                                                                                                                                                        </h7>--}}
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-4 pt-3">
                                                                            <label class="switch">
                                                                                <input id="contactsCheckbox" name="contactsCheckbox" value="{{$contact->id}}" type="checkbox" unchecked>
                                                                                <span class="slider round"></span> </label>
                                                                        </div>

                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="row">
                                                                    <h5>There is no contacts</h5>
                                                                </div>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="row pl-5 pt-5">
                                                    <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Card
                                                        Details</h5>
                                                </div>
                                                <div class="row pr-3">
                                                    <div class="col-md-12">
                                                        <form id="addCardForm" action="">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input style="font: 16px/30px Cairo;" type="text" class="form-control" placeholder="Card Name" id="cardName">
                                                                <small id="card_error" class="form-text text-danger"></small>

                                                            </div>
                                                            <div class="form-group">
                                                                <textarea style="font: 16px/30px Cairo;" class="form-control" name="cardDescription" rows="8" placeholder="Card Description (Optional)" id="cardDescription"> </textarea>

                                                                {{--
                                                                                                                                <textarea style="font: 16px/30px Cairo;" class="form-control" id="CardDescription" rows="8" placeholder="Card Description (Optional)"></textarea>
                                                                --}}
                                                                <small id="description_error" class="form-text text-danger"></small>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="row pt-5 mt-5"></div>
                                                <div class="row pt-5 mt-5 pr-5 justify-content-end">
                                                    <div class="col-md-8 pt-3 pl-5">
                                                        <button style="width: 150px;height: 60px;color: #FFFFFF" type="submit" id="saveCard" class="btn btn-primary">Save Card</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="userId" value="{{encrypt($userId)}}">
                    <div class="row pt-4">
                        <div class="col-md-6">
                            @if(isset($cards) && $cards->count()>0)
                                @foreach($cards as $card)
                                    <div>
                                        <div data-id="{{$card->id}}" class="card headerCardColor" style="border-top: 10px; background: #F5F7FA 0% 0% no-repeat padding-box; border-radius: 15px; display: grid">
                                            <div class="card-body row">
                                                <a data-id="{{$card->id}}" id="editCard" href="" class="col-md-7">
                                                    <div class="row pl-2">
                                                        <h3 data-id="{{$card->id}}" class='cardNameText' style="font: normal normal bold 24px/45px Cairo; color: #073D79;">{{$card->name}}</h3>
                                                    </div>
                                                    <div class="row pt-2 pl-2">
                                                        <h6 data-id="{{$card->id}}" class="cardDescriptionText"  style="font: normal normal normal 16px/24px Cairo; color: #1F2933;">
                                                            {{$card->description ?? ""}}</h6>
                                                    </div>

                                                    <div class="row pt-3 pl-2">
                                                        @if(isset($contacts) && $contacts->count()>0)
                                                            @foreach($contacts as $contact)
                                                                <img class="pr-2" width="30px" heghit="30px" src="{{$contact->provider->imgURL}}" alt=""/>
                                                            @endforeach
                                                        @endif
                                                    </div>

                                                </a>
                                                <div class="col-md-5 ">
                                                    <a href="" class="row justify-content-end">
                                                        <div class="col-md-6 pt-3">
                                                            <div
                                                                style=" font: 14px Cairo; color: #1F2933; background: #E9901C 0% 0% no-repeat padding-box; height: 40px; border-radius: 25px;"
                                                                class="btn btn-block">4 Scans
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pt-3">
                                                            <div href=""
                                                                 style=" font: 14px Cairo; color: #FFFFFF; background: #52606D 0% 0% no-repeat padding-box;  height: 40px; border-radius: 25px;"
                                                                 class="btn btn-block ">3 Adds
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="row justify-content-end pt-5">
                                                        <div id="share" href=""
                                                             style=" font: 16px/30px Cairo; color: #0E67CB; background: 0% 0% no-repeat padding-box; border-radius: 15px;"
                                                             data-id="{{encrypt($card->id)}}" class="btn"
                                                             data-toggle="modal" data-target="#shareModal"><img
                                                                class="pr-2" src="img/Icon ionic-md-share.svg" alt=""/>
                                                            Share
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- share button Modal -->
                                                <div class="modal fade" id="shareModal" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row justify-content-center">
                                                                    <h5 style="font: normal normal bold 24px/45px Cairo;">
                                                                        Share Card via...</h5>
                                                                </div>
                                                                <div class="row justify-content-center">
                                                                    <div class="col-md-2 ">
                                                                        <a id="sendWhatsApp" href=""><img width="50 px" height="50 px" src="img/whatsapp.jpg" alt=""/></a>
                                                                        <p style="width: 66px">whatsap</p>
                                                                    </div>
                                                                    <div class="col-md-2" style="margin-bottom: 9px">
                                                                        <a id="sendFb" href="">
                                                                            <img width="55 px" height="55 px" src="img/facebook.png" alt=""/>
                                                                        </a>
                                                                        <p style="width: 68px">Facebook</p>
                                                                    </div>
                                                                    <div class="col-md-2 ">
                                                                        <a id="sendMail" href=""><img width="50 px" height="50 px" src="img/Gmail1.svg" alt=""/></a>
                                                                        <p style="width: 68px">Mail</p>
                                                                    </div>
                                                                    <div class="col-md-3 text-center"><a
                                                                            href="{{asset('img/defaultQr.png')}}"
                                                                            download="defaultQr.png"><img
                                                                                src="img/Download.svg" alt=""/></a>
                                                                        <p>Download Qr Code</p>
                                                                    </div>
                                                                </div>

                                                                <div class="row justify-content-center">
                                                                    <div class="form-group ">
                                                                        <input style="width: 338px; height: 50px;" type="text" class="form-control" id="cardUrl" aria-describedby="basic-addon3" placeholder="1Me.live/user#1234/6251248">
                                                                    </div>
                                                                    <button style="width: 100px;height: 47px"
                                                                            onclick="copy()" id="copy"
                                                                            class="pl-3 pt-2 btn btn-success ml-3 mt-1">
                                                                        Copy
                                                                    </button>
                                                                </div>
                                                                <span style="display:none;width:100%;margin-left:130px;font-weight: bold;"
                                                                      class="text-success" id="copied">Copied Successfully!</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end share button Modal -->

                                            </div>
                                        </div>
                                    </div><br>
                                @endforeach
                                <div class="d-flex justify-content-center">
                                    {!! $cards->links('site.pagination.links') !!}
                                </div>
                        </div>

                        <div id="updateCard" style="display:none;border-top: 10px solid #0D67CB; background-color: #F5F7FA; border-radius: 10px;" class="col-md-6 pl-3">
                            <div class="row">
                                <div class="col-md-7 pt-5">
                                    <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Card Details</h5>
                                </div>
                                <div class="col-md-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 pt-5"><a href="" style=" font: 14px Cairo; color: #1F2933; background: #E9901C 0% 0% no-repeat padding-box;  height: 40px; border-radius: 25px;" class="btn btn-block">4 Scans</a></div>
                                        <div class="col-md-6 pt-5"><a href="" style=" font: 14px Cairo; color: #FFFFFF; background: #52606D 0% 0% no-repeat padding-box;  height: 40px; border-radius: 25px;" class="btn btn-block">3 Adds</a></div>
                                    </div>
                                </div>
                                <div style="display: none;margin-top: 9px" id="updateCardMsg" class="row mr-2 ml-2">
                                    <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                            id="type-error">Your Card Added Successfully
                                    </button>
                                </div>

                            </div>
                            <div class="row pt-5 pr-3">
                                <div class="col-md-12">
                                    <form action="">
                                        <div class="form-group">
                                            <input value="" type="hidden" class="form-control" id="cardId">
                                            <input style="font: 16px/30px Cairo;" type="text" class="form-control" placeholder="Business Card Name" id="editCardName">
                                            <small id="card_edit_error" class="form-text text-danger"></small>
                                        </div>
                                        <div class="form-group">
                                            <textarea style="font: 16px/30px Cairo;" class="form-control" id="editDescriptionCard" rows="4" placeholder="Card Description (Optional)"></textarea>
                                            <small id="description_edit_error" class="form-text text-danger"></small>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row pt-5 pl-5">
                                <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Verified Contact Info</h5>
                            </div>

                            <div class="row scroll">
                                @if(isset($contacts) && $contacts->count()>0)
                                    @foreach($contacts as $contact)
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-1 pt-3 pl-4">
                                                    <img src="{{$contact->provider->imgURL}}" alt="" style="width: 30px; height: 30px;"/>
                                                </div>
                                                <div class="col-md-7 pl-5">
                                                    <div class="row">
                                                        <h6 style="font: normal normal normal 15px/30px Cairo; color: #1F2933;">{{Str::limit($contact->contact_string,10,'...')}}</h6>
                                                    </div>
                                                    <!--   <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>-->
                                                </div>
                                                <div class="col-md-2 pt-3">
                                                    <label class="switch">
                                                        <input name="contactsCheckboxEdit" id="contactsCheckboxEdit"
                                                               type="checkbox" value="{{$contact->id}}">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h6 style="font: normal normal normal 15px/30px Cairo; color: #1F2933;">There are no contacts, please create a contact to add it in your business card </h6>
                                @endif
                            </div>
                            <div class="row pb-5 pr-3 ">
                                <div class="col-md-6"></div>
                                <div class="col-md-3 pt-5"><a href="" style="font: bold 16px/32px Cairo; " data-id="" class="btn btn-block btn-outline-danger" id="deleteCardId" data-toggle="modal" data-target="#exampleModal4">Delete Card</a></div>
                                <div class="col-md-3 pt-5"><a href="" style="font: bold 16px/32px Cairo; " class="btn btn-block btn-outline-primary" id="cardUpdate" role="button" data-toggle="modal">Update Card</a></div>

                            {{--
                                                            <button style="width: 150px;height: 60px;color: #FFFFFF" type="submit" id="cardUpdate" class="btn btn-primary">Update Card</button>
                            --}}


                            <!-- Modal -->
                                <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" id="deleteModal">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center">
                                                    <h5 style="font: normal normal bold 24px/45px Cairo;">Delete This Card ?</h5>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <h7 style="font: 20px/45px Cairo; color: #52606D;">Are you sure ? This Cannot be undone</h7>
                                                </div>
                                                <div class="row justify-content-center pt-3 pb-3">
                                                    <div class="col-md-3"><a id="deleteCancel" style="font: 20px/37px Cairo; color: #1F2933;" href="" class="btn btn-block">Cancel</a></div>
                                                    <button style="width: 120px;height: 50px;color: #FFFFFF" type="submit" id="confirmationDelete" class="btn btn-danger">Delete</button>
                                                    <input type="hidden" id="deletedCardId"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>

                        </div>
                    </div>
            </div>
            @endif

        </div>

        @else
            <div class="row justify-content-center pt-3">
                <div class="col-md-6">
                    <div class="row justify-content- pt-5">
                        <h3 style="font: normal normal bold 24px/60px Cairo; color: #1F2933;">You Haven't Created Any Cards</h3>
                    </div>
                    <div class="row justify-content-">
                        <h4 style="font: 20px/60px Cairo; color: #1F2933;">Create your first card to start using 1Me</h4>
                    </div>
                    <!-- create card button -->
                    <div class="row justify-content-">
                        <div class="col-md-5"><a href="" style="font: 20px Cairo; color: #FFFFFF" class="btn btn-block" id="createCardBtn" data-toggle="modal" data-target="#exampleModal">Create Card</a></div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <h4 style="font: normal normal bold 24px/45px Cairo;">New Card</h4>
                            </div>
                            <div style="display: none" id="addCardMsg" class="row mr-2 ml-2">
                                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                        id="type-error">Your Card Added Successfully
                                </button>
                            </div>
                            <div class="row pb-5">
                                <div class="col-md-7">
                                    <div class="row pl-5 pt-5">
                                        <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Contact information</h5>
                                    </div>
                                    <div class="row pl-5 pt-">
                                        <h6 style="font: 20px/37px Cairo; color: #52606D;">Add verified contact information to this card</h6>
                                    </div>
                                    <div class="pt-3">
                                        <div class="card card-modal" style="">
                                            <div class="card-body">
                                                @if(isset($contacts) && $contacts->count()>0)
                                                    @foreach($contacts as $contact)
                                                        <div class="row">
                                                            <div class="col-md-2 pt-3 pl-4">
                                                                <img src="{{$contact->provider->imgURL}}" alt="" style="width: 40px; height: 40px;"/>
                                                            </div>
                                                            <div class="col-md-6 pl-5">
                                                                <div class="row">
                                                                    <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">{{$contact->contact_string}}</h6>
                                                                    <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">
                                                                        {{$contact->title ?? ""}}
                                                                    </h7>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-4 pt-3">
                                                                <label class="switch">
                                                                    <input id="contactsCheckbox" name="contactsCheckbox" value="{{$contact->id}}" type="checkbox" unchecked>
                                                                    <span class="slider round"></span> </label>
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="row">
                                                        <h5>There is no contacts</h5>
                                                    </div>
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row pl-5 pt-5">
                                        <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Card
                                            Details</h5>
                                    </div>
                                    <div class="row pr-3">
                                        <div class="col-md-12">
                                            <form id="addCardForm" action="">
                                                @csrf
                                                <div class="form-group">
                                                    <input style="font: 16px/30px Cairo;" type="text" class="form-control" placeholder="Card Name" id="cardName">
                                                    <small id="card_error" class="form-text text-danger"></small>

                                                </div>
                                                <div class="form-group">
                                                    <textarea style="font: 16px/30px Cairo;" class="form-control" name="cardDescription" rows="8" placeholder="Card Description (Optional)" id="cardDescription"> </textarea>

                                                    {{--
                                                                                                                    <textarea style="font: 16px/30px Cairo;" class="form-control" id="CardDescription" rows="8" placeholder="Card Description (Optional)"></textarea>
                                                    --}}
                                                    <small id="description_error" class="form-text text-danger"></small>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row pt-5 mt-5"></div>
                                    <div class="row pt-5 mt-5 pr-5 justify-content-end">
                                        <div class="col-md-8 pt-3 pl-5">
                                            <button style="width: 150px;height: 60px;color: #FFFFFF" type="submit" id="saveCard" class="btn btn-primary">Save Card</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pt-5">
                <div class="col-md-6">
                    <div class="row">
                        <div class="card"
                             style="background: #E4E7EB 0% 0% no-repeat padding-box; border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"
                                    style="font: normal normal bold 16px/30px Cairo; color: #1F2933;">What are
                                    Cards ?</h5>
                                <p class="card-text" style="font: 16px/30px Cairo; color: #52606D;">Cards are
                                    collections containing a group of your contact information. Each card will
                                    have a unique QR code for others to scan and add your contact
                                    information.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="card"
                             style="background: #E4E7EB 0% 0% no-repeat padding-box; border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"
                                    style="font: normal normal bold 16px/30px Cairo; color: #1F2933;">How do I
                                    create a card ?</h5>
                                <p class="card-text" style="font: 16px/30px Cairo; color: #52606D;">Simply press
                                    the above button and Customize the name, description and other content
                                    within the card. Then you'll be able to share it with others.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="card"
                             style="background: #E4E7EB 0% 0% no-repeat padding-box; border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"
                                    style="font: normal normal bold 16px/30px Cairo; color: #1F2933;">What if I
                                    make any changes ?</h5>
                                <p class="card-text" style="font: 16px/30px Cairo; color: #52606D;">No worries,
                                    With 1Me any changes you make to your card data will automatically be
                                    updated for the people you shared the card with.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5 pt-5 text-center"><img src="img/card details.png" class="img-fluid" width="342" height="486" alt=""/></div>
            </div>
        @endif

    </div>
</div>
@include('site.includes.footer')

<script>
    $(document).on('click', '#share', function (e) {
        var encId = $(this).data("id")
        var userId = $('#userId').val()
        var cardUrl = "{{asset('card-show/').'/'}}" + encId + "/" + userId;
        $('#cardUrl').val(cardUrl)
    });


    function copy() {
        var uri = document.getElementById('cardUrl')
        uri.select()
        try {
            var successful = document.execCommand('copy')
            $('#copied').show();
        } catch (err) {
            console.log('Unable to copy text')
        }
    }

    $('#shareModal').on('hidden.bs.modal', function () {
        console.log('modal hide')
        $('#copied').hide();
    });

    $(document).on('click', '#sendFb', function (e) {
        e.preventDefault()
        var cardUrl = $('#cardUrl').val();
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + cardUrl, 'facebook-share-dialog', "width=626,height=436")
    });

    $(document).on('click', '#sendWhatsApp', function (e) {
        e.preventDefault()
        var cardUrl = $('#cardUrl').val();
        window.open('https://api.whatsapp.com/send?text=' + cardUrl, "_blank")
    });

    $(document).on('click', '#sendMail', function (e) {
        e.preventDefault()
        var cardUrl = $('#cardUrl').val();
        var onemeUrl = "https://1me.live/";
        // var mailToLink = "mailto:?subject= " + "I want to share my business card with you:"+cardUrl+", you can try it from here it's free" + " https://1me.live/"
        // var body = mailItem.HTMLBody = "<table border=1> <tr><td>blabla</td></tr> </table>";
        window.open("mailto:yourFriendMail@example.com?subject=I want to share my business card with you&body=kindly, click here to see my business card:                " + cardUrl + "                                                                                           and if you want to share your contact information try it free from here" + onemeUrl);
        //  window.location.href = mailToLink;
    });


    // add new card

    $(document).on('click', '#saveCard', function (e) {

        $("#saveCard").attr("disabled", true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#card_error').text('');
        $('#description_error').text('');

        var cardName = $('#cardName').val();
        var cardDescription = $('#cardDescription').val();
        //console.log(cardDescription)
        var contacts = [];
        $.each($("input[name='contactsCheckbox']:checked"), function () {
            contacts.push($(this).val());
        });

        $.ajax({
            type: 'post',
            url: "{{route('site.card.create')}}",
            data: {
                card: cardName,
                contactsIds: contacts,
                description: cardDescription
            },
            cache: false,
            success: function (response) {
                if (response.status === true) {
                    $('#addCardMsg').show();
                    $('#addCardForm')[0].reset();
                    $('input[name="contactsCheckbox"]').each(function () {
                        this.checked = false;
                    });
                    $('#addCardMsg').show();
                    $("#saveCard").attr("disabled", false);

                    window.location.href = "{{route('home')}}";
                }
            }, error: function (reject) {
                $("#saveCard").attr("disabled", false);
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            }
        });

    });

    function resetNewCard() {
        $('#addCardForm')[0].reset();
        $('input[name="contactsCheckbox"]').each(function () {
            this.checked = false;
        });
    }

    function changeCardHeaderColor(cardIdEdit){
        $('.headerCardColor').each(function (i, obj) {
            // loop on all headerCardColor class to reset them to the default style
            $(".headerCardColor").attr('style', 'border-top: 10px; background: #F5F7FA 0% 0% no-repeat padding-box; border-radius: 15px; display: grid');
        });
        // apply new style in the class that contains specific data-id
        $(`.headerCardColor[data-id="${cardIdEdit}"]`).attr('style', 'border-top: 10px solid #0D67CB; background: #F5F7FA 0% 0% no-repeat padding-box; border-radius: 15px; display: grid');
    }

    $(document).on('click', '#editCard', function (e) {
        e.preventDefault()
        var cardId = $(this).data('id');
        var idEdit = $('#cardId').val(cardId);
        var cardIdEdit = $('#cardId').val()
        changeCardHeaderColor(cardIdEdit);

        $("#updateCard").show();

        $('input[name="contactsCheckboxEdit"]').each(function () {
            this.checked = false;
        });

        $.get("{{url("card/show")}}" + "/" + cardId, function (data) {
            const ids = data.contactsThatInCard;
            $('#editCardName').val(data.card.name);
            $('#editDescriptionCard').val(data.card.description);
            for (const checkbox of document.querySelectorAll("#contactsCheckboxEdit[name=contactsCheckboxEdit]")) {
                if (ids.includes(Number(checkbox.value))) {
                    checkbox.checked = true;
                }
            }
        })
    });


    $(document).on('click', '#cardUpdate', function (e) {
        e.preventDefault()
        $("#cardUpdate").attr("disabled", true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#card_edit_error').text('');
        var cardName = $('#editCardName').val();
        var cardId = $('#cardId').val();
        var editDescriptionCard = $('#editDescriptionCard').val();
        var contacts = [];
        $.each($("input[name='contactsCheckboxEdit']:checked"), function () {
            contacts.push($(this).val());
        });

        function updateCard() {
            return $.ajax({
                type: 'post',
                url: "{{url('card/update')}}"+"/"+cardId,
                data: {
                    card: cardName,
                    contactsIds: contacts,
                    card_id: cardId,
                    description:editDescriptionCard
                },
                success: function (response) {
                    if (response.status === true) {
                        $('#updateCardMsg').show();
                        const myTimeout = setTimeout(updateCardMsgHide, 2000);
                        const clearTime = setTimeout(clearTimeOut, 5000);
                        function updateCardMsgHide() {
                            $('#updateCardMsg').hide();
                        }
                        function clearTimeOut() {
                            clearTimeout(myTimeout);
                            clearTimeout(clearTime);
                        }
                        $("#cardUpdate").attr("disabled", false);
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_edit_error").text(val[0]);
                    });
                    $("#cardUpdate").attr("disabled", false);
                }
            });
        }

        function getCardData() {
            return $.ajax({
                type: 'get',
                url: "{{url('card/show')}}"+"/"+cardId,
                data: {},
                success: function (response) {
                    if (response.status === true) {
                        $(`.cardNameText[data-id="${response.card.id}"]`).text(response.card.name)
                        $(`.cardDescriptionText[data-id="${response.card.id}"]`).text(response.card.description)
                    }
                }, error: function (reject) {

                }
            });
        }
        updateCard();
        function getNewCardData() {
            getCardData();
        }
        function clearTimeOutCardData() {
            clearTimeout(newCardDataTime);
            clearTimeout(clearCardDataTime);
        }
        const newCardDataTime = setTimeout(getNewCardData, 2000);
        const clearCardDataTime = setTimeout(clearTimeOutCardData, 4000);




    });


    //get deleteId Card getDeleteId
    $(document).on('click', '#deleteCardId', function (e) {
        event.preventDefault();
        var card_id = $("#cardId").val();
        var deletedCardId = $("#deletedCardId").val(card_id);
    });

    //delete card
    $(document).on('click', '#confirmationDelete', function (e) {
        e.preventDefault();
        $("#confirmationDelete").attr("disabled", true);
        var deleteId = $('#deletedCardId').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            url: "{{url('card/delete')}}" + '/' + deleteId,
            data: {},
            cache: false,
            success: function (response) {
                if (response.status === true) {
                    window.location.href = "{{route('home')}}";
                }
            },
            error: function (reject) {
            }
        });
    });

    $(document).on('click', '#deleteCancel', function (e) {
        event.preventDefault();
        $("#exampleModal4").modal('hide');
    });

</script>
@yield("scripts")
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
