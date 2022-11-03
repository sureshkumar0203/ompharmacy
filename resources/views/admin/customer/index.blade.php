@extends('admin.layouts.master')
@section('title', 'Customer Listing Management')
@section('css')
<style>
span.wallet {
   color: #000000;
    font-weight: bold;
    background: #f3c005;
    padding: 0px 8px;
    display: block;
}
a.measurement__ i:before {
    color: #fff;
    font-size: 21px;
    background: #143256;
    padding: 5px 6px;
    border-radius: 3px;
    margin-left: 0;
    margin-right: 0;
}
a.pill__ i:before {
    color: #fff;
    font-size: 21px;
    background: #0370bd;
    padding: 5px 6px;
    border-radius: 3px;
    margin-left: 0;
}
a.health__ i:before {
    color: #fff;
    font-size: 21px;
    background: #410fa2b5;
    padding: 5px 6px;
    border-radius: 3px;
    margin-left: 0;
}
a.detail__ i:before {
    color: #fff;
    font-size: 21px;
    background: #378e0ab5;
    padding: 5px 6px;
    border-radius: 3px;
    margin-left: 0;
}
</style>
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Customer Listing Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="10%" style="text-align:center">#</th>
                  <th width="20%">Name</th>
                  <th width="15%">E-mail</th>
                  <th width="15%">Phone no</th>
                  <th width="15%">Wallet Amount</th>
                  <th width="25%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($getUser as $key=>$user)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>+91 {{ $user->phone }}</td>
                  <td><span class="wallet">&#x20B9; {{ number_format(walletAmount($user->id), 2, '.', ',') }}</span></td>
                  <td style="vertical-align: middle; text-align: center">
                   @if($user->status == 1)
                    <a style="float: left;" href="{{ url('administrator/customer') }}/{{ $user->id }}" class="btn btn-xs btn-info" data-toggle="tooltip" data-title="Inactive" onClick="return confirm('Are you sure you want to Inactive this Customer ?')">Active</a>
                   @else
                    <a style="float: left;" href="{{ url('administrator/customer') }}/{{ $user->id }}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-title="Active" onClick="return confirm('Are you sure you want to Active this Customer ?')">Inactive</a>
                   @endif
                   <a style="float: left;" href="{{ url('administrator/customer/details') }}/{{ $user->id }}" class="detail__" data-toggle="tooltip" data-title="View Details"><i class="flaticon-eye"></i></a>

                   <a style="float: left;" href="{{ route('health-activity.index') }}/{{ $user->id }}" class="health__" data-toggle="tooltip" data-title="Health Activity"><i class="flaticon-medical-file"></i></a>

                   <a style="float: left;" href="{{ route('pill-management.index') }}/{{ $user->id }}" class="pill__" data-toggle="tooltip" data-title="Pills Management"><i class="flaticon-medicine"></i></a>

                    <a style="float: left;" href="{{ route('measurement.index') }}/{{ $user->id }}" class="measurement__" data-toggle="tooltip" data-title="Measurement"><i class="flaticon-doctor"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('script')
<script src="{{ asset('public/admin/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('public/admin/js/dataTables.bootstrap.min.js') }}"></script>
@endpush