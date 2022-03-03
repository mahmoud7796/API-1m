<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<style type="text/css">
@import url("{{asset('css/style.css')}}");
body {
}
</style>
<title>Change Password</title>
</head>

<body>
<div class="container-fluid">
  <div style="" class="container" id="center">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-5">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <div class="col-md-4 pl-5 mb-3"> <img src="{{asset('img/OneMeLogo.png')}}" width="120" height="57" alt=""/> </div>
          <div class="col-md-8 text-left">
            <h2 style="font: normal normal bold 32px/60px Cairo; color: #073D79;">Change Password</h2>
          </div>
        </div>
          @include('site.includes.alerts.errors')
          @include('site.includes.alerts.success')
          <form method="POST" action="{{route('site.changePass')}}">
              @csrf
              <input value="{{$token}}" name="token" type="hidden" class="" id="" placeholder="">
              <div class="row pt-3 pl-5">
                  <div class="col-md-4">
                      <div class="form-group">
                          <input name="password" style="width: 300px; height: 50px;" type="password" class="form-control" id="" placeholder="Enter New Password">
                          @error('password')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <input name="password_confirmation" style="width: 300px; height: 50px;" type="password" class="form-control" id="" placeholder="Confirm New Password">
                      </div>
                  </div>
                  <!-- Rest password btn -->
                  <div class="col-md-4"><button style="font: 20px/32px Cairo; color: #FFFFFF" type="submit" class="btn btn-block" id="restPasswordBtn">Reset Password</button></div>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>
