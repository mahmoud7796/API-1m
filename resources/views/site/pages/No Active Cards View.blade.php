<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.css">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<style type="text/css">
@import url("css/style1.css");
body {
}
</style>
<title>Home-No Active Cards View</title>
</head>

<body>
<div class="container-fluid">
  <nav class="navbar navbar-expand-lg fixed-top navbar-light">
    <div class="row">
		<div class="collapse navbar-collapse mr-5"></div>
		<div class="collapse navbar-collapse ml-5 mr-5 pl-5 pr-5"></div>
		<a class="navbar-brand pl-5 ml-5 pt-2 pb-3 pr-5" href="#"><img src="img/OneMeLogo.png" width="120" height="57" alt=""/></a>
      <button style="" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active "> <a style="font: bold 20px/32px Cairo; color: #073D79;" class="nav-link" href="#">Your Cards<span class="sr-only">(current) </span></a> </li>
          <li class="nav-item ml-3"> <a style="font: 20px/32px Cairo; color: #1F2933;" class="nav-link" href="#">Your Contact info</a> </li>
          <li class="nav-item ml-3 pr-5"> <a style="font: 20px/32px Cairo; color: #1F2933;" class="nav-link" href="#">Your Contacts</a> </li>
        </ul>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item pr-3 pt-2"> <a style="font: 20px/32px Cairo;" class="btn btn-block pt-2" id="proBtn" href="#">Get 1Me PRO </a> </li>
          <li class="nav-item pr-3 pt-2"> <a class="" href="#"><img src="img/Ellipse 46.png" width="60" height="60" alt=""/></a> </li>
          <li class="nav-item pt-2"> <a style="font: 20px/32px Cairo; color: #1F2933;" class="btn btn-block" id="" href="#">Log Out</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="row justify-content-center">
    <div class="card col-md-8 o-hidden border-0 shadow-lg my-5 ">
      <div class="card-body pt-5"> 
        <!-- Nested Row within Card Body -->
        <div class="row pt-5">
          <div class="col-md-6">
            <div class="row ">
              <div class="col-md-8 text-left pt-3">
                <div class="input-group rounded"> <span style="background-color: #E4E7EB; border-top-left-radius: 15px; border-bottom-left-radius: 15px;" class="input-group-text border-0" id="search-addon"><i class="fas fa-search"></i></span>
                  <input style="border: none; background-color: #E4E7EB; height:  53px; font: 18px/29px Cairo;" type="search" class="form-control" id="searchinput" placeholder=" Enter a Card Name" aria-label="Search"
  aria-describedby="search-addon" />
                  <span style="background-color: #52606D; color: #FFFFFF; border-bottom-right-radius: 15px; border-top-right-radius: 15px; font: 18px/29px Cairo;" class="input-group-text border-0" id="search-addon">search</span> </div>
              </div>
              <div class="col-md-4 pt-3 pl-5"><a style="font: 20px/32px Cairo; color: #FFFFFF" type="submit" class="btn btn-block" id="newCardBtn" data-toggle="modal" data-target="#exampleModal">New Card</a></div>
              
              <!-- new card Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                      <div class="row justify-content-center">
                        <h4 style="font: normal normal bold 24px/45px Cairo;">New Card</h4>
                      </div>
                      <div class="row pb-5">
                        <div class="col-md-7">
                          <div class="row pl-5 pt-5">
                            <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Contact information</h5>
                          </div>
                          <div class="row pl-5 pt-">
                            <h6 style="font: 20px/37px Cairo; color: #52606D;">Add verified contact information to this card</h6>
                          </div>
                          <div class="pt-3">
                            <div class="card card-modal" style="">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-2 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
                                  <div class="col-md-6 pl-5">
                                    <div class="row">
                                      <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">Personal Account</h6>
                                      <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                                    </div>
                                    <!--                                  <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>--> 
                                  </div>
                                  <div class="col-md-4 pt-3">
                                    <label class="switch">
                                      <input type="checkbox" checked>
                                      <span class="slider round"></span> </label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-2 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
                                  <div class="col-md-6 pl-5">
                                    <div class="row">
                                      <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">Personal Account</h6>
                                      <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                                    </div>
                                    <!--                                  <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>--> 
                                  </div>
                                  <div class="col-md-4 pt-3">
                                    <label class="switch">
                                      <input type="checkbox" checked>
                                      <span class="slider round"></span> </label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-2 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
                                  <div class="col-md-6 pl-5">
                                    <div class="row">
                                      <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">Personal Account</h6>
                                      <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                                    </div>
                                    <!--                                  <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>--> 
                                  </div>
                                  <div class="col-md-4 pt-3">
                                    <label class="switch">
                                      <input type="checkbox" checked>
                                      <span class="slider round"></span> </label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-2 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
                                  <div class="col-md-6 pl-5">
                                    <div class="row">
                                      <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">Personal Account</h6>
                                      <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                                    </div>
                                    <!--                                  <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>--> 
                                  </div>
                                  <div class="col-md-4 pt-3">
                                    <label class="switch">
                                      <input type="checkbox" checked>
                                      <span class="slider round"></span> </label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-2 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
                                  <div class="col-md-6 pl-5">
                                    <div class="row">
                                      <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">Personal Account</h6>
                                      <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                                    </div>
                                    <!--                                  <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>--> 
                                  </div>
                                  <div class="col-md-4 pt-3">
                                    <label class="switch">
                                      <input type="checkbox" checked>
                                      <span class="slider round"></span> </label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-2 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
                                  <div class="col-md-6 pl-5">
                                    <div class="row">
                                      <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">Personal Account</h6>
                                      <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                                    </div>
                                    <!--                                  <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>--> 
                                  </div>
                                  <div class="col-md-4 pt-3">
                                    <label class="switch">
                                      <input type="checkbox" checked>
                                      <span class="slider round"></span> </label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-2 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
                                  <div class="col-md-6 pl-5">
                                    <div class="row">
                                      <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">Personal Account</h6>
                                      <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                                    </div>
                                    <!--                                  <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>--> 
                                  </div>
                                  <div class="col-md-4 pt-3">
                                    <label class="switch">
                                      <input type="checkbox" checked>
                                      <span class="slider round"></span> </label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-2 pt-3 pl-4"><img src="img/Facebook.svg" alt="" style="width: 40px; height: 40px;"/></div>
                                  <div class="col-md-6 pl-5">
                                    <div class="row">
                                      <h6 style="font: normal normal normal 16px/30px Cairo; color: #1F2933;">Personal Account</h6>
                                      <h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7>
                                    </div>
                                    <!--                                  <div class="row"><h7 style="font: normal normal normal 14px/26px Cairo; color: #52606D;">/Johnsmith22</h7></div>--> 
                                  </div>
                                  <div class="col-md-4 pt-3">
                                    <label class="switch">
                                      <input type="checkbox" checked>
                                      <span class="slider round"></span> </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="row pl-5 pt-5">
                            <h5 style="font: bold 20px/37px Cairo; color: #1F2933;">Card Details</h5>
                          </div>
                          <div class="row pr-3">
                            <div class="col-md-12">
                              <form action="">
                                <div class="form-group">
                                  <input style="font: 16px/30px Cairo;" type="name" class="form-control" placeholder="Card Name" id="cardName">
                                </div>
                                <div class="form-group">
                                  <textarea style="font: 16px/30px Cairo;" class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="Card Description"></textarea>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="row pt-5 mt-5"></div>
                          <div class="row pt-5 mt-5 pr-5 justify-content-end">
                            <div class="col-md-8 pt-3 pl-5"><a style="font: 20px/32px Cairo; color: #FFFFFF" type="submit" class="btn btn-block" id="createCardBtn1">Create Card</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
