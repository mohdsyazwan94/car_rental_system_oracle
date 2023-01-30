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
                                    <h1 style="text-align:center;"><span style="color:#FFFFFF;">RIVERVIEW HOTEL</span></h1>
                                    <div class="d-flex align-items-center">
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
                                    </div>
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
                                <p>Best Rate Guarantee</p>
                                <span>No Hidden Charges</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-info mb-30">
                            <div class="info-icon">
                                <span><i class="fa fa-map-marker"></i></span>
                            </div>
                            <div class="info-caption">
                                <p>Riverview Hotel Sdn Bhd</p>
                                <span>Bahau, Negeri Sembilan</span>
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
                            <div class="section-tittle mb-35">
                                <span>Company Background</span>
                                <h3><strong>Riverview Hotel Sdn Bhd</strong></h3>
                            </div>
							<p>
							Riverview hotel is led by Mr Peter Ng who has been 
                            in the hotel industry for 22 years. While Mr Peter Ng 
                            has never been developed a hotel from the ground up, 
                            He was works in hotel industry most recently as a 
                            general manager and has held various position in 
                            hotel management chain over 15 years.as such 
                            Encik Halim has an in-depth knowledge of hotel business 
                            including operating and business management. 
                            This hotel located at Riverview Hotel & Business Centre 
                            Jalan Kiara 2 Pusat Perniagaan Kiara, Bahau Negeri Sembilan.
							</p>
							<p>
							Riverview Hotel in Bahau comes with different types of rooms.
                            Riverview Hotel provides significant services for a business-travel 
                            experience. The hotel's business centre is designated to meet all 
                            your business travel with the facilities of meeting rooms and 
                            conference room in the hotel. Family- friendly hotel provides hotel 
                            guests the facility of outdoor child pool. Amazing and breezy surrounding 
                            roof top restaurant enables guest to enjoy meals and have a drink at the 
                            bar. 24 hours indoor parking facilities available for hotel guests. 
                            The hotel is directly accessible from the indoor car park and guests 
                            can easily reach the hotel. As of 2022, the number of employees acquired 
                            by the hotel are 15 employees, ranging from male and female.
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
    							<h3>Riverview Hotel Sdn Bhd</h3>
    							<p>Business Centre Jalan Kiara 2,<br>
    							Pusat Perniagaan Kiara,  <br>
    							Bahau, Negeri Sembilan. <br>
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
    							<h3><a class="btn-link text-dark" href="mailto:enquiry@znsgloballlogistics.com">enquiry@riverview.com</a></h3>
    							<p>Send us your query anytime!</p>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-6">
                        <a target="_blank" href="https://maps.google.com/maps?q=3.0839655,101.6726761/2.8105407,102.3942572/@2.7984208,101.7674475">
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