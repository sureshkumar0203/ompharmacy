<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
			<ul class="nav navbar-nav navbar-right">
				<li class=""> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="@if(Auth::user()->image != '' | null){{ asset('public/admin/images/') }}/{{ Auth::user()->image }}@else{{ asset('public/admin/images/') }}/avtar.png @endif" alt=""><?php echo  Auth::user()->name; ?> <span class=" fa fa-angle-down"></span> </a>
				<ul class="dropdown-menu dropdown-usermenu pull-right">
					<li><a href="{{ url('administrator/my-account') }}"> My Account</a></li>
					<li> <a href="{{ url('administrator/change-password') }}">  Change Password </a> </li>
					<li>
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i>Logout</a>
						<form id="logout-form" action="{{ 'App\Admin' == Auth::getProvider()->getModel() ? route('admin.logout') : route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>