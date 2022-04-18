
<nav class="navbar navbar-expand-lg fixed-top navbar-light">
  <div class="row">
    <div class="collapse navbar-collapse mr-5"></div>
    <div class="collapse navbar-collapse ml-5 mr-5 pl-5 pr-5"></div>
    <a class="navbar-brand pl-5 ml-5 pt-2 pb-3 pr-5" href="#">
        <img src="{{asset('img/OneMeLogo.png')}}" width="120" height="57" alt=""/>
    </a>
    <button style="" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a style="font: 20px/32px Cairo; color: #1F2933;" class="nav-link" href="#">Home<span class="sr-only">(current) </span></a> </li>
        <li class="nav-item ml-3"> <a style="font: 20px/32px Cairo; color: #1F2933;" class="nav-link" href="#">How it Works</a> </li>
        <li class="nav-item ml-3 pr-5"> <a style="font: 20px/32px Cairo; color: #1F2933;" class="nav-link" href="#">1Me Pro</a> </li>
      </ul>
		<div class="collapse navbar-collapse ml-5 mr-5 pl-5 pr-5"></div>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item pr-3 pt-2"> <a style="font: 20px/32px Cairo;" class="btn btn-block pt-2" id="proBtn" href="#">Get 1Me PRO </a> </li>
        <li class="nav-item dropdown"> <a style="color: #1F2933;" class="nav-link dropdown-toggle btn-lg" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="mr-3" src="{{asset('img/Ellipse 46.png')}}" width="60" height="60" alt=""/></a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a data-toggle="modal" data-target="#changProfileImg" style="font: normal normal normal 14px/26px Cairo; color: #52606D;" class="dropdown-item" href="#">Change Avatar</a>
              <a data-toggle="modal" data-target="#changPass" style="font: normal normal normal 14px/26px Cairo; color: #52606D;" class="dropdown-item" href="#">Change Password</a>
              <a style="font: normal normal normal 14px/26px Cairo; color: #52606D;"class="dropdown-item" href="{{route('site.logout')}}">Log Out</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>


{{--Change Pass modal--}}

    <div class="modal fade" id="changPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div  class="row mr-2 ml-2">
                        <button id="ChangePasswordMsgError" style="display: none" type="button" class="btn btn-lg btn-block btn-outline-danger mb-2"
                        >Your old password is wrong
                        </button>
                    </div>

                    <div  class="row mr-2 ml-2">
                        <button id="ChangePasswordMsgSucc" style="display: none" type="button" class="btn btn-lg btn-block btn-outline-success mb-2"
                        >Your password changed successfully
                        </button>
                    </div>

                    <div class="row  d-flex justify-content-center " style="font: normal normal bold 24px/45px Cairo; color: #0D67CB">

                        <p class="text-center">Change your Password</p>

                    </div>
                    <form id="changPassForm">
                        <div class="row mt-3 pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                            <input type="password" id="oldPassword" class="form-control" placeholder="Old Password">
                            <small id="oldPassword_error" class="form-text text-danger"></small>
                        </div>
                        <div class="row mt-3 pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                            <input id="password" type="password" class="form-control" placeholder="New Password">
                            <small id="password_error" class="form-text text-danger"></small>
                        </div>
                        <div class="row mt-3 pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                            <input id="password_confirmation" type="password" class="form-control" placeholder="Confirm New Password">
                        </div>
                    </form>

                </div>
                <div class="modal-footer pr-5 pt-5 pb-5">
                    <button type="button" class="btn btn-light">Reset</button>
                    <button id="changePassword" type="button" class="btn btn-warning">Change</button>

                </div>
            </div>
        </div>
    </div>

{{--End Change Pass modal--}}

{{--Change profile img modal--}}

