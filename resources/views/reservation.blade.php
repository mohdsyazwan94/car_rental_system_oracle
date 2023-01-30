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
        
    
        <!--? our info Start -->
        <div class="our-info-area pt-40 pb-40">
            <div class="container">
                    <div class="d-flex align-items-center">
                        <div class="container" style="width:70%">
                            <form method="GET" action="{{ route('checkReservation') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" style="font-size:16px;" id="date_range" name="date_range" value="{{$date_range}}" required>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat float-right">Search Availability</button>
                                </span>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
        <div class="our-info-area pt-40 pb-40 pl-40 pr-40">
            <div class="row">
                @foreach($rooms as $key => $room)
                <div class="col-md-6">
                    <form method="GET" action="{{ route('confirmReservation') }}">
                    @csrf
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <img src="{{ asset('storage/rooms/'.$room->first()->roomTypes->image) }}" class="img-fluid" alt="" style="height:300px; width:500px;">
                            </div>
                            <div class="col" style="padding-top:50px; padding-bottom:50px; padding-left:50px; padding-right:50px;">
                                <div class="card-block px-2 ">
                                    <h4 class="card-title">{{ $room->first()->roomTypes->type_name }}</h4>
                                    <p class="card-text">{{ $room->first()->roomTypes->description }}</p>
                                    <p class="card-text">Only {{ count($room) }} rooms left !</p>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-flat btn-lg float-right">BOOK NOW</button>
                                    </div>
                                    <input type="hidden" name="room_id" value="{{ $room->first()->id }}">
                                    <input type="hidden" name="start_date" value="{{ $start_date }}">
                                    <input type="hidden" name="end_date" value="{{ $end_date }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                @endforeach
            </div>
        </div>
        
    </main>

    @push('page_scripts')
    
        <script type="text/javascript">
            
            var nowDate = new Date();
            var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

            var startDate = new Date("{{ $start_date }}");
            var startDateFormat = new Date(startDate.getFullYear(), startDate.getMonth(), startDate.getDate(), 0, 0, 0, 0);
            var endDate = new Date("{{ $end_date }}");
            var endDateFormat = new Date(endDate.getFullYear(), endDate.getMonth(), endDate.getDate(), 0, 0, 0, 0);

            console.log(startDate);
            console.log(endDate);
            
            $('#date_range').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                },
                autoApply: true,
                startDate: startDateFormat,
                endDate: endDateFormat,
                minDate: today,
            });
        </script>
    @endpush
@endsection