--> 
                  </div>
                </div>
              </div>
            </div>
            <div class="row pt-5 pl-3">
              <h3 style="font: normal normal bold 32px/60px Cairo; color: #1F2933;">Your Cards</h3>
            </div>
            <div class="">
              <div class="card " style="background: #F5F7FA 0% 0% no-repeat padding-box; border-radius: 15px;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-7 pl-4">
                      <div class="row">
                        <h3 style="font: normal normal bold 24px/45px Cairo; color: #073D79;">Business Card 1</h3>
                      </div>
                      <div class="row pt-2">
                        <h6 style="font: normal normal normal 16px/24px Cairo; color: #1F2933;">ABC co. Card</h6>
                      </div>
                      <div class="row pt-3"><img class="pr-2" src="img/Gmail.svg" alt=""/><img class="pr-2" src="img/Facebook.svg" alt=""/><img class="pr-2" src="img/Instgram.svg" alt=""/><img src="img/Phone Number.svg" alt=""/></div>
                    </div>
                    <div class="col-md-5">
                      <div class="row">
                        <div class="col-md-6"> <a href="" style=" font: 16px/30px Cairo; color: #1F2933; background: #E7A82D 0% 0% no-repeat padding-box; width: 81px; height: 40px; border-radius: 25px;" class="btn btn-block">4 Scans</a> </div>
                        <div class="col-md-6"> <a href="" style=" font: 16px/30px Cairo; color: #FFFFFF; background: #77082E 0% 0% no-repeat padding-box; width: 81px; height: 40px; border-radius: 25px;" class="btn btn-block ">3 Adds</a> </div>
                      </div>
                      <div class="row justify-content-end pr-4 pt-5"><a href="" style=" font: 16px/30px Cairo; color: #FFFFFF; background: #0D67CB 0% 0% no-repeat padding-box; width: 87px; height: 46px; border-radius: 15px;" class="btn btn-block" data-toggle="modal" data-target="#exampleModal1">Share</a></div>
                    </div>
                    
                    <!-- share button Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            <div class="row justify-content-center">
                              <h5 style="font: normal normal bold 24px/45px Cairo;">Share Card via...</h5>
                            </div>
                            <div class="row justify-content-center">
                              <div class="col-md-2 "><a href=""><img src="img/Gmail1.svg" alt=""/></a>
                                <p>Send Email</p>
                              </div>
                              <div class="col-md-3 text-center"><a href=""><img src="img/Download.svg" alt=""/></a>
                                <p >Download Image</p>
                              </div>
                            </div>
                            <div class="row justify-content-center">
                              <div class="form-group ">
                                <input style="width: 338px; height: 50px;" type="text" class="form-control" id="" aria-describedby="basic-addon3" placeholder="1Me.live/user#1234/6251248">
                              </div>
                              <a class="pl-3 pt-2" href="">Copy</a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="pt-5">
              <div class="card " style="background: #F5F7FA 0% 0% no-repeat padding-box; border-radius: 15px;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-7 pl-4">
                      <div class="row">
                        <h3 style="font: normal normal bold 24px/45px Cairo; color: #073D79;">Business Card 2</h3>
                      </div>
                      <div class="row pt-2">
                        <h6 style="font: normal normal normal 16px/24px Cairo; color: #1F2933;">Advertising Agency Business Information</h6>
                      </div>
                      <div class="row pt-3"><img class="pr-2" src="img/Gmail.svg" alt=""/><img class="pr-2" src="img/Facebook.svg" alt=""/><img class="pr-2" src="img/Instgram.svg" alt=""/><img src="img/Phone Number.svg" alt=""/></div>
                    </div>
                    <div class="col-md-5">
                      <div class="row">
                        <div class="col-md-6"> <a href="" style=" font: 16px/30px Cairo; color: #1F2933; background: #E7A82D 0% 0% no-repeat padding-box; width: 81px; height: 40px; border-radius: 25px;" class="btn btn-block">4 Scans</a> </div>
                        <div class="col-md-6"> <a href="" style=" font: 16px/30px Cairo; color: #FFFFFF; background: #77082E 0% 0% no-repeat padding-box; width: 81px; height: 40px; border-radius: 25px;" class="btn btn-block ">3 Adds</a> </div>
                      </div>
                      <div class="row justify-content-end pr-4 pt-5"><a href="" style=" font: 16px/30px Cairo; color: #FFFFFF; background: #0D67CB 0% 0% no-repeat padding-box; width: 87px; height: 46px; border-radius: 15px;" class="btn btn-block" data-toggle="modal" data-target="#exampleModal2">Share</a></div>
                    </div>
                    <!-- share button Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            <div class="row justify-content-center">
                              <h5 style="font: normal normal bold 24px/45px Cairo;">Share Card via...</h5>
                            </div>
                            <div class="row justify-content-center">
                              <div class="col-md-2 "><a href=""><img src="img/Gmail1.svg" alt=""/></a>
                                <p>Send Email</p>
                              </div>
                              <div class="col-md-3 text-center"><a href=""><img src="img/Download.svg" alt=""/></a>
                                <p >Download Image</p>
                              </div>
                            </div>
                            <div class="row justify-content-center">
                              <div class="form-group ">
                                <input style="width: 338px; height: 50px;" type="text" class="form-control" id="" aria-describedby="basic-addon3" placeholder="1Me.live/user#1234/6251248">
                              </div>
                              <a class="pl-3 pt-2" href="">Copy</a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="pt-5">
              <div class="card " style="background: #F5F7FA 0% 0% no-repeat padding-box; border-radius: 15px;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-7 pl-4">
                      <div class="row">
                        <h3 style="font: normal normal bold 24px/45px Cairo; color: #073D79;">Personal Card</h3>
                      </div>
                      <div class="row pt-2">
                        <h6 style="font: normal normal normal 16px/24px Cairo; color: #1F2933;">My Personal Data</h6>
                      </div>
                      <div class="row pt-3"><img class="pr-2" src="img/Gmail.svg" alt=""/><img class="pr-2" src="img/Facebook.svg" alt=""/><img class="pr-2" src="img/Instgram.svg" alt=""/><img src="img/Phone Number.svg" alt=""/></div>
                    </div>
                    <div class="col-md-5">
                      <div class="row">
                        <div class="col-md-6"> <a href="" style=" font: 16px/30px Cairo; color: #1F2933; background: #E7A82D 0% 0% no-repeat padding-box; width: 81px; height: 40px; border-radius: 25px;" class="btn btn-block">4 Scans</a> </div>
                        <div class="col-md-6"> <a href="" style=" font: 16px/30px Cairo; color: #FFFFFF; background: #77082E 0% 0% no-repeat padding-box; width: 81px; height: 40px; border-radius: 25px;" class="btn btn-block ">3 Adds</a> </div>
                      </div>
                      <div class="row justify-content-end pr-4 pt-5"><a href="" style=" font: 16px/30px Cairo; color: #FFFFFF; background: #0D67CB 0% 0% no-repeat padding-box; width: 87px; height: 46px; border-radius: 15px;" class="btn btn-block" data-toggle="modal" data-target="#exampleModal3">Share</a></div>
                    </div>
                    <!-- share button Modal -->
                    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                          </div>
                          <div class="modal-body">
                            <div class="row justify-content-center">
                              <h5 style="font: normal normal bold 24px/45px Cairo;">Share Card via...</h5>
                            </div>
                            <div class="row justify-content-center">
                              <div class="col-md-2 "><a href=""><img src="img/Gmail1.svg" alt=""/></a>
                                <p>Send Email</p>
                              </div>
                              <div class="col-md-3 text-center"><a href=""><img src="img/Download.svg" alt=""/></a>
                                <p >Download Image</p>
                              </div>
                            </div>
                            <div class="row justify-content-center">
                              <div class="form-group ">
                                <input style="width: 338px; height: 50px;" type="text" class="form-control" id="" aria-describedby="basic-addon3" placeholder="1Me.live/user#1234/6251248">
                              </div>
                              <a class="pl-3 pt-2" href="">Copy</a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center pt-5">
              <div class="col-sm-12 col-md-7">
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
          <div class="col-md-6 text-center my-auto pl-5 pt-5">
            <h4 class="pb-5" style="font: normal normal bold 24px/45px Cairo;">Card Details</h4>
            <img class="" src="img/Component 15 – 7.png" width="312" height="101" alt=""/> </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="text-center" style="background-color:#E7F0FB; width: 100%"> 
    <!-- Grid container -->
    <div class="container p-4">
      <div class="row pt-5">
        <div class="col-md-3 pr-5"><img src="img/OneMeLogo.png" width="220" height="105" alt=""/></div>
        <div class="col-md-6">
          <div class="row ">
            <div class="col-md-2" ><a href="" style="font: 20px/37px Cairo; color: #1F2933;">FAQ</a> </div>
            <div class="col-md-4"><a href="" style="font: 20px/37px Cairo; color: #1F2933;">Privacy Policy</a></div>
            <div class="col-md-6"><a href="" style="font: 20px/37px Cairo; color: #1F2933;">Terms and Conditions</a></div>
          </div>
          <div class="row pt-5 justify-content-center">
            <div class="col-md-2 pt-2"><img src="img/Path 60.png" width="32" height="32" alt=""/></div>
            <div class="col-md-2 pt-2"><img src="img/insta.png" width="32" height="32" alt=""/></div>
            <div class="col-md-2 pt-2"><img src="img/Path 56.png" width="32" height="32" alt=""/></div>
          </div>
          <div class="col-md-3"> </div>
        </div>
      </div>
      <!-- Grid container --> 
      
      <!-- Copyright -->
      <div class="text-center pt-5" style="font: 14px/26px Cairo;">© Initium Solutions 2022 | All Rights Reserved</div>
      <!-- Copyright --> 
    </div>
  </footer>
</div>
<script src="js/jquery-3.2.1.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>