<div class="modal fade" id="changProfileImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div  class="row mr-2 ml-2">
                    <button id="ChangeProfileMsgSucc" style="display: none" type="button" class="btn btn-lg btn-block btn-outline-success mb-2"
                    >Your photo changed successfully
                    </button>
                </div>

                <div class="row  d-flex justify-content-center " style="font: normal normal bold 24px/45px Cairo; color: #0D67CB">

                    <p class="text-center">Change your profile Picture</p>

                </div>
                <form method="post" id="changProfileForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3 pl-3 pr-3 mr-3 ml-3 d-flex justify-content-center">
                        <input type="file" name="profileImg" id="profileImg" class="form-control">
                        <small id="profileImg_error" class="form-text text-danger"></small>
                    </div>
                    <div class="modal-footer pr-5 pt-5 pb-5">
                        <button id="changUserImg" type="button" class="btn btn-warning">Change</button>
                    </div>
                </form>
                <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                     alt="preview image" style="max-height: 250px;">
            </div>

            </div>

        </div>
    </div>
</div>

{{--End Change profile img modal--}}

@section('scripts')
    <script>
        //changPass
        $(document).on('click', '#changePassword', function(e){
            $("#changePassword").attr("disabled", true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#oldPassword_error').text('');
            $('#password_error').text('');
            var password = $('#password').val();
            var oldPassword = $('#oldPassword').val();
            var passwordConfirmation = $('#password_confirmation').val();
            $.ajax({
                type: 'post',
                url: "{{route('site.profile.changePass')}}",
                data:{
                    oldPassword:oldPassword,
                    password:password,
                    password_confirmation:passwordConfirmation
                },
                cache: false,
                success: function (response){
                    if(response.status===true){
                        $('#changPassForm')[0].reset();
                        $('#ChangePasswordMsgError').hide();
                        $('#ChangePasswordMsgSucc').show();
                        $("#changePassword").attr("disabled", false);
                    }
                    if(response.status===false){
                        $('#changPassForm')[0].reset();
                        $('#ChangePasswordMsgSucc').hide();
                        $('#ChangePasswordMsgError').show();
                        $("#changePassword").attr("disabled", false);
                    }
                }, error: function (reject){
                    $("#changePassword").attr("disabled", false);
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val){
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });

        $('#changPass').on('hidden.bs.modal', function () {
            $('#changPassForm')[0].reset();
            $('#ChangePasswordMsgSucc').hide();
            $('#ChangePasswordMsgError').hide();
            $('#oldPassword_error').text('');
            $('#password_error').text('');
        });


        //change profileImage
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#profileImg').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#profileImg_error').text('');

            $(document).on('click', '#changUserImg', function(e) {
                e.preventDefault();
                var formdata = new FormData();
                jQuery.each($('#profileImg')[0].files, function(i, file) {
                    formdata.append('profileImg', file);
                });
               // console.log(formdata)
             //   var profileImg = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{route('site.profile.updatePhoto')}}",
                    data:formdata,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function (response){
                        if(response.status===true){
                            //   $('#changProfileForm')[0].reset();
                            $('#ChangeProfileMsgSucc').show();
                            $("#changUserImg").attr("disabled", false);
                        }
                    }, error: function (reject){
                        $("#changUserImg").attr("disabled", false);
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function(key, val){
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                });
            });
        });
/*
        $(document).on('click', '#changUserImg', function(e) {
            e.preventDefault();
            $("#changUserImg").attr("disabled", true);
            $('#profileImg_error').text('');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var profileImg = $('#profileImg').val()
            console.log(profileImg)
            $('#profileImg_error').text('');
            $.ajax({
                type: 'post',
                url: "{{route('site.profile.updatePhoto')}}",
                data: {
                    profileImg:profileImg
                },
                enctype: 'multipart/form-data',
                success: function (response){
                    if(response.status===true){
                     //   $('#changProfileForm')[0].reset();
                        $('#ChangeProfileMsgSucc').show();
                        $("#changUserImg").attr("disabled", false);
                    }
                }, error: function (reject){
                    $("#changUserImg").attr("disabled", false);
                 //   console.log('maddddddddddddd')
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val){
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
*/

        $('#changProfileImg').on('hidden.bs.modal', function () {
            $('#changProfileForm')[0].reset();
            $('#ChangeProfileMsgSucc').hide();
            $('#profileImg_error').text('');
        });
</script>
    @stop
