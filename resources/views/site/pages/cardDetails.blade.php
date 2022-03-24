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
<title>{{$users->fullName ?? ""}} Card</title>
</head>

<body>
<div class="container-fluid">
  <div class="container pt-5">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-5">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-2"><img src="{{asset($users->profile_img)}}" width="125" height="125" alt=""/></div>
          <div class="col-md-3">
            <div class="row">
              <h3 style="font: normal normal bold 24px/45px Cairo; letter-spacing: 0px; color: #1F2933;">{{$users->fullName ?? ""}}</h3>
            </div>
            <div class="row"> <a style="font: 20px/32px Cairo; color: #FFFFFF" type="submit" class="btn btn-block" id="loginBtn">Download QR</a> </div>
          </div>
          <div class="col-md-4"></div>
        </div>
        <div class="row pl-5 pt-5">
          <div class="col-md-7">
            <div class="row"> <img src="img/Gmail.png" width="40" height="40" alt=""/>
              <h4 class="pt-2 pl-2" style="font: normal normal normal 18px/21px Arial; letter-spacing: 0px; color: #1F2933;">{{$users->email ?? ""}}</h4>
            </div>
          </div>
          <div class="col-md-5"><img src="{{asset('img/QR CODE.png')}}" width="211" height="209" alt=""/></div>
        </div>
        <div class="row pt-5">
          <div class="col-md-7">
            <div class="row">
              <h4 style="font: normal normal bold 24px/45px Cairo; letter-spacing: 0px; color: #1F2933;">Powered by 1Me</h4>
              <img class="ml-2" src="{{asset('img/OneMeLogo@2x.png')}}" width="72" height="34" alt=""/></div>
            <div class="row">
              <h6 style="font: normal normal normal 18px/33px Cairo; letter-spacing: 0px; color: #52606D;">With 1Me you can create cards just like this.</h6>
            </div>
          </div>
          <div class="col-md-5 pl-5"> <a style="font: 20px/32px Cairo; color: #FFFFFF; background: #E7A82D 0% 0% no-repeat padding-box; box-shadow: 2px 2px 4px #00000029; border-radius: 15px; width: 187px; height: 54px;" type="submit" class="btn btn-block" id="">Get Yours Now</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
