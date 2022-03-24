<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">\
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
<style type="text/css">
@import url("css/style.css");
body {
}
</style>
<title>Verify Email</title>
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
            <h2 style="font: normal normal bold 32px/60px Cairo; color: #073D79;">Send verification mail</h2>
          </div>
        </div>
          @include('site.includes.alerts.errors')
          @include('site.includes.alerts.success')
          <div id="msg-succ" style="display: none"  class="mt-5 row mr-2 ml-2">
              <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                      id="type-error">Verivication mail sent successfully, Please check your inbox</button>
          </div>
          <div id="notRecord" style="display: none"  class="mt-5 row mr-2 ml-2">
              <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                      id="type-error">This email is not in our record</button>
          </div>

          <p style="text-align: center;display: none" class="alert alert-success" id="sendMsg">Verification mail
              send successfully</p>
          <div class="row justify-content-center pt-3">

          <h4 style="font: 20px/32px Cairo; color: #1F2933;">Enter your email address to send verification email</h4>

        </div>
          <form method="" action="">
              @csrf
              <div class="row pt-3">
                  <div class="col-md-7">
                      <div class="form-group">
                          <input name="email" style="width: 500px; height: 50px;" type="email" class="form-control" id="userEmail" placeholder="Type Your Email Address">
                          <span id="email_error" class="form-text text-danger"></span>
                      </div>
                  </div>
                  <!-- Continue btn -->
                  <div class="col-md-5"><button class="btn" id="continueBtn" style="font: 20px/32px Cairo; color: #FFFFFF" type="submit">Send</button></div>
                  <div style="text-align: center;margin-top: 40px">
                      <span class="alert alert-info" style="display: none;margin-left: 250px;" id="waitMinute">please wait a minute to resend again</span>
                  </div>

              </div>

          </form>
        <div class="row justify-content-center pt-5"><a style="font: bold 16px/32px Cairo; color: #0A52A2;" href="{{route('home')}}">Back to home</a></div>
      </div>
    </div>
  </div>
</div>
<script>
    //resent mail

    $(document).on('click', '#continueBtn', function (e) {
        e.preventDefault();
        $("#continueBtn").attr("disabled", true);
        var userEmail = $('#userEmail').val()
        $('#email_error').text('');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: "{{url('/send-verification')}}",
            data: {
                email:userEmail
            },
            cache: false,
            success: function (response) {
                if (response.status === true) {
                    $('#sendMsg').show()
                    $('#waitMinute').show()
                    $('#notRecord').hide()

                    setInterval(function () {
                        $("#continueBtn").attr("disabled", false);
                    }, 60000);
                }else if(response.status === false) {
                    $("#continueBtn").attr("disabled", false);
                    $('#notRecord').show()
                    $('#sendMsg').hide()
                    $('#waitMinute').hide()
                }
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function(key, val){
                    $("#" + key + "_error").text(val[0]);
                });
                $('#notRecord').hide()
                $('#sendMsg').hide()
                $('#waitMinute').hide()
                $("#continueBtn").attr("disabled", false);

            }
        });
    });
</script>
<script src="js/bootstrap.js"></script>
</body>
</html>
