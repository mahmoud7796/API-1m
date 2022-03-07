<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <style type="text/css">
	  @import url("{{asset('assets/css/style.css')}}");

	  body {

      }
      </style>

    <title>profile</title>
  </head>
<body>
	<div class="container-fluid">
@include('site.includes.header')

	<section class="pt-5 mt-5">


	 <div class="row pt-5 mt-5  d-flex justify-content-center font-weight-bold" style="font-size: 22px">
         <button data-id="{{encrypt(97)}}" id="getUrl" class="btn btn-success">Share</button>
<input id="cardUrl" type="text" value=""><br><br>
	<p class="text-center">Card QR</p><br><br>
	</div>

	</section>


	</div>
    <h1>Card Info of {{$users->fullName}}</h1><br>
    <h2>name: {{$users->fullName}}</h2>
    <h2>card Name: {{$cards->name}} </h2>
    <h2>Qr Code</h2>
    <img src="{{asset($cards->qr_url)}}">
    <h2>card contacts</h2>
    @if(isset($contacts)&&$contacts->count()>0)
        @foreach($contacts as $contact)
    <div>
        <img width="100 px" height="100 px" src="{{asset($contact->provider->imgURL)}}">
        <h2>{{$contact->contact_string}}</h2>
    </div>
        @endforeach
        @endif


    <script>
    $(document).on('click', '#getUrl', function(e){
        var cardId = $(this).data('id');
        var cardUrl = "{{asset('show/').'/'.encrypt(97)}}";
        console.log(cardUrl)

        $('#cardUrl').val(cardUrl);
        console.log(cardId)
    });
</script>
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
</body>
</html>
