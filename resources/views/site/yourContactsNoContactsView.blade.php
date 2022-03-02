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
<title>Your Contacts No contacts view</title>
</head>

<body>
<div class="container-fluid">
@include('header')
  <div class="row justify-content-center">
    <div class="card col-md-8 o-hidden border-0 shadow-lg my-5 ">
      <div class="card-body p-5"> 
        <!-- Nested Row within Card Body -->
        
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="row justify-content- pt-5">
              <h3 style="font: normal normal bold 24px/60px Cairo; color: #1F2933;">You Haven't Scanned any Cards</h3>
            </div>
            <div class="row justify-content-">
              <h4 style="font: 20px/60px Cairo; color: #1F2933;">When you scan someone else's card, they will be added as a contact here</h4>
            </div>
          </div>
          <div class="col-md-6 pt-5 pl-5 text-center">
            <div style=" border-radius: 10px; height: 54px;" class="row justify-content-end">
              <div style="background-color: #E7F0FB; border-bottom-left-radius: 10px; border-top-left-radius: 10px;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="">Your Cards</a></div>
				  <div style="background-color: #E7F0FB;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="">Your Contact Info</a></div>
              <div style="background-color: #0E67CB; border-radius: 10px;" class="col-md-4 pt-2"> <a style="font: normal normal normal 20px/32px cairo; color: #FFFFFF;" href="">Your Contact</a></div>
            
            </div>
          </div>
        </div>
        <div class="row justify-content-center pt-3">
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
          <div class="col-md-6 pl-5 text-center"> <img src="img/card details.png" class="img-fluid" width="342" height="486" alt=""/> </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
</div>
<script src="js/jquery-3.2.1.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>
