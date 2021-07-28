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
        </div>
         <!-- end header inner -->	
         
         
        </header>
        {{-- Pesanan --}}
        
        <div class="layout_padding gallery_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="gallery_main">
                            <h1 class="gallery_taital"><strong>Masukan<span class="our_text"> lokasi </span>Tujuan</strong></h1>
                           
                        </div>
                    </div>
                </div>
                <div class="touch_main">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="input_main">
                           <div class="container">
                              <form action="{{route('order.store', $bayars->id)}}" method="POST">
                                 @csrf
                                 @if ($bayars->berat)
                                    @if ($bayars->berat)
                                       <div class="form-group">
                                          <label><strong><h4>Nama Makanan : {{$bayars->berat->nama}} </h4></strong></label>
                                          <input type="text" class="email-bt" value="{{$bayars->berat->nama}}" name="namaMakanan" hidden>
                                       </div>
                                       <div class="form-group">
                                          <label><strong><h4>Request : {{$bayars->req}} </h4></strong></label>
                                       </div>
                                       <div class="form-group">
                                          <label><strong><h4>Banyak Pesanan : {{$bayars->jumlah}} </h4></strong></label>
                                       </div>
                                       <div>
                                          <input type="text" id="id" name="bayar_id" value="{{$bayars->id}}" hidden>
                                       </div>
                                    @endif
                                 @elseif ($bayars->ringan)
                                    @if ($bayars->ringan)
                                       <div class="form-group">
                                          <label><strong><h4>Nama Makanan : {{$bayars->ringan->nama}} </h4></strong></label>
                                          <input type="text" class="email-bt" value="{{$bayars->ringan->nama}}" name="namaMakanan" hidden>
                                       </div>
                                       <div class="form-group">
                                          <label><strong><h4>Request : {{$bayars->req}} </h4></strong></label>
                                       </div>
                                       <div class="form-group">
                                          <label><strong><h4>Banyak Pesanan : {{$bayars->jumlah}} </h4></strong></label>
                                       </div>
                                       <div>
                                          <input type="text" id="id" name="bayar_id" value="{{$bayars->id}}" hidden>
                                       </div>
                                    @endif
                                    @else
                                       @if ($bayars->promo)
                                          <div class="form-group">
                                             <label><strong><h4>Nama Makanan : {{$bayars->promo->nama}} </h4></strong></label>
                                             <input type="text" class="email-bt" value="{{$bayars->promo->berat->nama}} & {{$bayars->promo->ringan->nama}}" name="namaMakanan" hidden >
                                          </div>
                                          <div class="form-group">
                                             <label><strong><h4>Request : {{$bayars->req}} </h4></strong></label>
                                          </div>
                                          <div class="form-group">
                                             <label><strong><h4>Banyak Pesanan : {{$bayars->jumlah}} </h4></strong></label>
                                          </div>
                                          <div>
                                             <input type="text" id="id" name="bayar_id" value="{{$bayars->id}}" hidden >
                                          </div>
                                       @endif
                                 @endif

                                    <div class="form-group">
                                       <label for="nama"><strong><h4> Nama Penerima </h4></strong></label>
                                       <input type="text" class="email-bt" placeholder="Nama" name="nama">
                                    </div>
                                    <div class="form-group">
                                       <label for="lokasi"><strong><h4> Nomor Telepon </h4></strong></label>
                                       <input type="text" class="email-bt" placeholder="+62" name="no">
                                    </div>
                                    
                                    <div class="form-group">
                                       <label for="lokasi"><strong><h4> Alamat Tujuan </h4></strong></label>
                                    <textarea class="massage-bt" placeholder="Lokasi Tujuan" rows="3" id="lokasi" name="alamat"></textarea>
                                    </div>
                                 <div class="send_btn">
                                    <button type="submit" class="main_bt">SEND</button>                  
                                 </div>
                              </form> 
                           </div> 
                        </div>
                    </div>
                    </div>
                </div>
            </div>	
        </div>	
    
        <!-- product start-->
	<div id="products" class="layout_padding product_section images">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
               <h2></h2>
				</div>
			</div>
       
      
         {{-- @foreach ($bayars as $bayar)
            <h4>{{$bayar->req}}</h4>
            <h4>{{($bayar->berat)}}</h4>
            
         @endforeach --}}
	    </div>
    </div>
	
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