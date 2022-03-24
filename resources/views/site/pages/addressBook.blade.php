<!doctype html>
<html lang="en">
    
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
	  <style type="text/css">
	  @import url("{{asset('assets/css/style.css')}}");

	  body {

}
      </style>
    <title>Adderess Book</title>
  <link sizes="150x150" rel = "icon" href = 
"{{asset('assets/img/logo.png')}}" 
        type = "image/x-icon">
  </head>



<body>

	<div class="container-fluid">

@include('site.includes.header')

	<section class="mt-5 pt-5 pb-5 mb-5">


	 <div class="row pt-5 mt-5  d-flex justify-content-center font-weight-bold" style="font-size: 22px">
<a href=""></a>
	<p class="text-center">Your Address Book</p>

	</div>



	<div class="row pt-3 mt-3  d-flex justify-content-center">

      <div class="col-md-3 col-sm-6">


		<div class="input-group rounded">

 <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
  <input type="search" class="form-control" id="searchinput" placeholder="Search Address Book" aria-label="Search"
  aria-describedby="search-addon" />

</div>


		</div>

	   </div>



	<div class="row d-flex justify-content-center">

	                 <div class="col-md-12  ">


		<div id="carouselExampleIndicators4" class="carousel slide" data-ride="carousel">

	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators4" data-slide-to="0" class="active"></li>
       </ol>



	  <div class="carousel-inner"  role="listbox">

	 <div class="carousel-item pl-5 ml-5 pr-5 mr-5 pt-5 pb-5   active">

	        <div class="card col-md-8 pt-5 pb-5 mx-auto ">
	      <div class="row pt-5 align-items-center ">

              @if(isset($connections) && $connections->count()>0)
                  @foreach($connections as $connection)
		<div class="col-md-4 pt-5 mt-5 ">
			<div class="row align-items-center">
		  <img src="{{asset('assets/img/Address Book Person.png')}}" width="72" height="72" alt=""/>
			  <p class="pl-3 pr-3" style="font: normal normal bold 20px/37px Cairo; color: #616E7C;">Name Example</p>
			</div>
			  </div>
                  @endforeach
              @else
                  <div class="col-md-4 pt-5 mt-5 ">
                      <div style="margin-left:330px;width: 500px" class="row align-items-center">
                          <p class="pl-3 pr-3" style=" width:90%;font: normal normal bold 20px/37px Cairo; color: #616E7C;">You have no connections</p>
                      </div>
                  </div>
                  @endif


          </div>
		   </div>

		  </div>




 		<a class="carousel-control-prev " href="#carouselExampleIndicators1" role="button" data-slide="prev" > <span class="carousel-control-prev-icon pl-5" aria-hidden="true" ></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true" ></span> <span class="sr-only">Next</span> </a>


	</div>



			   </div>



			   </div>



	                 </div>


	</div>



	</section>

	</div>





<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
</body>
</html>
