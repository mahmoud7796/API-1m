<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.css">
<style type="text/css">
@import url("css/style.css");
body {
}
</style>
<title>Forgot password Notify</title>
</head>

<body>
<div class="container-fluid">
  <div class="row" id="center">
    <div class="card o-hidden col-md-8 border-0 shadow-lg my-5">
      <div class="card-body p-5">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <div class="col-md-4 pl-5  mb-3"> <img src="img/OneMeLogo.png" width="120" height="57" alt=""/> </div>
          <div class="col-md-8 text-left">
            <h2 style="font: normal normal bold 32px/60px Cairo; color: #073D79;">Reset your Password</h2>
          </div>
        </div>
        <div class="row pt-5">
          <div class="col-md-8 pb-3 pl-5">
              @if(Session::has('userEmail'))
            <h4 style="font: 20px/32px Cairo; color: #1F2933;">Please check <span class="font-weight-bold" >{{Session::get('userEmail')}}</span>, we've sent you a message, you can follow it's instructions to reset your Password</h4>
                  @else
                  <h4 style="font: 20px/32px Cairo; color: #1F2933;">Please check Your mail, we've sent you a message, you can follow it's instructions to reset your Password</h4>
                   @endif
           </div>
          <div class="col-md-4 pb-3"> <img src="img/Component 15 – 3.png" width="312" height="101" alt=""/></div>
          <div class="row ml-5">
            <h4 style="font: 20px/32px Cairo; color: #1F2933;">Nothing there ? <a style="color: #073D79;" href="">Click Here to Resend</a></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>
