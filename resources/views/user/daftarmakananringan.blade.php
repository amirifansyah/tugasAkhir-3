<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Laperin</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="{{ asset('den/css/bootstrap.min.css')}}">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="{{ asset('den/css/style.css')}}">
<!-- Responsive-->
<link rel="stylesheet" href="{{ asset('den/css/responsive.css')}}">
<!-- fevicon -->
<link rel="icon" href="{{ asset('den/images/fevicon.png')}}" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="{{ asset('den/css/jquery.mCustomScrollbar.min.css')}}">
<!-- Tweaks for older IEs-->
{{-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> --}}
<!-- owl stylesheets --> 
<link rel="stylesheet" href="{{ asset('den/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{ asset('den/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
	<header>
		<div class="layout_padding banner_section_start">
         <!-- header inner -->
         <div class="header fixed-top shadow" style="background-color: white">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
							   {{-- <a href="#home"><img src="{{asset('den/images/logo.png')}}" style="max-width: 100%;"></a>  --}}
							   <h1 class="mt-2"><b> Laperin </b></h1>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li><a href="{{route('landing.index')}}">Home</a></li>
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										{{ Auth::user()->name }}
									</a>

									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div>
								</li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                 </div>
               </div>
            </div>
         </div>
         {{-- <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <img src="..." class="rounded me-2" alt="...">
              <strong class="me-auto">Bootstrap</strong>
              <small class="text-muted">just now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              See? Just like this.
            </div>
          </div> --}}
        </div>
         <!-- end header inner -->	
         
         
	<!-- product start-->
	<div id="products" class="layout_padding product_section ">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				</div>
			</div>
		    <div class="product_section_2 images" style="border-bottom: 2px solid #111111;">
				<a href=""><h1><strong><span class="den"> Daftar</span> Makanan</strong></h1></a>
			    <div class="row">
            @foreach ($ringans as $key => $ringan)
				
            <div class="col-sm-4 ">
            <div class="card" style="width: 18rem;">
              <img src="{{asset('storage/ringan/'.$ringan->gambar)}}" class="card-img-top " alt="gambar">
              <div class="card-body">
                <p class="card-text">{{$ringan->nama}}</p>
                <h5 class="card-title"> {{($ringan->desc)}}</h5>
                <h5 class="card-title">Rp. {{number_format($ringan->harga)}}</h5>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalringan{{$key}}">
                  Pesan
                  </button>
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tambah ke keranjang</button> --}}
              </div>
              </div>
            </div> 
  
                
            <!-- Modal ringan -->
            <div class="modal fade" id="modalringan{{$key}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header shadow" style="background-color: #fa3e19">
                <h5 class="modal-title" id="staticBackdropLabel" > Pesanan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div><br><br>
              <form action="{{route('bayar.store')}}" method="POST">
              @csrf
              <div class="mb-3">
                  <ul>
                    <li> <h5><b> {{$ringan->nama}} </b></h5></li>
                    <li> <b>harga</b> </li>
                    <li>{{$ringan->harga}}</li>
                    <li> <b> Description Makanan </b> </li>
                    <li>{{$ringan->desc}}</li>
                  </ul>
                  <div class="modal-body">
                    @if (!$bayars)
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label"> <b>Request Pesanan</b> </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="req"> </textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label"><b>Jumlah Pesanan</b></label>
                        <input type="number" class="form-control" name="jumlah">
                      </div>
                      <div>
                        <input type="text" id="id" name="ringan_id" value="{{$ringan->id}}" >
                      </div>
                    @else
                      @if ($bayars->ringan_id == $ringan->id)
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label"> <b>Request Pesanan</b> </label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="req"> {{$bayars->req}} </textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label"><b>Jumlah Pesanan</b></label>
                          <input type="number" class="form-control" name="jumlah" value="{{$bayars->jumlah}}">
                        </div>
                        <div>
                          <input type="text" id="id" name="ringan_id" value="{{$ringan->id}}" hidden>
                          <input type="text" hidden name="bayars_id" value="{{$bayars->id}}">
                        </div>
                      @else 
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label"> <b>Request Pesanan</b> </label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="req"> </textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="form-label"><b>Jumlah Pesanan</b></label>
                          <input type="number" class="form-control" name="jumlah">
                        </div>
                        <div>
                          <input type="text" id="id" name="ringan_id" value="{{$ringan->id}}" hidden>
                        </div>
                      @endif
                    @endif
                  </div>
                </div>
                      
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Lanjut Bayar </button>
                      </div>
                </form>
              </div>
            </div>
            </div>
              @endforeach
		        </div>
		    </div>
	    </div>
    </div>
    </div>
	</header>
	
	<!-- Touch end-->
	<!-- contact start-->
    <div id="contact" class="contact_section">
    	<div class="container">	
    	<div class="contact-taital">
    		<div class="row">	
    			<div class="col-sm-6 col-md-6 col-lg-3">
    				<h2 class="adderess_text">Adderess</h2>
    				<div class="image-icon"><img src="{{asset('den/images/phone-icon.png')}}"><span class="email_text">(+62) 97829039</span></div>
    				
    			</div>
    			<div class="col-sm-6 col-md-6 col-lg-3">
    				<h2 class="adderess_text">Sosial Media</h2>
    				<div class="row">
    					<div class="col-md-6">
							<a href="#"><i class="fab fa-instagram text-white"></i> Laperin_aja</a>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
	<!-- contact end-->
	<!-- copyright start-->
    <div class="copyright_section">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-12">
    				<p class="copyright_taital"> <a href="{{route('landing.index')}}">Laperin.com</p>
    			</div>
    		</div>
    	</div>
    </div>


	<!-- copyright end-->

    <!-- Javascript files-->
    <script src="{{asset('den/js/jquery.min.js')}}"></script>
    <script src="{{asset('den/js/popper.min.js')}}"></script>
    <script src="{{asset('den/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('den/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('den/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('den/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('den/js/custom.js')}}"></script>
      <!-- javascript --> 
      <script src="{{asset('den/js/owl.carousel.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
      $(document).ready(function(){
      $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         </script> 

         <script>
      // This example adds a marker to indicate the position of Bondi Beach in Sydney,
      // Australia.
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: 40.645037, lng: -73.880224},
          });

        var image = 'images/location_point.png';
          var beachMarker = new google.maps.Marker({
             position: {lat: 40.645037, lng: -73.880224},
             map: map,
             icon: image
          });
        }
        </script>
        <!-- google map js -->
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
		  <script src="{{ asset('fontawesome/js/all.min.js')}}"></script>
        <!-- end google map js -->




</body>
</html>