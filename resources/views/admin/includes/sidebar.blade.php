<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section menu_fixed">
		<ul class="nav side-menu">
		@if(auth()->user()->id == 1)
		<li><a><i class="flaticon-key"></i> Admin Setting <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
				<li><a href="{{ url('administrator/subadmin/') }}">Sub Admin Management</a></li>
			</ul>
		</li>
		@endif
		<?php menuTree(0); ?>
	</ul>
</div>
</div>
<!-- /sidebar menu -->
<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
<p>&copy; @php echo date('Y'); @endphp Ompharmacy.</p>
</div>
<!-- /menu footer buttons -->