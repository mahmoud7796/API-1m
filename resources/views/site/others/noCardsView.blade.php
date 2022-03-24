<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.css">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<style type="text/css">
@import url("css/style1.css");
body {
}
</style>
<title>Home-No Cards View</title>
</head>

<body>
<div class="container-fluid">
    @include('site.includes.header')
    <div class="row justify-content-center pt-5">
    <div class="card col-md-8 o-hidden border-0 shadow-lg my-5 ">
      <div class="card-body p-5"> 
        <!-- Nested Row within Card Body -->
        
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
                                  <input style="font: 16px/30px Cairo;" type="name" class="form-control" placeholder="Card Name" id="cardName">
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
          <div class="col-md-6 pt-5 pb-5 text-center">
            <div style=" border-radius: 10px; height: 54px;" class="row justify-content-end">
              <div style="background-color: #0E67CB; border-radius: 10px;" class="col-md-4 pt-2"> <a style="font: normal normal normal 20px/32px cairo; color: #FFFFFF;" href="">Your Cards</a></div>
              <div style="background-color: #E7F0FB;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="">Your Contact Info</a></div>
              <div style="background-color: #E7F0FB; border-bottom-right-radius: 10px; border-top-right-radius: 10px;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="">Your Contacts</a></div>
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
      </div>
    </div>
  </div>
  @include('site.includes.footer')
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
