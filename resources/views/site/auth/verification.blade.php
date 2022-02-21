<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <title>Verification</title>

</head>

<body>

<div class="container-fluid">
    <div style="" class="container" id="center">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-5">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <h2 style="font: normal normal bold 32px/60px Cairo; color: #073D79;">Verify your Account</h2>
                </div>
                <p style="display: none;text-align: center" class="alert alert-success" id="sendMsg">Verification mail
                    send successfully</p>

                <div class="row pt-5">
                    <div class="col-md-8">
                        @if(Session::has('userEmail'))
                            <h4 style="font: normal normal normal 20px/32px Cairo; color: #1F2933;">Please check
                                <span id="userEmail" style="font: normal normal bold 20px/32px Cairo; color: #1F2933;">{{Session::get('userEmail')}}</span>
                                , We have sent you an email with a confirmation link Nothing there ? <a id="sendEmail"
                                    style="font: normal normal bold 20px/32px Cairo; color: #073D79;" href="">Click Here
                                    to Resend</a></h4>
                            <span class="alert alert-info" style="display: none" id="waitMinute">please wait a minute to resend again</span>
                        @else
                            <h4 style="font: normal normal normal 20px/32px Cairo; color: #1F2933;">Please check <span
                                    style="font: normal normal bold 20px/32px Cairo; color: #1F2933;">your mail</span>
                                , We have sent you an email with a confirmation link Nothing there ? <a
                                    style="font: normal normal bold 20px/32px Cairo; color: #073D79;" href="">Click Here
                                    to Resend</a></h4>                        @endif
                    </div>
                    <div class="col-md-4">
                        <img src="img/Component 15 – 3.png" width="312" height="101" class="img-fluid" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    //resent mail

    $(document).on('click', '#sendEmail', function (e) {
        e.preventDefault();
        $("#sendEmail").attr("disabled", true);
        var userEmail = $('#userEmail').text()
        console.log(userEmail)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'get',
            url: "{{url('/resend-verify')}}" + '/' + userEmail,
            data: {},
            cache: false,
            success: function (response) {
                if (response.status === true) {
                    $('#sendMsg').show()
                    $('#waitMinute').show()
                    setInterval(function () {
                        $("#sendEmail").attr("disabled", false);
                    }, 60000);
                }
            },
            error: function (reject) {
            }
        });
    });
</script>
<script src="js/bootstrap.js"></script>

</body>
</html>
