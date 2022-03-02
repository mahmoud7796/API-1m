<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<style type="text/css">
@import url("css/style1.css");
body {
}
</style>
<title>Your Contact info</title>
</head>

<body>
<div class="container-fluid">
@include('site.includes.header')
  <div class="row justify-content-center pt-5">
    <div class="card col-md-8 o-hidden border-0 shadow-lg my-5 ">
      <div class="card-body pt-5">
        <!-- Nested Row within Card Body -->
        <div class="row ">
          <div class="col-md-6 pt-3 text-left">
            <div class="row">
              <div class="col-md-8">
                <div class="input-group rounded"> <span style="background-color: #E4E7EB; border-top-left-radius: 15px; border-bottom-left-radius: 15px;" class="input-group-text border-0" id="search-addon"><i class="fas fa-search"></i></span>
                  <input style="border: none; background-color: #E4E7EB; height:  53px; font: 18px/29px Cairo;" type="search" class="form-control" id="searchinput" placeholder=" Enter a Card Name" aria-label="Search"
  aria-describedby="search-addon" />
                  <span style="background-color: #52606D; color: #FFFFFF; border-bottom-right-radius: 15px; border-top-right-radius: 15px; font: 18px/29px Cairo;" class="input-group-text border-0" id="search-addon">search</span> </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 pt-3 text-center">
            <div style=" border-radius: 10px; height: 54px;" class="row justify-content-end">
              <div style="background-color: #E7F0FB; border-bottom-left-radius: 10px; border-top-left-radius: 10px; " class="col-md-4 pt-2"> <a style="font: normal normal normal 20px/32px cairo; color: #1F2933;" href="">Your Cards</a></div>
              <div style="background-color: #0E67CB;  border-radius: 10px;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color:#FFFFFF;" href="">Your Contact Info</a></div>
              <div style="background-color: #E7F0FB; border-bottom-right-radius: 10px; border-top-right-radius: 10px;" class="col-md-4 pt-2"><a style=" font: normal normal normal 20px/32px cairo; color: #1F2933;" href="">Your Contacts</a></div>
            </div>
          </div>
        </div>
        <div class="row pt-5">
          <div class="col-md-9 pt-5">
            <h3 style="font: normal normal bold  24px/45px Cairo; color: #1F2933;">Verified Contact Information</h3>
          </div>
          <div class="col-md-3 pt-5"><a style="font: 20px cairo; color: #FFFFFF" type="submit" class="btn btn-block float-right" id="newContactInfoBtn" data-toggle="modal" data-target="#exampleModal"><img class="pr-2" src="img/Icon ionic-ios-add.svg" alt=""/>New Contact Information</a></div>
        </div>
        <div class="row">
          <div class="col-md-4 pl-5 pr-5">
            <div class="row pt-5">
              <div class="col-md-2 pt-2 "><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
              <div class="col-md-7">
                <h6 style="font: normal normal normal 15px/30px Cairo; color: #1F2933;">Personal Account</h6>
                <h7 style="font: normal normal normal 13px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
              </div>
              <div class="col-md-3 pt-2"> <img data-toggle="modal" data-target="#exampleModal4" class="float-right" src="img/Group 322.svg" alt=""/></div>
              <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content" id="deleteModal">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                      <div class="row justify-content-center">
                        <h5 style="font: normal normal bold 24px/45px Cairo;">Delete This Contact ?</h5>
                      </div>
                      <div class="row justify-content-center">
                        <h7 style="font: 20px/45px Cairo; color: #52606D;">Are you sure ? This Cannot be undone</h7>
                      </div>
                      <div class="row justify-content-center pt-3 pb-3">
                        <div class="col-md-3"><a style="font: 20px/37px Cairo; color: #1F2933;" href="" class="btn btn-block">Cancel</a></div>
                        <div class="col-md-3"><a style="background: #C52528 0% 0% no-repeat padding-box; font: 20px/32px Cairo; color: #FFFFFF;" href="" class="btn btn-block" id="deletemodalBtn">Delete</a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 pl-5 pr-5">
            <div class="row pt-5">
              <div class="col-md-2 pt-2 "><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
              <div class="col-md-7">
                <h6 style="font: normal normal normal 15px/30px Cairo; color: #1F2933;">Personal Account</h6>
                <h7 style="font: normal normal normal 13px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
              </div>
              <div class="col-md-3 pt-2"> <img  data-toggle="modal" data-target="#exampleModal4" class="float-right" src="img/Group 322.svg" alt=""/> </div>
            </div>
          </div>
          <div class="col-md-4 pl-5 pr-5">
            <div class="row pt-5">
              <div class="col-md-2 pt-2 "><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
              <div class="col-md-7">
                <h6 style="font: normal normal normal 15px/30px Cairo; color: #1F2933;">Personal Account</h6>
                <h7 style="font: normal normal normal 13px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
              </div>
              <div class="col-md-3 pt-2"> <img data-toggle="modal" data-target="#exampleModal4" class="float-right" src="img/Group 322.svg" alt=""/> </div>
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
        <div class="row pt-5 pl-2">
          <h3 style="font: normal normal bold  24px/45px Cairo; color: #1F2933;">Unverified Contact Information</h3>
        </div>
        <div class="row">
          <div class="col-md-4 pl-5 pr-5">
            <div class="row pt-5">
              <div class="col-md-2 pt-2 "><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
              <div class="col-md-7">
                <h6 style="font: normal normal normal 15px/30px Cairo; color: #1F2933;">Personal Account</h6>
                <h7 style="font: normal normal normal 13px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
              </div>
              <div class="col-md-3 pt-2"><img class="float-right" src="img/Group 323.svg" alt=""/></div>
            </div>
          </div>
          <div class="col-md-4 pl-5 pr-5">
            <div class="row pt-5">
              <div class="col-md-2 pt-2 "><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
              <div class="col-md-7">
                <h6 style="font: normal normal normal 15px/30px Cairo; color: #1F2933;">Personal Account</h6>
                <h7 style="font: normal normal normal 13px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
              </div>
              <div class="col-md-3 pt-2"><img class="float-right" src="img/Group 323.svg" alt=""/></div>
            </div>
          </div>
          <div class="col-md-4 pl-5 pr-5">
            <div class="row pt-5">
              <div class="col-md-2 pt-2 "><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
              <div class="col-md-7">
                <h6 style="font: normal normal normal 15px/30px Cairo; color: #1F2933;">Personal Account</h6>
                <h7 style="font: normal normal normal 13px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
              </div>
              <div class="col-md-3 pt-2"><img class="float-right" src="img/Group 323.svg" alt=""/></div>
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
    @include('site.includes.footer')
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
