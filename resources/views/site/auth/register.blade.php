<!doctype html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	  <link rel="stylesheet" href="css/bootstrap.css">
	  <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
	  <style type="text/css">
	  @import url("css/style.css");

      .invalid {
          color: red !important;
      }

      .valid {
          color: green !important;
      }
      </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <title>Register</title>
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
					  <h2 style="font: normal normal bold 32px/60px Cairo; color: #073D79;">Create a New Account</h2>
						<h4 style="font: normal normal normal 20px/32px Cairo; color: #1F2933;">Already have an Account ? <a style="font: normal normal bold 16px/32px Cairo; color: #0A52A2;" href="{{route('site.login')}}">Login here</a></h4>
					</div>
					</div>
                @include('site.includes.alerts.errors')
                @include('site.includes.alerts.success')
                <div class="row justify-content-center pb-3">
						<div class="col-md-6 ">
							<div class="text-center pt-3">
								<h4 style="font: normal normal normal 20px/32px Cairo; color: #1F2933; ">Sign in with email</h4>
							</div>

							<!-- registration form -->
						<div class="row justify-content-center">
							<form action="{{route('site.register.create')}}" method="post" class=" col-md-9  pt-3">
                                @csrf
                                <div class="form-group">
                                 <input value="{{old('fullName')}}" name="fullName" type="text" class="form-control" id=""  placeholder="Full Name">
                                    @error('fullName')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                               </div>
								<div class="form-group">
                                 <input value="{{old('email')}}" name="email" type="email" class="form-control" id="" placeholder="Email Address">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                               </div>
								<div class="form-group">
                                 <input  name="password" type="password" class="form-control" id="password"  placeholder="Password" title="">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                               </div>
                               <div class="row">
                                        <h2 style="font: normal normal normal 16px/32px Cairo;" class="pl-4">Your password <span style="font: bold 16px/32px Cairo;">MUST</span> have</h2>
                                        <div class="col-md-7">
                                            <ul>
                                                <li class="invalid"  id="Length" style="font: normal normal normal 16px/32px Cairo;">At least 8 Characters</li>
                                                <li class="invalid"  id="LowerCase" style="font: normal normal normal 16px/32px Cairo; ">1 lower case letter</li>
                                                <li class="invalid"  id="UpperCase"  style="font: normal normal normal 16px/32px Cairo; ">1 UPPER CASE LETTER</li>

                                            </ul>
                                        </div>
                                        <div class="col-md-5">
                                            <ul>
                                                <li class="invalid"  id="Numbers" style="font: normal normal normal 16px/32px Cairo; ">A number</li>
                                                <li class="invalid"  id="Symbols" style="font: normal normal normal 16px/32px Cairo; ">A symbol</li>
                                            </ul>
                                        </div>
                                    </div>
                               <div class="form-group">
                                 <input name="password_confirmation" type="password" class="form-control" id="" placeholder="Confirm Password">
                               </div>
                               <div class="form-check">
								 <input name="terms" style="width: 16px; height: 16px; border: 1px solid #0D67CB;" type="checkbox" class="form-check-input" id="exampleCheck1">
                                 <label class="form-check-label pl-2" style="font: normal normal normal 16px/32px Cairo;" for="exampleCheck1">I Agree to the <a style="font: normal normal bold 16px/32px Cairo; color: #0D67CB;" href="">Terms and Conditions</a></label><br>
                                   @error('terms')
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>

								<!-- create acc button -->
								<div class="row justify-content-end">
								  <div class="col-md-8 pt-3">
                                          <button type="submit" style="font: 20px/32px Cairo; color: #FFFFFF"  class="btn btn-block" id="createBtn">Create an account</button>
								  </div>
								</div>
                            </form>
						</div>
						</div>
						<div class="col-md-6 ">
								<div class="text-center pt-">
								<h4 style="font: normal normal normal 20px/32px Cairo; color: #1F2933; ">OR</h4>
							</div>
								<div class="text-center pt-3">
								<h4 style="font: normal normal normal 20px/32px Cairo; color: #1F2933; ">Sign in with another method</h4>
							</div>
								<!-- register with facbook button -->
				<div class="row justify-content-center">
						 <div class=" col-md-8 pt-3">
							    <a href="{{route('facebook.redirect','facebook')}}" style="font: 20px Cairo; color: #FFFFFF" type="" class="btn btn-block text-left pl-5" id="facbookBtn"> <img class="pr-2"src="img/Path 1169.svg" alt=""/> Continue With Facebook</a>
							</div>
							</div>
							<!-- register with gmail button -->
					<div class="row justify-content-center">
						 <div class=" col-md-8 pt-3">
						      <a href="{{route('google.redirect','google')}}" style="font: 20px Cairo; color: #FFFFFF" type="" class="btn btn-block text-left pl-5" id="gmailBtn"> <img class="pr-2" src="img/Gmail.svg" alt=""/> Continue With Gmail</a>
							</div>
					</div>
				    <div class="text-center pt-5">
						    <img src="img/Group 104.png" width="312" height="102" class="img-fluid pt-3" alt=""/>
							</div>
			      		</div>
					</div>
                 </div>
              </div>
          </div>
	   </div>




<script src="js/bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover({
                html: true,
                content: function() {
                    return $('#popover-content').html();
                }
            });
        });
        $( '[data-toggle="popover"]' ).blur(function() {
            $('[data-toggle="popover"]').popover('hide');
        });

        /*Password validation*/
        function ValidatePassword() {
            /*Array of rules and the information target*/
            var rules = [{
                Pattern: "[A-Z]",
                Target: "UpperCase"
            },
                {
                    Pattern: "[a-z]",
                    Target: "LowerCase"
                },
                {
                    Pattern: "[0-9]",
                    Target: "Numbers"
                },
                {
                    Pattern: "[!@@#$%^&*]",
                    Target: "Symbols"
                }
            ];

            //Just grab the password once
            var password = $('#password').val();

            /*Length Check, add and remove class could be chained*/
            /*I've left them seperate here so you can see what is going on */
            /*Note the Ternary operators ? : to select the classes*/
            $("#Length").removeClass(password.length > 7 ? "invalid" : "valid");
            $("#Length").addClass(password.length > 7 ? "valid" : "invalid");

            /*Iterate our remaining rules. The logic is the same as for Length*/
            for (var i = 0; i < rules.length; i++) {
                $("#" + rules[i].Target).removeClass(new RegExp(rules[i].Pattern).test(password) ? "invalid" : "valid");
                $("#" + rules[i].Target).addClass(new RegExp(rules[i].Pattern).test(password) ? "valid" : "invalid");
            }
        }

        /*Bind our event to key up for the field. It doesn't matter if it's delete or not*/
        $( "#password" ).keyup(function() {
            ValidatePassword()
        });
    </script>

</body>
</html>
