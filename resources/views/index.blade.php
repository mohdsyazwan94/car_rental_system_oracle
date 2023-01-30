@extends('_includes.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-bed mr-1"></i>
                RESERVATIONS
            </h3>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-clock"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">TODAY RESERVATIONS</span>
                      <span class="info-box-number">{{ $today_reservation }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-user"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">CUSTOMERS CHECKED-IN</span>
                      <span class="info-box-number">{{ $customer_check_in }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-check"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">CUSTOMERS CHECKED-OUT</span>
                      <span class="info-box-number">{{ $customer_check_out }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Most choosen room</span>
                      <span class="info-box-number">Deluxe Room</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
            <!-- Small boxes (Stat box) -->
            <!-- ./row -->
        </div>
    </div>
    <!-- ./card -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-dollar-sign mr-1"></i>
            REVENUES
        </h3>
        </div><!-- /.card-header -->
        <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                <h3>RM 32,150.59</h3>
    
                <p>TOTAL REVENUES - CURRENT MONTH</p>
                </div>
                <div class="icon">
                {{-- <i class="fas fa-file-alt"></i> --}}
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-md-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3>RM 65,768.25</h3>
    
                <p>TOTAL REVENUES - PREVIOUS MONTH</p>
                </div>
                <div class="icon">
                {{-- <i class="fas fa-dollar-sign"></i> --}}
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-md-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                <h3>RM 377,694.82</h3>

                <p>TOTAL REVENUES - THIS YEAR</p>
                </div>
                <div class="icon">
                {{-- <i class="fas fa-hand-holding-usd"></i> --}}
                </div>
            </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- ./row -->
        </div>
    </div>
@endsection
