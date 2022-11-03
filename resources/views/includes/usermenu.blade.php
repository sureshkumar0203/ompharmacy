<div class="col-md-3" id="aside">
<div id="aside-4">
  <div class="myaccount-box">
  
  <div class="my-acount-border pf-img pad10">  
  <div class="prof-img">
    @if(userName()->profile_img)
      <img src="{{ asset('public/profiles/') }}/{{ userName()->profile_img }}" class="img-responsive" alt="">
    @else
      <i class="flaticon-round-account-button-with-user-inside defult-icon ac-pf-img"></i>
    @endif
  </div>
  <p><strong>{{ userName()->first_name }} {{ userName()->last_name }}</strong></p>
  
  </div>
  
    <div class="my-acount-border">
      <h5 class="pad-left0"><i class="flaticon-customer my-icon"></i> My Service</h5>
      <ul>
        <li {{ Request::is('booking-history*') ? ' class=active' : null }}><a href="{{ url('/booking-history') }}">All Booking History</a></li>
        <li {{ Request::is('prescription-upload*') ? ' class=active' : null }}><a href="{{ url('/prescription-upload') }}">Prescription Upload</a></li>
        <li {{ Request::is('health-records*') ? ' class=active' : null }}><a href="{{ url('/health-records') }}">Health Records</a></li>
        <li {{ Request::is('pill-management*') ? ' class=active' : null }}><a href="{{ url('/pill-management') }}">Pill Management</a></li>
        <li {{ Request::is('health-activity*') ? ' class=active' : null }}><a href="{{ url('/health-activity') }}">Health Activity</a></li>
      </ul>
    </div>
    <div class="my-acount-border">
      <h5 class="pad-left0"><i class="flaticon-wallet my-icon"></i> PAYMENTS</h5>
      <ul>
        <li style="position: relative;"><a href="javascript:void(0)">Remaining Balance</a> <span class="remaining-balance">&#x20B9; {{ number_format(walletAmount(Session::get('userId')), 2, '.', ',') }}</span></li>
        <li {{ Request::is('add-money*') ? ' class=active' : null }}><a href="{{ url('/add-money') }}">Add Money</a></li>
        <li {{ Request::is('payment-history*') ? ' class=active' : null }}><a href="{{ url('/payment-history') }}">Payment History</a></li>
        <li {{ Request::is('transfer*') ? ' class=active' : null }}><a href="{{ url('/transfer') }}">Transfer wallet money</a></li>
      </ul>
    </div>
    <div class="my-acount-border">
      <h5 class="pad-left0"><i class="flaticon-user my-icon"></i> Account Settings</h5>
      <ul>
        <li {{ Request::is('myaccount*') ? ' class=active' : null }}><a href="{{ url('/myaccount') }}">My Profile</a></li>
        <li {{ Request::is('change-password*') ? ' class=active' : null }}><a href="{{ url('/change-password') }}">Change Password</a></li>
      </ul>
    </div>
    <div class="my-acount-border">
      <h5 class="pad-left0" ><i class="flaticon-logout my-icon"></i> <a href="{{ url('/user-logout') }}">Logout</a></h5>
    </div>
  </div>
</div>
</div>