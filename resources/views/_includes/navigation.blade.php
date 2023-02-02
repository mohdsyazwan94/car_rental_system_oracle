<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
	  	<!-- User Dropdown Menu -->
      	<li class="nav-item dropdown">
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				{{ Auth::user()->full_name }} 
			</a>
			<div class="dropdown-menu py-0" aria-labelledby="navbarVersionDropdown">
				<a class="dropdown-item" href="">Profile</a>
				<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>
		<!-- /.User Dropdown Menu -->
	</ul>
</nav>
<!-- /.navbar -->
  
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4" >
	<!-- Brand Logo -->
	<div class="brand-link logo-switch" >
		<img src="{{ asset('img/favicon-small.png')}}" 
			alt="AdminLTE Logo " 
			class="ms-5 brand-image img-circle elevation-3"
			style="opacity: .8">
		<span>PERAK CAR RENTAL</span>
	</div>
	<!-- Sidebar -->
	<div class="sidebar">
	<!-- Sidebar user panel (optional) -->
	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
		<div class="image">
			<img src="{{ asset('img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
		</div>
		<div class="data">
			<span class="d-block" style="color: #fff">{{ Auth::user()->full_name }} </span>
		</div>
	</div>

	<!-- Sidebar Menu -->
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<!-- Add icons to the links using the .nav-icon class
			with font-awesome or any other icon font library -->
		<li class="nav-item">
			<a href="{{ url('/home') }}" class="nav-link {{ request()->routeIs('home.*') ? 'active' : '' }}">
			<i class="nav-icon fas fa-tachometer-alt"></i>
			<p>Home</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('students.index') }}" class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
			<i class="nav-icon fas fa-users"></i>
			<p>Students</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" >
			<i class="nav-icon fas fa-user-cog"></i>
			<p>Users</p>
			</a>
		</li>
		{{-- @role('customer')
			<li class="nav-item">
				<a href="" class="nav-link {{ request()->routeIs('deliveries.*') ? 'active' : '' }}">
				<i class="nav-icon fa fa-bed"></i>
				<p>New Reservation</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="" class="nav-link {{ request()->routeIs('deliveries.*') ? 'active' : '' }}">
				<i class="nav-icon fas fa-bars"></i>
				<p>Reservation Details</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="" class="nav-link {{ request()->routeIs('deliveries.*') ? 'active' : '' }}">
				<i class="nav-icon fas fa-list"></i>
				<p>History</p>
				</a>
			</li>
		@else
			<li class="nav-item">
				<a href="{{ route('rooms.index') }}" class="nav-link {{ request()->routeIs('rooms.*') ? 'active' : '' }}">
				<i class="nav-icon fa fa-bed"></i>
				<p>Room</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('roomTypes.index') }}" class="nav-link {{ request()->routeIs('roomTypes.*') ? 'active' : '' }}">
				<i class="nav-icon fa fa-list"></i>
				<p>Room Types</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('reservations.index') }}" class="nav-link {{ request()->routeIs('reservations.*') ? 'active' : '' }}">
				<i class="nav-icon fas fa-clock"></i>
				<p>Reservation</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('students.index') }}" class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
				<i class="nav-icon fas fa-users"></i>
				<p>students</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" >
				<i class="nav-icon fas fa-user-cog"></i>
				<p>Users</p>
				</a>
			</li>
		@endrole --}}
		</ul>
	</nav>
	<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
