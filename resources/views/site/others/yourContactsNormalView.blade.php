<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
<style type="text/css">
@import url("{{asset('css/style1.css')}}");
body {
}
</style>
<title>Your Contacts Normal view</title>
</head>

<body>
<div class="container-fluid">
@include('header')
  <div class="row justify-content-center pt-5">
    <div class="card col-md-8 o-hidden border-0 shadow-lg my-5 ">
      <div class="card-body ">
        <!-- Nested Row within Card Body -->
        <div class="row pb-5">
          <div class="col-md-6 pt-5 text-left">
            <div class="row">
              <div class="col-md-8">
                <div class="input-group rounded"> <span style="background-color: #E4E7EB; border-top-left-radius: 15px; border-bottom-left-radius: 15px;" class="input-group-text border-0" id="search-addon"><i class="fas fa-search"></i></span>
                  <input style="border: none; background-color: #E4E7EB; height:  53px; font: 18px/29px Cairo;" type="search" class="form-control" id="searchinput" placeholder=" Enter a Card Name" aria-label="Search"
  aria-describedby="search-addon" />
                  <span style="background-color: #52606D; color: #FFFFFF; border-bottom-right-radius: 15px; border-top-right-radius: 15px; font: 18px/29px Cairo;" class="input-group-text border-0" id="search-addon">search</span> </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 pt-5 text-center">
            <div style=" border-radius: 10px; height: 54px;" class="row justify-content-end">
              <div style="background-color: #E7F0FB; border-bottom-left-radius: 10px; border-top-left-radius: 10px;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="{{route('home')}}">Your Cards</a></div>
              <div style="background-color: #E7F0FB;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="{{route('site.contacts.index')}}">Your Contact Info</a></div>
              <div style="background-color: #0E67CB; border-radius: 10px;" class="col-md-4 pt-2"> <a style="font: normal normal normal 20px/32px cairo; color: #FFFFFF;" href="{{route('site.contacts.addedContact')}}">Your Contact</a></div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center pt-5">
          <h3 style="font: normal normal bold 24px/60px Cairo; color: #1F2933;">If you scanned somebody else's card, they'll be added as a contact here.</h3>
        </div>
        <div class="row justify-content-center">
          <h3 style="font: normal normal 24px/60px Cairo; color: #1F2933;">You can view the cards you scanned for each contact by pressing on their name</h3>
        </div>
        <div class="row pt-5">
          <div class="col-md-3 pt-5 pl-5 pr-5">
            <div class="row"> <img src="{{asset('img/Ellipse 46.png')}}" width="72" height="72" alt=""/>
              <h6 style="font: normal normal normal 20px/32px cairo;" class="pt-4 pl-3">Ahmed Said</h6>
            </div>
          </div>
          <div class="col-md-3 pt-5 pl-5 pr-5">
            <div class="row"> <img src="{{asset('img/Ellipse 46.png')}}" width="72" height="72" alt=""/>
              <h6 style="font: normal normal normal 20px/32px cairo;" class="pt-4 pl-3">Ahmed Said</h6>
            </div>
          </div>
          <div class="col-md-3 pt-5 pl-5 pr-5">
            <div class="row"> <img src="{{asset('img/Ellipse 46.png')}}" width="72" height="72" alt=""/>
              <h6 style="font: normal normal normal 20px/32px cairo;" class="pt-4 pl-3">Ahmed Said</h6>
            </div>
          </div>
          <div class="col-md-3 pt-5 pl-5 pr-5">
            <div class="row"> <img src="{{asset('img/Ellipse 46.png')}}" width="72" height="72" alt=""/>
              <h6 style="font: normal normal normal 20px/32px cairo;" class="pt-4 pl-3">Ahmed Said</h6>
            </div>
          </div>
        </div>
        <div class="row justify-content-center pt-5">
          <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
            <ul class="pagination">
              <li class="paginate_button page-item previous disabled" id="dataTable_previous"> <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a> </li>
              <li class="paginate_button page-item active" ><a style="background-color: #0D67CB;" href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a> </li>
              <li class="paginate_button page-item "> <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a> </li>
              <li class="paginate_button page-item "> <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a> </li>
              <li class="paginate_button page-item next" id="dataTable_next"> <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
</div>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
