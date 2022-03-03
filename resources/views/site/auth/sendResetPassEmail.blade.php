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
<title>Forgot password</title>
</head>

<body>
<div class="container-fluid">
  <div style="" class="container" id="center">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-5">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <div class="col-md-4  text-center mb-3"> <img src="img/OneMeLogo.png" width="120" height="57" alt=""/> </div><br>
          <div class="col-md-8 text-left">
            <h2 style="font: normal normal bold 32px/60px Cairo; color: #073D79;">Forgot your password ?</h2>
          </div>
        </div>
          @include('site.includes.alerts.errors')
          @include('site.includes.alerts.success')
          <div class="row justify-content-center pt-3">
          <h4 style="font: 20px/32px Cairo; color: #1F2933;">Enter your email address to continue</h4>
        </div>
          <form method="POST" action="{{route('site.postForgotPass')}}">
              @csrf
              <div class="row pt-3">
                  <div class="col-md-7">
                      <div class="form-group">
                          <input name="email" style="width: 500px; height: 50px;" type="email" class="form-control" id="" placeholder="Type Your Email Address">
                          @error('email')
                          <span class="text-danger ml-auto">{{$message}}</span>
                          @enderror
                      </div>
                  </div>
                  <!-- Continue btn -->
                  <div class="col-md-5"><button class="btn" id="continueBtn" style="font: 20px/32px Cairo; color: #FFFFFF" type="submit">Continue</button></div>
              </div>

          </form>
        <div class="row justify-content-center pt-5"><a style="font: bold 16px/32px Cairo; color: #0A52A2;" href="{{route('site.login')}}">Back to Login</a></div>
      </div>
    </div>
  </div>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>
