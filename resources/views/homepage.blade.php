@extends('_layouts.masterlayout_homepage') 

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
        crossorigin="anonymous"/>
@endsection

@section('content') <!-- Display this content at mainlayout > content --> 
    <main>
        <!--? slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center" id="reservation">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero__caption">
                                    <h1 style="text-align:center;"><span style="color:#FFFFFF; background-color:grey; opacity: 0.8;">PERAK CAR RENTAL</span></h1>
                                    {{-- <div class="d-flex align-items-center">
                                        <div class="container" style="width:70%">
                                        <form method="GET" action="{{ route('checkReservation') }}">
                                        @csrf
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg" style="font-size:16px;" id="date_range" name="date_range" value="" required>
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-info btn-flat float-right">Book Now</button>
                                                </span>
                                            </div>
                                        </form>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!--? our info Start -->
        <div class="our-info-area pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-info mb-30">
                            <div class="info-icon">
                                <span><i class="fa fa-phone"></i></span>
                            </div>
                            <div class="info-caption">
                                <p>Call Us Anytime</p>
                                <span><a href="tel:+60350373059">+603 5037 3059</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-info mb-30">
                            <div class="info-icon">
                                <span><i class="fa fa-star"></i></span>
                            </div>
                            <div class="info-caption">
                                <p>Multiple car selection</p>
                                <span>10+ Car Models</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-info mb-30">
                            <div class="info-icon">
                                <span><i class="fa fa-map-marker"></i></span>
                            </div>
                            <div class="info-caption">
                                <p>Perak Car Rental</p>
                                <span>Ipoh, Perak</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- our info End -->
        <!--? About Area Start -->
        <div class="about-low-area mt-50" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-10">
                                <span>Company Background</span>
                                <h3><strong>Perak Car Rental</strong></h3>
                            </div>
							<p>Perak Car Rental belongs to Perak Sdn Bhd company and was established in 2010, beginning as a small car rental business in Jasin, Melaka.
							</p>
							<p>Perak Car Rental has 50 vehicles of many types such as Economy, Compact, Intermediate, Full size, and Luxury. Since not all students or staff can afford to have their vehicle. The raising taxi fare and inconsistent bus arrivals have encouraged the students to rent the car for their requirement.  
							</p>
                            <p>As of 2022, the number of representatives obtained by Perak Car Rental are 25 workers, extending from male and female. Perak Car rental has provided an elective car for those who look for a car rental for their occasion of the day. Perak Car Rental could be a put for everybody to have a sense of adaptability to total their errand in day or night-time since it is open 24/7 regular with reasonable prices and customer service and support. 
							</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!-- about-img -->
                        <div class="about-img ">
                            <div class="about-font-img">
                                <img src="{{ asset('img/about1.jpg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Area End -->
        <div class="card" style="background-color:#DAE5D0; padding-top:20px; padding-bottom:20px;">
        </div>
        <!--Contact Start -->
        <div class="team-area mt-50 mb-50" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="cl-xl-7 col-lg-8 col-md-10">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-30">
                            <span>Reach to us</span>
                            <h2>Our Contact</h2>
                        </div> 
                    </div>
                </div>
                <div class="row">
    				<div class="col-md-6">
    					<div class="media contact-info">
    						<span class="contact-info__icon"><i class="ti-home"></i></span>
    						<div class="media-body">
    							<h3>Perak Car Rental</h3>
    							<p>Lot 132 Jalan Lama,<br>
    							Pusat Perniagaan Bentara,  <br>
    							Ipoh, Perak. <br>
    							</p>
    						</div>
    					</div>
    					<div class="media contact-info">
    						<span class="contact-info__icon"><i class="ti-tablet"></i></span>
    						<div class="media-body">
    							<h3><a class="btn-link text-dark" href="tel:+60350373059">+603-2235698</a></h3>
    							<p>Call us anytime!</p>
    						</div>
    					</div>
    					<div class="media contact-info">
    						<span class="contact-info__icon"><i class="ti-email"></i></span>
    						<div class="media-body">
    							<h3><a class="btn-link text-dark" href="mailto:enquiry@znsgloballlogistics.com">enquiry@perakcarrental.com</a></h3>
    							<p>Send us your query anytime!</p>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-6">
                        <a target="_blank" href="https://goo.gl/maps/mNzuJT74AoEftBGh9">
                            <img src="{{ asset('img/map-location.png') }}" class="img-fluid" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
    </main>

    @push('page_scripts')
    
        <script type="text/javascript">
            var nowDate = new Date();
            var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
            var tomorrow = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate() + 1, 0, 0, 0, 0);
            $('#date_range').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                },
                autoApply: true,
                startDate: today,
                endDate: tomorrow,
                minDate: today,
            });
        </script>
    @endpush
@endsection