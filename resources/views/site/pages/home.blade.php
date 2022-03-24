<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.css">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

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
                <div class="input-group rounded"> <span style="background-color: #E4E7EB; border-top-left-radius: 15px; border-bottom-left-radius: 15px;" class="input-group-text border-0" id="search-addon"><i class="fas fa-search"></i></span>
                  <input style="border: none; background-color: #E4E7EB; height:  53px; font: 18px/29px Cairo;" type="search" class="form-control" id="searchinput" placeholder=" Enter a Card Name" aria-label="Search" aria-describedby="search-addon" />
                  <span style="background-color: #52606D; color: #FFFFFF; border-bottom-right-radius: 15px; border-top-right-radius: 15px; font: 18px/29px Cairo;" class="input-group-text border-0" id="search-addon">search</span> </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 text-center pt-5">
            <div style=" border-radius: 10px; height: 54px;" class="row justify-content-end">
              <div style="background-color: #0E67CB; border-radius: 10px;" class="col-md-4 pt-2"> <a style="font: normal normal normal 20px/32px cairo; color: #FFFFFF;" href="{{route('home')}}">Your Cards</a></div>
              <div style="background-color: #E7F0FB;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="{{route('site.contacts.index')}}">Your Contact Info</a></div>
              <div style="background-color: #E7F0FB; border-bottom-right-radius: 10px; border-top-right-radius: 10px;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="{{route('site.contacts.addedContact')}}">Your Contacts</a></div>
            </div>
          </div>
        </div>
          @if($cards->count()>0)

          <div class="row pt-4">
          <div class="col-md-6 pt-5">
            <h3 style="font: normal normal bold 32px/60px Cairo; color: #1F2933;">Your Cards</h3>
          </div>
          <div class="col-md-6 pt-5"><a style="font: 20px/32px cairo; color: #FFFFFF" type="submit" class="btn btn-block float-right" id="newCardBtn" data-toggle="modal" data-target="#exampleModal"><img class="pr-2" src="img/Icon ionic-ios-add.svg" alt=""/> New Card </a></div>
          <!-- new card Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row justify-content-center">
                    <h4 style="font: normal normal bold 24px/45px Cairo;">New Card</h4>
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
                            <div class="row">
                              <div class="col-md-2 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
                              <div class="col-md-6 pl-5">
                                <div class="row">
                                  <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">Personal Account</h6>
                                  <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                                </div>

                              </div>
                              <div class="col-md-4 pt-3">
                                <label class="switch">
                                  <input type="checkbox" checked>
                                  <span class="slider round"></span> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="row pl-5 pt-5">
                        <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Card Details</h5>
                      </div>
                      <div class="row pr-3">
                        <div class="col-md-12">
                          <form action="">
                            <div class="form-group">
                              <input style="font: 16px/30px Cairo;" type="text" class="form-control" placeholder="Card Name" id="cardName">
                            </div>
                            <div class="form-group">
                              <textarea style="font: 16px/30px Cairo;" class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="Card Description"></textarea>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="row pt-5 mt-5"></div>
                      <div class="row pt-5 mt-5 pr-5 justify-content-end">
                        <div class="col-md-8 pt-3 pl-5"><a style="font: 20px/32px Cairo; color: #FFFFFF" type="submit" class="btn btn-block" id="createCardBtn1">Create Card</a></div>
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
            <div class="">
                  <div class="card" style="border-top: 10px solid #9EC2EA; background: #F5F7FA 0% 0% no-repeat padding-box; border-radius: 15px; display: grid">
                <div class="card-body row"> <a href="" class="col-md-7">
                  <div class="row pl-2">
                    <h3 style="font: normal normal bold 24px/45px Cairo; color: #073D79;">{{$card->name}}</h3>
                  </div>
                  <div class="row pt-2 pl-2">
                    <h6 style="font: normal normal normal 16px/24px Cairo; color: #1F2933;">ABC test co. Card</h6>
                  </div>
                  <div class="row pt-3 pl-2"><img class="pr-2" src="img/Gmail.svg" alt=""/><img class="pr-2" src="img/Facebook.svg" alt=""/><img class="mr-2"  src="img/instagram (4).png" width="28" height="28" alt=""/><img class="pr-2"  src="img/Telegram.svg" alt=""/><img class="pr-2"  src="img/phone.svg" alt=""/><img class="pr-2"  src="img/Pinterest.svg" alt=""/><img class="pr-2" src="img/Snap Chat.svg" alt=""/><img class="pr-2"  src="img/Twitter.svg" alt=""/><img class="pr-2" src="img/WhatsApp.svg" alt=""/></div>
                  </a>
                  <div class="col-md-5 ">
					<a href="" class="row justify-content-end">
                    <div class="col-md-6 pt-3">
                      <div style=" font: 14px Cairo; color: #1F2933; background: #E9901C 0% 0% no-repeat padding-box; height: 40px; border-radius: 25px;" class="btn btn-block">4 Scans</div>
                    </div>
                    <div class="col-md-6 pt-3">
                      <div href="" style=" font: 14px Cairo; color: #FFFFFF; background: #52606D 0% 0% no-repeat padding-box;  height: 40px; border-radius: 25px;" class="btn btn-block ">3 Adds</div>
                    </div>
                    </a>
                    <div class="row justify-content-end pt-5">
                      <div id="share" href="" style=" font: 16px/30px Cairo; color: #0E67CB; background: 0% 0% no-repeat padding-box; border-radius: 15px;" data-id="{{encrypt($card->id)}}" class="btn" data-toggle="modal" data-target="#exampleModal1"><img class="pr-2" src="img/Icon ionic-md-share.svg" alt=""/> Share</div>
                    </div>
                  </div>

                  <!-- share button Modal -->
                  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                          <div class="row justify-content-center">
                            <h5 style="font: normal normal bold 24px/45px Cairo;">Share Card via...</h5>
                          </div>
                          <div class="row justify-content-center">
                            <div class="col-md-2 "><a href=""><img src="img/Gmail1.svg" alt=""/></a>
                              <p>Send Email</p>
                            </div>
                            <div class="col-md-3 text-center"><a href=""><img src="img/Download.svg" alt=""/></a>
                              <p >Download Image</p>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                            <div class="form-group ">
                              <input style="width: 338px; height: 50px;" type="text" class="form-control" id="cardUrl" aria-describedby="basic-addon3" placeholder="1Me.live/user#1234/6251248">
                            </div>
                            <button onclick="copy()" id="copy" class="pl-3 pt-2 btn btn-success">Copy</button>
                            </div>
                            <span style="display:none" class="text-success" id="copied">Copied Successfully</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><br>
            @endforeach
                      <div class="d-flex justify-content-center">
                          {!! $cards->links('vendor.pagination.bootstrap-4') !!}
                      </div>
          </div>
            <div style="border-top: 10px solid #9EC2EA; background-color: #F5F7FA; border-radius: 10px;" class="col-md-6 pl-3">
            <div class="row ">
              <div class="col-md-7 pt-5">
                <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Card Details</h5>
              </div>
              <div class="col-md-5">
                <div class="row justify-content-center ">
                  <div class="col-md-6 pt-5"> <a href="" style=" font: 14px Cairo; color: #1F2933; background: #E9901C 0% 0% no-repeat padding-box;  height: 40px; border-radius: 25px;" class="btn btn-block">4 Scans</a> </div>
                  <div class="col-md-6 pt-5"> <a href="" style=" font: 14px Cairo; color: #FFFFFF; background: #52606D 0% 0% no-repeat padding-box;  height: 40px; border-radius: 25px;" class="btn btn-block">3 Adds</a> </div>
                </div>
              </div>
            </div>
            <div class="row pt-5 pr-3">
              <div class="col-md-12">
                <form action="">
                  <div class="form-group">
                    <input style="font: 16px/30px Cairo;" type="name" class="form-control" placeholder="Business Card 1" id="cardName1">
                  </div>
                  <div class="form-group">
                    <textarea style="font: 16px/30px Cairo;" class="form-control" id="exampleFormControlTextarea2" rows="4" placeholder="ABC co. Card"></textarea>
                  </div>
                </form>
              </div>
            </div>
            <div class="row pt-5 pl-5">
              <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Verified Contact Info</h5>
            </div>

            <div class="row scroll">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-1 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 30px; height: 30px;"/></div>
                  <div class="col-md-7 pl-5">
                    <div class="row">
                      <h6 style="font: normal normal normal 15px/30px Cairo; color: #1F2933;">Personal Account</h6>
                      <h7 style="font: normal normal normal 13px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                    </div>
                    <!--   <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>-->
                  </div>
                  <div class="col-md-2 pt-3">
                    <label class="switch">
                      <input type="checkbox" checked>
                      <span class="slider round"></span> </label>
                  </div>
                </div>
              </div>
              <div class="col-md-6 pl-">
                <div class="row">
                  <div class="col-md-1 pt-3 pl-4"><img src="img/instagram (4).png" alt="" style="width: 30px; height: 30px;"/></div>
                  <div class="col-md-7 pl-5">
                    <div class="row">
                      <h6 style="font: normal normal normal 14px/30px Cairo; color: #1F2933;">Personal Account</h6>
                      <h7 style="font: normal normal normal 11px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                    </div>
                    <!--   <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>-->
                  </div>
                  <div class="col-md-2 pt-3">
                    <label class="switch">
                      <input type="checkbox" checked>
                      <span class="slider round"></span> </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row pb-5 pr-3 ">
              <div class="col-md-6"></div>
              <div class="col-md-3 pt-5"><a href="" style="font: bold 16px/32px Cairo; " class="btn btn-block btn-outline-danger" id="deleteCardBtn" data-toggle="modal" data-target="#exampleModal4">Delete Card</a></div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content" id="deleteModal">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                      <div class="row justify-content-center">
                        <h5 style="font: normal normal bold 24px/45px Cairo;">Delete This Card ?</h5>
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
              <div class="col-md-3 pt-5"><a href="" style="font: 16px/32px Cairo; color: #6B6B6B;" class="btn btn-block" id="saveChangesBtn">Save Changes</a></div>

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
                          <div class="col-md-5"> <a href=""  style="font: 20px Cairo; color: #FFFFFF"  class="btn btn-block" id="createCardBtn" data-toggle="modal" data-target="#exampleModal">Create Your First Card</a> </div>
                      </div>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-body">
                                      <div class="row justify-content-center">
                                          <h4 style="font: normal normal bold 24px/45px Cairo;">New Card</h4>
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
                                                          <div class="row">
                                                              <div class="col-md-2 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
                                                              <div class="col-md-6 pl-5">
                                                                  <div class="row">
                                                                      <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">Personal Account</h6>
                                                                      <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                                                                  </div>
                                                                  <!--                                  <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>-->
                                                              </div>
                                                              <div class="col-md-4 pt-3">
                                                                  <label class="switch">
                                                                      <input type="checkbox" checked>
                                                                      <span class="slider round"></span> </label>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-5">
                                              <div class="row pl-5 pt-5">
                                                  <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Card Details</h5>
                                              </div>
                                              <div class="row pr-3">
                                                  <div class="col-md-12">
                                                      <form action="">
                                                          <div class="form-group">
                                                              <input style="font: 16px/30px Cairo;" type="text" class="form-control" placeholder="Card Name" id="cardName">
                                                          </div>
                                                          <div class="form-group">
                                                              <textarea style="font: 16px/30px Cairo;" class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="Card Description"></textarea>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                              <div class="row pt-5 mt-5"></div>
                                              <div class="row pt-5 mt-5 pr-5 justify-content-end">
                                                  <div class="col-md-8 pt-3 pl-5"><a style="font: 20px/32px Cairo; color: #FFFFFF" type="submit" class="btn btn-block" id="createCardBtn1">Create Card</a></div>
                                              </div>
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
                          <div class="card" style="background: #E4E7EB 0% 0% no-repeat padding-box; border-radius: 10px;">
                              <div class="card-body">
                                  <h5 class="card-title" style="font: normal normal bold 16px/30px Cairo; color: #1F2933;">What are Cards ?</h5>
                                  <p class="card-text" style="font: 16px/30px Cairo; color: #52606D;">Cards are collections containing a group of your contact information. Each card will have a unique QR code for others to scan and add your contact information.</p>
                              </div>
                          </div>
                      </div>
                      <div class="row pt-4">
                          <div class="card" style="background: #E4E7EB 0% 0% no-repeat padding-box; border-radius: 10px;">
                              <div class="card-body">
                                  <h5 class="card-title" style="font: normal normal bold 16px/30px Cairo; color: #1F2933;">How do I create a card ?</h5>
                                  <p class="card-text" style="font: 16px/30px Cairo; color: #52606D;">Simply press the above button and Customize the name, description and other content within the card. Then you'll be able to share it with others.</p>
                              </div>
                          </div>
                      </div>
                      <div class="row pt-4">
                          <div class="card" style="background: #E4E7EB 0% 0% no-repeat padding-box; border-radius: 10px;">
                              <div class="card-body">
                                  <h5 class="card-title" style="font: normal normal bold 16px/30px Cairo; color: #1F2933;">What if I make any changes ?</h5>
                                  <p class="card-text" style="font: 16px/30px Cairo; color: #52606D;">No worries, With 1Me any changes you make to your card data will automatically be updated for the people you shared the card with.</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 pl-5 pt-5 text-center"> <img src="img/card details.png" class="img-fluid" width="342" height="486" alt=""/> </div>
              </div>
          @endif

      </div>
    </div>
  </div>
    @include('site.includes.footer')
</div>

    <script>
    $(document).on('click', '#share', function(e){
       var encId =  $(this).data("id")
       var userId =$('#userId').val()
        var cardUrl = "{{asset('card-show/').'/'}}"+encId+"/"+userId;
        $('#cardUrl').val(cardUrl)
        console.log(encId)
        console.log(userId)
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
      t.innerHTML = ''
    }

</script>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
