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
    </style>
    <title>Added Contacts</title>
</head>

<body>
<div class="container-fluid">
    @include('site.includes.header')
    <div style="margin-bottom:75px;margin-right:0px;" class="row justify-content-center pt-5">
        <div class="card col-md-8 o-hidden border-0 shadow-lg my-5 ">
            <div style="width:1200px;" class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row pb-5">
                    <div class="col-md-6 pt-5 text-left">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group rounded"> <span style="background-color: #E4E7EB; border-top-left-radius: 15px; border-bottom-left-radius: 15px;" class="input-group-text border-0" id="search-addon"><i class="fas fa-search"></i></span>
                                    <input style="border: none; background-color: #E4E7EB; height:  53px; font: 18px/29px Cairo;" type="search" class="form-control" id="searchinput" placeholder=" Enter a Card Name" aria-label="Search"
                                           aria-describedby="search-addon" />
                                    <span style="background-color: #52606D; color: #FFFFFF; border-bottom-right-radius: 15px; border-top-right-radius: 15px; font: 18px/29px Cairo;" class="input-group-text border-0" id="search-addon">search</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-5 text-center">
                        <div style=" border-radius: 10px; height: 54px;" class="row justify-content-end">
                            <div style="background-color: #E7F0FB; border-bottom-left-radius: 10px; border-top-left-radius: 10px;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="{{route('home')}}">Your Cards</a></div>
                            <div style="background-color: #E7F0FB;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="{{route('site.contacts.index')}}">Your Contact Info</a></div>
                            <div style="background-color: #0E67CB; border-radius: 10px;" class="col-md-4 pt-2"> <a style="font: normal normal normal 20px/32px cairo; color: #FFFFFF;" href="{{route('site.contacts.addedContact')}}">Your Contact</a></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <h3 style="font:normal normal 24px/60px Cairo; color: #1F2933;"><strong>{{$addedUser->fullName}}</strong> Cards That You Scan</h3>
                </div>
                <div class="row pt-5">
                    @if(isset($cards)&&$cards->count()>0)
                        @foreach($cards as $card)
                            <div style="width: 350px;margin-right:9px;margin-bottom: 9px">
                                <div data-id="146" class="card headerCardColor" style="border-top: 10px solid #0D67CB; background: #F5F7FA 0% 0% no-repeat padding-box; border-radius: 15px; display: grid">
                                    <div class="card-body row">
                                        <a data-id="" id="editCard" href="" class="col-md-7">
                                            <div class="row pl-2">
                                                <h3 data-id="146" class="cardNameText" style="font: normal normal bold 24px/45px Cairo; color: #073D79;">
                                                    {{$card->name}}</h3>
                                                <input id="addedId" type="hidden" value="{{$card->user_id}}">
                                            </div>
                                            <div class="row pt-2 pl-2">
                                                <h6 data-id="146" class="cardDescriptionText" style="font: normal normal normal 16px/24px Cairo; color: #1F2933;">
                                                   {{$card->description ?? 'There is no description'}}</h6>
                                            </div>
                                        </a>
                                        <div class="col-md-5 ">
                                            <a id="viewContact" data-id="{{$card->id}}" data-toggle="modal" data-target="#contactModal" href="" class="row justify-content-end">
                                                <div data-toggle="tooltip" data-placement="top" title="View Contacts" class="col-md-6 pt-3">
                                                    <img class="pr-2" width="40px" heghit="40px" src="{{asset('img/view.jpg')}}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <!-- share button Modal -->
                                        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div id="appendContacts" class="modal-body">
                                                        <div class="row">
                                                            <div style="margin-left:9px;width: 100%">
                                                                <img class="float-left mr-3" src="https://1me.live/public/images/providers/facebook1.png" width="30" height="30" alt="">
                                                                <h4 class="pt-2 pl-2" style="font: normal normal normal 18px/21px Arial; letter-spacing: 0px; color: #1F2933;">mdaada</h4><br>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end share button Modal -->

                                    </div>
                                </div>
                            </div>

                                    @endforeach
                                @else
                                    <h3 style="width: 100%;text-align:center;font: normal normal 24px/60px Cairo; color: gray;">There is no scaned card or has been removed by your friend</h3>
                                @endif

                            </div>
                            <div class="row justify-content-center pt-5">

                            </div>
                </div>
            </div>
        </div>
        @include('site.includes.footer')
    </div>
</div>

@yield("scripts")
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });



    $(document).on('click', '#viewContact', function(e){
        event.preventDefault();
        var cardId = $(this).data('id');
        var addedId = $('#addedId').val();
        console.log(addedId)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            url: "{{url("/connection/connection-card-contact/")}}" +'/'+ cardId,
            data: {
                addedId:addedId,
            },
            cache: false,
            success: function (response){
              //  console.log(response)
                if(response.status===true){
                    $.each(response.data, function(key, value) {
                        console.log(value.id)
                         var contactee =contact + '<div style="margin-left:9px;width: 100%"><img class="float-left mr-3" src="'+value.provider.imgURL+'" width="30" height="30" alt=""><h4 class="pt-2 pl-2" style="font: normal normal normal 18px/21px Arial; letter-spacing: 0px; color: #1F2933;">'+value.contact_string+'</h4><br><div class="clearfix"></div></div>';
                    });
                    console.log(contactee)
                   // $("#appendContacts").html(contactee);
                }else {

                }
            },
            error: function (reject){
                console.log(reject)

            }
        });
        function contactFormEdit(){
           // $('#editContactForm')[0].reset();
        }
        $('#contactModalEdit').on('hidden.bs.modal', function () {
          //  contactFormEdit();
         //   $('#contact_error_edit').text('');
        });
    });

</script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
