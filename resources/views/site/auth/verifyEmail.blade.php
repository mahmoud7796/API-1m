<!doctype html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
	  <style type="text/css">
	  @import url({{asset('assets/css/style.css')}});

	  body {

}
      </style>
    <title>login Page</title>
    <link rel="shortcut icon" href="{{asset('assets/img/logo.png')}}">

</head>

<body>
<section class="row">
	<div class="col col-sm ">
	</div>

  <div class="col col-sm ml-5 pl-5" id="col1" >
	<div class="container">
		<div class="row mt-5 pl-5 mb-5 pb-5">
	  <img src="" width="80" height="80" alt=""/>
		</div>
		<div class="row mt-5 mb-5 pb-5 ">
	  <img src="" width="263" height="241" alt=""/>
		</div>
        <h1>Hello, {{$user->firstName}} </h1>

        <h2>Verification Code <a href="{{url('verify-email/').'/'.$verifyEmailToken->token}}">Click Here To Verify Your Mail</a></h2>
		<div class="row mt-5 mb-5 pb-5 pr-5">
		<p class="font-style-normall font-size-18 line-spacing-33 font-family-cairo text-muted" id="text1">1Me will Keep your Contacts Secured in our Data base</p>
		</div>

	  </div>

  </div>
	</section>
<script src="{{asset('js/bootstrap.js')}}"></script>

</body>
</html>
