@extends('admin.layouts.master')
@section('title','Sub Admin Permit')
@section('css')
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<style>
  ul.treeview-menu {
    margin-left: 7%;
}
#div_permission_name{
    width: 80%;
    margin: 0 auto;
}
</style>
@endsection
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Sub Admin Permit</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content"> @include('admin.includes.msg')
            {{ Form::open(['url' => 'administrator/subadmin/permit', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'name' => 'menuPermit', 'id' => 'menuPermit','files'=>true, 'autocomplete' => 'off', 'novalidate']) }}
            {{ Form::hidden('hUserID', $id, ['id'=>'userID']) }}
            <div id="div_permission_name" class="form-group">
               <label class="checkboxx">{{ "Check All" }}
                 <input type="checkbox" checked="checked" name="chkAll" id="checkAll" value="1">
                 <span class="checkmark"></span>
              </label>
              <br>
              <?php 
                $res = menuTreeforPremission(); 
                foreach($res as $key => $val){
              ?>
              <ul class="treeview" style="list-style:none;">
                <li class="menu" >
                  <label class="checkboxx"> {{ $val->menu_name }} 
                  <input type="checkbox"  name="chkMenu[]" data-menu="chkMenu_<?php echo $val->id; ?>"  id="chkMenu_<?php echo $val->id; ?>" value="<?php echo $val->id; ?>" onClick="checkMenu(this);" />
                 <span class="checkmark"></span>
                 </label>
                </li>

                <?php if(count((array)$val->SubMenus)>0) { ?>
                <ul class="treeview-menu" style="list-style:none;">
                  <?php foreach($val->SubMenus as $k=>$v){ ?>
                  <li class="sub_menu">
                  <label class="checkboxx">{{$v->name}} 
                    <input type="checkbox" name="chkSubMenu[<?php echo $val->id; ?>][]" id="chkSubMenu<?php echo $v->id; ?>" data-submenu="chkSubMenu_<?php echo $v->id; ?>" value="<?php echo $v->id; ?>" onClick="checkSubMenu(<?php echo $val->id; ?>,{{ $v->id }});" />
                    
                    <span class="checkmark"></span>
                    </label>
                  </li>
                  <?php } ?>
                </ul>
                <?php } ?>
              </ul>
              <?php } ?>
              
            </div>
            <div class="form-group">
              <div class="col-md-4"> 
                {{ Form::submit('Submit', array('class' => 'btn btn-success','id'=>'permitUser')) }} 
                <a href="{{ url('administrator/subadmin') }}" class="btn btn-primary">Back</a>
              </div>
            </div>
            {{ Form::close() }} </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@push('script') 
<script src="{{ asset('public/admin/js/validator.js') }}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 
<script>
  $("body").on("click","#permitUser",function(){
    var atLeastOneIsChecked = $('input:checkbox').is(':checked');
    if(atLeastOneIsChecked == true){
      $("#menuPermit").submit();
    } else {
      toastr.error("Plese select atleast one checkbox");  
      return false;
    }
  });
  
  $("body").on("click","#checkAll",function(e){
    var CheckOrNot = $('input:checkbox[name=chkAll]:checked').val();
    if(CheckOrNot){
      $('input:checkbox').prop('checked', true);
    } else {
      $('input:checkbox').prop('checked', false);
    }
  });
  
  // Check menu
  function checkMenu(_this){
    var status=$(_this).is(':checked');
    if(status == true){
      var menuId=_this.value;
      var child_checkboxes = document.getElementsByName('chkSubMenu['+menuId+'][]');  
      if(child_checkboxes.length > 0){
        $(child_checkboxes).each(function(){

          $(this).prop("checked",true);
        });
      }
    } else {
      var menuId=_this.value; 
      var child_checkboxes = document.getElementsByName('chkSubMenu['+menuId+'][]');  
      if(child_checkboxes.length>=1){            
        $(child_checkboxes).each(function(){
          $(this).prop("checked",false);
        });
      }
    }
  }
  // Check SubMenus
  function checkSubMenu(_this,_this2){
    var child_checkboxes = document.getElementsByName('chkSubMenu['+_this+'][]').length;
    var len=$('[name="chkSubMenu['+_this+'][]"]:checked').length;
    console.log(len);
    if(child_checkboxes == len){
      checkboxes = document.getElementById("chkMenu_"+_this);
      checkboxes.checked = true;
    }
    if(len==0){
      checkboxes = document.getElementById("chkMenu_"+_this);
      checkboxes.checked = false; 
      addBox = document.getElementById("addSubMenu_"+_this2);
      addBox.checked = false;
      editBox = document.getElementById("editSubMenu_"+_this2);
      editBox.checked = false;
      deleteBox = document.getElementById("deleteSubMenu_"+_this2);
      deleteBox.checked = false;
      activeBox = document.getElementById("activeSubMenu_"+_this2);
      activeBox.checked = false;
    }
    if(len >=1){
      checkboxes = document.getElementById("chkMenu_"+_this);
      checkboxes.checked = true;
    }
  }

  $(document).ready(function() {
    $('input:checkbox').prop('checked', false);
    var userID = $('#userID').val();
    if(userID > 0){
      $.ajax({
          type:"POST",
          url:"{{url('administrator/fetchGivenPermissions')}}",
          data: {"userID": userID},
          success:function(res){
            $.each( res, function( key, val ) {
              $("#chkMenu_"+val.menu_id).prop("checked",true);
              $("#chkSubMenu"+val.sub_menu_id).prop("checked",true);
            });
          }
      });
    } else {
      alert('Something went wrong!');
    }
});
</script> 
@endpush