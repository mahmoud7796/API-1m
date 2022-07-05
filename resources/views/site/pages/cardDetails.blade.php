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
    <link rel="icon" type="image/png" href="{{asset('img/OneMeLogo1.png')}}">
</head>

<body>
<div class="container-fluid">

    <div class="container pt-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-5">
                <!-- Nested Row within Card Body -->
                <div class="row profile">
                    <div class="col-md-3"></div>
                    <div class="col-md-2">
                        @if($users->profile_img)
                            <img src="{{asset("public/".$users->profile_img)}}" width="125" height="125" alt=""/>
                        @else
                            <img src="{{asset('public/img/defaultAvatar.png')}}" width="125" height="125" alt=""/>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <div>
                            <h3 style="font: normal normal bold 24px/45px Cairo; letter-spacing: 0px; color: #1F2933;">{{$users->fullName ?? ""}}</h3>
                            @if(isset($cards->company_name))
                                <p><strong>Company Name: </strong>{{$cards->company_name}}</p>
                            @endif
                            @if(isset($cards->job_title))
                                <p><strong>Job Title: </strong>{{$cards->job_title}}</p>
                            @endif
                        </div>
                        <div class="row"> <a href="{{route('downloadVcf', $cards->id)}}" style="font: 20px/32px Cairo; color: #FFFFFF" type="submit" class="btn btn-block" id="loginBtn">Download Contacts as VCF</a> </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div>
                    <div class="row pl-5 pt-5 contact">
                        <div class="col-md-7">

                            {{--emails--}}
                            @if($mailContacts->count()>0 || $mobileContacts->count()>0 || $officeContacts->count()>0 || $otherContacts->count()>0)
                                @forelse($mailContacts as $mailContact)
                                    <div style="width:400px;">
                                        @if($mailContact->provider->imgURL)
                                            <img class="float-left mr-2" src="{{asset($mailContact->provider->imgURL)}}" width="30" height="30" alt=""/>
                                        @else
                                            <img class="float-left mr-3" src="https://1me.live/public/public/img/catalog-default-img-modified.png" alt="" style="width: 30px; height: 30px;">
                                        @endif
                                        <h4 class="pt-2 pl-2" style="font: normal 16px/21px Arial; letter-spacing: 0px; color: #1F2933;font-size:15px;">{{$mailContact->contact_string ?? ""}}</h4><br>
                                        <div class="clearfix"></div>
                                    </div>
                                @empty
                                    <h4 class="pt-2 pl-2" style="font: normal normal normal 18px/21px Arial; letter-spacing: 0px; color: #1F2933;"></h4>
                                @endforelse

                                {{--mobiles--}}
                                @forelse($mobileContacts as $mobileContact)
                                    <div>
                                        @if($mobileContact->provider->imgURL)
                                            <img class="float-left mr-2" src="{{asset($mobileContact->provider->imgURL)}}" width="30" height="30" alt=""/>
                                        @else
                                            <img class="float-left mr-3" src="https://1me.live/public/public/img/catalog-default-img-modified.png" alt="" style="width: 30px; height: 30px;">
                                        @endif
                                        <h4 class="pt-2 pl-2" style="font: normal normal normal 16px/21px Arial; letter-spacing: 0px; color: #1F2933;">{{$mobileContact->contact_string ?? ""}}</h4><br>
                                        <div class="clearfix"></div>
                                    </div>
                                @empty
                                    <h4 class="pt-2 pl-2" style="font:normal 18px/21px Arial; letter-spacing: 0px; color: #1F2933;"></h4>
                                @endforelse

                                {{--office--}}
                                @forelse($officeContacts as $officeContact)
                                    <div>
                                        @if($officeContact->provider->imgURL)
                                            <img class="float-left mr-2" src="{{asset($officeContact->provider->imgURL)}}" width="30" height="30" alt=""/>
                                        @else
                                            <img class="float-left mr-3" src="https://1me.live/public/public/img/catalog-default-img-modified.png" alt="" style="width: 30px; height: 30px;">
                                        @endif
                                        <h4 class="pt-2 pl-2" style="font:normal 16px/21px Arial; letter-spacing: 0px; color: #1F2933;">{{$officeContact->contact_string ?? ""}}</h4><br>
                                        <div class="clearfix"></div>
                                    </div>
                                @empty
                                    <h4 class="pt-2 pl-2" style="font:normal 18px/21px Arial; letter-spacing: 0px; color: #1F2933;"></h4>
                                @endforelse

                                {{--other--}}
                                @forelse($otherContacts as $otherContact)
                                    <div>
                                        @if($otherContact->provider->imgURL)
                                            <img class="float-left mr-2" src="{{asset($otherContact->provider->imgURL)}}" width="30" height="30" alt=""/>
                                        @else
                                            <img class="float-left mr-3" src="https://1me.live/public/public/img/catalog-default-img-modified.png" alt="" style="width: 30px; height: 30px;">
                                        @endif
                                        <h4 class="pt-2 pl-2" style="font:normal 16px/21px Arial; letter-spacing: 0px; color: #1F2933;">{{$otherContact->contact_string ?? ""}}</h4><br>
                                        <div class="clearfix"></div>
                                    </div>
                                @empty
                                    <h4 class="pt-2 pl-2" style="font:normal 18px/21px Arial; letter-spacing: 0px; color: #1F2933;"></h4>
                                @endforelse

                            @else
                                <h4 class="pt-2 pl-2" style="font:normal 18px/21px Arial; letter-spacing: 0px; color: #1F2933;">There is no contacts</h4>
                            @endif

                        </div>
                        <div class="col-md-5">
                            <img src="{{asset('public/'.$cards->qr_url)}}" width="211" height="209" alt=""/>
                        </div>
                    </div>
                </div>

                <div class="row pt-5 powered">
                    <div class="col-md-7">
                        <div class="row title1me">
                            <h4 style="font: normal normal bold 24px/45px Cairo; letter-spacing: 0px; color: #1F2933;">Powered by 1Me</h4>
                            <img class="ml-2" src="{{asset('img/OneMeLogo@2x.png')}}" width="72" height="34" alt=""/></div>
                        <div class="row">
                            <h6 style="font: normal normal normal 18px/33px Cairo; letter-spacing: 0px; color: #52606D;">With 1Me you can create cards just like this.</h6>
                        </div>
                    </div>
                    <div class="col-md-5 pl-5"> <a href="{{route('site.register')}}" style="font: 20px/32px Cairo; color: #FFFFFF; background: #E7A82D 0% 0% no-repeat padding-box; box-shadow: 2px 2px 4px #00000029; border-radius: 15px; width: 187px; height: 54px;" type="submit" class="btn btn-block" id="">Get Yours Now</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
