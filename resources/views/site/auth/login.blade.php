<!doctype html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	  <link rel="stylesheet" href="css/bootstrap.css">
	  <style type="text/css">
	  @import url("css/style.css");

	  body {

}
      </style>
    <title>login</title>
  </head>

<body>

	<div class="container-fluid">
        <div class="container pt-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
               <div class="card-body p-5">
                <!-- Nested Row within Card Body -->
					<div class="row justify-content-center">
                    <div class="col-md-4 col-xs- p-5 mt-3  text-center">
		            <img src="img/OneMeLogo.png" width="120" height="57" alt=""/>
					</div>
					<div class="col-md-8 p-5 text-left">
					  <h2 style="font: normal normal bold 32px/60px Cairo; color: #073D79;">Login to your Account</h2>
						<h4 style="font: normal normal normal 20px/32px Cairo; color: #1F2933;">New to 1Me ?<a style="font: normal normal bold 16px/32px Cairo; color: #0A52A2;" href="{{route('site.register')}}"> Create an account Here</a></h4>
					</div>
					</div>
                   @include('site.includes.alerts.errors')
                   @include('site.includes.alerts.success')					<div class="row justify-content-center pb-3">
						<div class="col-md-6 ">
							<!-- login form -->
						<div class="row justify-content-center">
							<form action="{{route('site.postLogin')}}" method="post" class=" col-md-8  pt-3">
                                @csrf
								<div class="form-group">
                                 <input name="email" type="email" class="form-control" id="" placeholder="Email Address">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                               </div>
								<div class="form-group">
                                 <input name="password" type="password" class="form-control" id="" placeholder="Password">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                               </div>
							<div class="row justify-content-center">
								<!-- login button -->
                                <div class="col-md-5 pt-2">
                                   <button style="font: 20px/32px Cairo; color: #FFFFFF" class="btn btn-block" id="loginBtn" type="submit">
                                       Login
                                   </button>
							   </div>
							</div>
                            <div class="text-center pt-5">
							<a style="font: normal normal bold 16px/32px Cairo; color: #0A52A2;" href="">Forgot your Password ?</a>
							</div>
							</form>
						</div>
						</div>
						<div class="col-md-6 ">
								<!-- login with facbook button -->
				        <div class="row justify-content-center">
						   <div class=" col-md-8 pt-3">
							    <a href="{{route('facebook.redirect','facebook')}}" style="font: 20px Cairo; color: #FFFFFF" type="" class="btn btn-block text-left pl-5" id="facbookBtn"> <img class="pr-2"src="img/Path 1169.svg" alt=""/> Continue With Facebook</a>
							</div>
						 </div>
							<!-- login with gmail button -->
					    <div class="row justify-content-center">
						    <div class=" col-md-8 pt-3">
						      <a href="{{route('google.redirect','google')}}" style="font: 20px Cairo; color: #FFFFFF" type="" class="btn btn-block text-left pl-5" id="gmailBtn"> <img class="pr-2" src="img/Gmail.svg" alt=""/> Continue With Gmail</a>
							</div>
					    </div>
			      	    </div>
					</div>
                 </div>
              </div>
          </div>
	   </div>



<script src="js/bootstrap.js"></script>

</body>
</html>
