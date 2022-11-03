<?php
use App\User;
use App\AboutUs;
use App\CmsPage;
use App\UserRegistration;
use App\TransactionHistory;
use App\Cms;
use App\deviceToken;

if (!function_exists('userName')) {
    function userName() {
       $userName = UserRegistration::where('id', Session::get('userId'))->first();
       return $userName;
    }
}

if (!function_exists('customerMobile')) {
    function customerMobile($user_id) {
       $userMobile = UserRegistration::where('id', $user_id)->select('id', 'phone')->first();
       return $userMobile->phone;
    }
}

if (!function_exists('customerEmail')) {
    function customerEmail($user_id) {
       $userEmail = UserRegistration::where('id', $user_id)->select('id', 'email')->first();
       return $userEmail->email;
    }
}

if (!function_exists('associateMobile')) {
    function associateMobile($associate_id) {
       $associaterMobile = User::where('id', $associate_id)->select('id', 'phone_no')->first();
       return $associaterMobile->phone_no;
    }
}

if (!function_exists('associateEmail')) {
    function associateEmail($associate_id) {
       $associateEmail = User::where('id', $associate_id)->select('id', 'email')->first();
       return $associateEmail->email;
    }
}

if(!function_exists('associateDet')){
    function associateDet($assId){
        $assDet = User::where('id', $assId)->first();
        return $assDet;
    }
}

if (!function_exists('getAdminDetails')) {
    function getAdminDetails() {
       $admindetail = User::where('id', 1)->first();
 	   return $admindetail;
    }
}

if (!function_exists('getAboutContent')) {
    function getAboutContent() {
       $aboutContent = AboutUs::where('id', 1)->first();
 	   return $aboutContent;
    }
}

if (!function_exists('getServicesMenu')) {
    function getServicesMenu() {
       $servicesMenu = CmsPage::where('parent_id', 0)->where('status', 1)->orderBy('id', 'ASC')->take(5)->get();
 	   return $servicesMenu;
    }
}

if(!function_exists('minuteRound')){
	function minuteRound($i){
		$a = $i;
		$b = 15;
		if($a > 45){
			return '00';
		}
		$remainder = $a % $b;
		if($remainder == 0){
			return $a;
		}else{
			$quotient = ($a - $remainder) / $b;
			$c = $b*($quotient+1);
			return $c;
		}
	}
}

if(!function_exists('create_time_range')){
    function create_time_range($start, $end, $interval = '15 mins', $format = '12') {
        $startTime = strtotime($start);
        $endTime   = strtotime($end);
        $returnTimeFormat = ($format == '12')?'g:i A':'G:i';
        $current   = time(); 
        $addTime   = strtotime('+'.$interval, $current);
        $diff      = $addTime - $current;
        $times = array(); 
        while ($startTime < $endTime) { 
            $times[] = date($returnTimeFormat, $startTime); 
            $startTime += $diff; 
        } 
        $times[] = date($returnTimeFormat, $startTime); 
        return $times; 
    }
}

if(!function_exists('walletCredit')){
    function walletCredit($user_id){
        $credit = TransactionHistory::where('user_id', '=', $user_id)->whereIn('transfer_status', [0,2])->sum('credit_amount');
        return $credit;
    }
}

if(!function_exists('walletDebit')){
    function walletDebit($user_id){
        $debit = TransactionHistory::where('user_id', '=', $user_id)->whereIn('transfer_status', [0,2])->sum('debit_amount');
        return $debit;
    }
}

if(!function_exists('walletAmount')){
    function walletAmount($user_id){
        $credit = walletCredit($user_id);
        $debit = walletDebit($user_id);
        //DB::enableQueryLog();
        // $transfer = \App\Banktransfer::with(array('banktrans' => function($query){
        //                 $query->where('transfer_status', '=', 1);
        //                 }))->where('status', 1)->get();
        //dd(DB::getQueryLog());
        $transfer = \App\TransactionHistory::where([['user_id', $user_id],['transfer_status', 1]])->get();
        $bankTrans =[];
        foreach($transfer as $trs){
            $bankTrans[] = \App\Banktransfer::where([['id', '=', $trs->transfer_id], ['status', '=', 1]])->sum('amount');
        }
        $bankTransfer = array_sum($bankTrans);
        $totalAmount = $credit - $debit;
        $viewTotal = $totalAmount - $bankTransfer;
        return $viewTotal;
    }
}

if(!function_exists('readMoreHelper')){
    function readMoreHelper($story_desc, $chars, $id, $showid) {
        $story_desc = substr($story_desc,0,$chars);  
        $story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
        $story_desc = $story_desc." <a href='javascript:void(0)' onclick='getMoreContent($id,$showid)'>Read More...</a>";  
        return $story_desc;  
    }
}

if (!function_exists('getCmsMenu')) {
    function getCmsMenu() {
       $cmsMenu = Cms::orderBy('id', 'ASC')->limit(3)->get();
       return $cmsMenu;
    }
}

/************ Distance **************/
function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $decimals = 2) {
     $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
     $distance = $degrees * 111.13384;
     return round($distance, $decimals);
 }

if(!function_exists('keymarker')) {
    function keymarker($id){
        $key = bcrypt($id);
        $file = str_replace("/","_",$key);
        return str_replace('$','', $file);
    }
}

if(!function_exists('noServiceCheck')){
    function noServiceCheck($ser_id){
        $service_ary = Config::get('constants.no_services');
        if(in_array($ser_id,$service_ary)){
            return true;
        }else{
            return false;
        }
    }
}


/**************** Menu Permit *****************/
    
if(!function_exists('menuTreeforPremission')){
    function menuTreeforPremission() {
        $ret_ = array();
        $info = DB::table('menu')->where([['id','!=',0],['status','=',1]])->get();
        $info = $info->toArray();
        foreach($info as $key=>$val){
            $ret_ = $val;
            $subMenu = subMenuForPermission($val->id);
            $info[$key]->SubMenus = $subMenu->toArray();
        }
        return $info;
    }
}

if(!function_exists('subMenuForPermission')){
    function subMenuForPermission($ParentId){
        $info = DB::table('sub_menu')->where([['id','!=',0],['status','=',1],['menu_id','=',$ParentId]])->get();
        return $info;
    }
}


if (!function_exists('menuTree')) {
    function menuTree($parent_id = NULL){
        $html ='';
        $info = \App\MenuTree::where([['id','!=',0],['status','=',1]])->get();
        foreach($info AS $val){
            unset($Permit);
            $Permit = menuPermit($val->id,0);
            if($Permit == TRUE){
                if(Request::segment(1) == $val->menu_check)
                    $active = 'active';
                else
                    $active = '';
                $url = url('administrator/'.$val->link);
                if(countTotSubMenu($val->id) != 0){             
                    $html .='<li class="'.$active.'">';
                        if(!empty($val->id)){
                            $html .='<a>';
                            $html .='<span class="fa fa-chevron-down"></span>';
                            $html .='<i class="'.$val->class_name.'"></i><span>'.$val->menu_name;
                            if($val->notice_status == 1){
                                $html .='<i class="fa fa-bell bel" aria-hidden="true"><dt>';
                                if($val->id == 13){
                                	$html .=blogCommentsAlert();
                                }
                                if($val->id == 20){
                                	$html .=sumBookingAlert();
                                }
                                $html .='</dt></i>';
                            }
                            $html .='</span>';
                            $html .='</a>';
                            $html .='<ul class="nav child_menu">';
                            if(!empty($val->id)){
                                $html.=subMenu($val->id);
                            }
                            $html .='</ul>';
                        }
                    $html .='</li>';
                } else {
                    $html .= '<li><a href='.$url.'><i class="'.$val->class_name.'"></i>'.$val->menu_name;
                    if($val->notice_status == 1){
                        $html .='<i class="fa fa-bell bel" aria-hidden="true"><dt>';
                        if($val->id == 21){
                        	$html .= prescriptionAlert();
                        }
                        if($val->id == 22){
                        	$html .= transferAlert();
                        }
                        $html .='</dt></i>';
                    }
                    $html .='</a></li>';
                }
            }
        }
        echo $html;
    }
}

if (!function_exists('subMenu')) {
    function subMenu($ParentId){
        $subMenuHtml = '';
        $info1 = \App\SubmenuTree::where([['id','!=',0],['status','=',1],['menu_id','=',$ParentId]])->get();
        foreach($info1 as $val1){
            unset($Permit);
            $Permit = menuPermit($ParentId,$val1->id);
            if($Permit == TRUE){
                if(Request::segment(2) == $val1->submenu_check || Request::segment(1) == $val1->submenu_check)
                    $class='active';
                else 
                    $class='';
                $link = url('administrator/'.$val1->link);
                $subMenuHtml .= '<li class='.$class.'><a href='.$link.'>'.$val1->name;
                if($val1->notice_status == 1){
                    $subMenuHtml .= '<i class="fa fa-bell bel" aria-hidden="true"><dt>';
                    if($val1->id == 8){
                    	$subMenuHtml .= blogCommentsAlert();
                    }
                    if($val1->id == 10){
                    	$subMenuHtml .= assBookingAlert();
                    }
                    if($val1->id == 11){
                    	$subMenuHtml .= adminBookingAlert();
                    }
                    $subMenuHtml .= '</dt></i>';
                }
                $subMenuHtml .= '</a></li>';
            }
        }
        return $subMenuHtml;
    }
}

if (!function_exists('countTotSubMenu')) {
    function countTotSubMenu($ParentId){
        $tot = \App\SubmenuTree::where([['id','!=',0],['status','=',1],['menu_id','=',$ParentId]])->count();
        return $tot;
    }
}

// Check is this menu or sub menu is allowed or not to logged in user.
if (!function_exists('menuPermit')) {
    function menuPermit($menuId = '', $subMenuId = ''){
        $userId = Auth::user()->id;
        if($menuId != '' || $subMenuId != ''){
            $info = \App\MenuPermit::where([['menu_id','=',$menuId],['sub_menu_id','=',$subMenuId],['user_id','=',$userId]])->first();
            if(!empty($info)){
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}

if(!function_exists('cmsMenu')){
    function cmsMenu($parent = 0, $spacing = '', $user_tree_array = '') {
      if (!is_array($user_tree_array))
        $user_tree_array = array();
      $sql = CmsPage::where('parent_id', $parent)->orderBy('id', 'ASC')->get();
        if ($sql != NULL) {
            foreach($sql as $v) {
              $user_tree_array[] = array("id" => $v->id, "name" => $spacing."<strong>".$v->title."</strong>");
              $user_tree_array = cmsMenu($v->id, $spacing . '&nbsp;&nbsp;&nbsp;&nbsp;', $user_tree_array);
          }
          return $user_tree_array;
        }
    }
}



if(!function_exists('fetchCategoryTreeList')){
    function fetchCategoryTreeList($parent = 0, $user_tree_array = '') {

      if (!is_array($user_tree_array))
      $user_tree_array = array();
      $sql = CmsPage::where('parent_id', $parent)->orderBy('id', 'DESC')->get();
     
     
      if ($sql != NULL) {
         $user_tree_array[] = "<ul class='myul'>";
        foreach($sql as $v) {
            $URL = Config::get('constants.site_url');
            $edit = "<a class='btn btn-xs btn-primary' href='".$URL."administrator/cms-page/".$v->id."/edit' data-toggle='tooltip' data-title='Edit'><i class='fa fa-edit'></i></a>";
			
		   if($v->id > 2){
           $delete = "<a class='btn btn-xs btn-danger' onclick='return confirm(".'"Are you sure you want to delete this CMS"'.")' href='".$URL."administrator/cms-page/".$v->id."/delete' data-toggle='tooltip' data-title='Delete'><i class='fa fa-trash'></i></a>";
		   }else{
			   $delete = '';
		   }
		   
			
			

            $parentc = CmsPage::where('parent_id', $v->id)->count();
            if($parentc > 0){
                $pclass = "";
                if($v->status==1){
                  $user_tree_array[] = "<li><dt><span class='pull-left wi80'>".$pclass." ".$v->title."</span><div class='action pull-left'><a class='btn btn-xs btn-success' onclick='return confirm(".'"Are you sure you want to Inactive this CMS"'.")' href='".$URL."administrator/cms-ststus/".$v->id."' data-toggle='tooltip' data-title='Active'>Active</a> ".$edit." ".$delete."</div><div class='clearfix mb20'></div></dt>";
                }else{
                  $user_tree_array[] = "<li><dt><span class='pull-left wi80'>".$pclass." ". $v->title."</span><div class='action pull-left'><a class='btn btn-xs btn-danger' onclick='return confirm(".'"Are you sure you want to Active this CMS"'.")' href='".$URL."administrator/cms-ststus/".$v->id."' data-toggle='tooltip' data-title='Inactive'>Inactive</a>".$edit." ".$delete."</div><div class='clearfix mb20'></div></dt>";
              }
              $user_tree_array = fetchCategoryTreeList($v->id, $user_tree_array);
            }else{
                if($v->status==1){
                    $user_tree_array[] = "<li><dt><span class='pull-left wi80'>".$v->title."</span><div class='action pull-left'><a class='btn btn-xs btn-success' onclick='return confirm(".'"Are you sure you want to Inactive this CMS"'.")' href='".$URL."administrator/cms-ststus/".$v->id."' data-toggle='tooltip' data-title='Active'>Active</a> ".$edit." ".$delete."</div><div class='clearfix mb20'></div></dt>";
                }else{
                    $user_tree_array[] = "<li><dt><span class='pull-left wi80'>". $v->title."</span><div class='action pull-left'><a class='btn btn-xs btn-danger' onclick='return confirm(".'"Are you sure you want to Active this CMS"'.")' href='".$URL."administrator/cms-ststus/".$v->id."' data-toggle='tooltip' data-title='Inactive'>Inactive</a>".$edit." ".$delete."</div><div class='clearfix mb20'></div></dt>";
                }
                
            }


          $user_tree_array[] = "</li>";
        }
        $user_tree_array[] = "</ul>";
      }
      return $user_tree_array;
    }
}


if(!function_exists('frontFetchCategoryTreeList')){
    function frontFetchCategoryTreeList($parent, $user_tree_array = '') {
      if (!is_array($user_tree_array))
      $user_tree_array = array();
      $sql = CmsPage::where([['parent_id', '=', $parent],['status', '=', 1]])->orderBy('id', 'DESC')->get();
      //dd($sql);
      if (!$sql->isEmpty()) {
        $user_tree_array[] = "<ul class='myul'>";
        foreach($sql as $v) {
            $parentc = CmsPage::where([['parent_id', $v->id],['status', '=', 1]])->count();
            if($parentc > 0){
                $user_tree_array[] = "<li><dt><div class='acc-head'><a href='#'>".$v->title.'</a></div>'.$v->description.'</dt>';
                $user_tree_array = frontFetchCategoryTreeList($v->id, $user_tree_array);
            }else{
                $user_tree_array[] = "<li><dt><div class='acc-head'><a href='#'>".$v->title.'</a></div>'.$v->description.'</dt>';
            }
          $user_tree_array[] = "</li>";
        }
        $user_tree_array[] = "</ul>";
      }
      return $user_tree_array;
    }
}


if(!function_exists('deleteCategoryTreeList')){
	function deleteCategoryTreeList($parent) { 
	  $sql = CmsPage::where('id', $parent)->first();
	  if ($sql->parent_id == 0) {
			$parent_rec = CmsPage::where('parent_id', $sql->id)->get();
			/*dd($parent_rec);
			exit;*/
			foreach($parent_rec as $v) {
				 $user_tree_array = deleteCategoryTreeList($v->id);
				 \App\CmsPage::destroy($v->id);
			}
	
			if(file_exists("public/images/services/" . $sql->image)){
				if ($sql->image != '') 
				{
				  $unlink_path = "public/images/services/" . $sql->image;
				  unlink($unlink_path);
				}
			}
	
			if(file_exists("public/images/services/banner/" . $sql->banner_img)){
				if ($sql->banner_img != '') 
				{
				  $banner_unlink = "public/images/services/banner/" . $sql->banner_img;
				  unlink($banner_unlink);
				}
			}
	
			if(file_exists("public/images/services/advertisement/" . $sql->adv_img)){
				if ($sql->adv_img != '') 
				{
				  $adv_unlink = "public/images/services/advertisement/" . $sql->adv_img;
				  unlink($adv_unlink);
				}
			}
  
		  \App\CmsPage::destroy($sql->id);
  
		  }
		  
	  if ($sql->parent_id != 0) {
			$parent_rec = CmsPage::where('parent_id', $sql->id)->get();
			/*dd($parent_rec);
			exit;*/
			foreach($parent_rec as $v) {
				 $user_tree_array = deleteCategoryTreeList($v->id);
				 \App\CmsPage::destroy($v->id);
			}
	
			if(file_exists("public/images/services/" . $sql->image)){
				if ($sql->image != '') 
				{
				  $unlink_path = "public/images/services/" . $sql->image;
				  unlink($unlink_path);
				}
			}
	
			if(file_exists("public/images/services/banner/" . $sql->banner_img)){
				if ($sql->banner_img != '') 
				{
				  $banner_unlink = "public/images/services/banner/" . $sql->banner_img;
				  unlink($banner_unlink);
				}
			}
	
			if(file_exists("public/images/services/advertisement/" . $sql->adv_img)){
				if ($sql->adv_img != '') 
				{
				  $adv_unlink = "public/images/services/advertisement/" . $sql->adv_img;
				  unlink($adv_unlink);
				}
			}
  
		  \App\CmsPage::destroy($sql->id);
  
		  }
		  
		   //\App\CmsPage::destroy($sql->id);
	}
}


if(!function_exists('associateSentRequest')){
    function associateSentRequest($assId){
        $det = \App\Bookservice::where([['associate_ids', 'like', '%' . $assId . '%'],['acpt_status', '!=', 2]])->count();
        return $det;
    }
}

if(!function_exists('associateAcceptRequest')){
    function associateAcceptRequest($assId){
        $det = \App\Bookservice::where('req_acpt_id', 'like', '%' . $assId . '%')->count();
        return $det;
    }
}

if(!function_exists('requestNotAccepted')){
    function requestNotAccepted($assId){
        $det = associateSentRequest($assId) - associateAcceptRequest($assId);
        return $det;
    }
}

if(!function_exists('blogCommentsAlert')){
	function blogCommentsAlert(){
		$count = \App\BlogComment::where('status', 0)->count();
		return $count;
	}
}

if(!function_exists('assBookingAlert')){
	function assBookingAlert(){
		$count = \App\Bookservice::where([['disp_only_adm', '=', 0],['acpt_status', '=', 0]])->count();
		return $count;
	}
}

if(!function_exists('adminBookingAlert')){
	function adminBookingAlert(){
		$count = \App\Bookservice::where([['disp_only_adm', '=', 1],['acpt_status', '=', 0]])->count();
		return $count;
	}
}

if(!function_exists('prescriptionAlert')){
	function prescriptionAlert(){
		$count = \App\PrescriptionUpload::where('status', 0)->count();
		return $count;
	}
}

if(!function_exists('transferAlert')){
	function transferAlert(){
		$count = \App\Banktransfer::where('status', 0)->count();
		return $count;
	}
}

if(!function_exists('sumBookingAlert')){
	function sumBookingAlert(){
		$count = assBookingAlert() + adminBookingAlert();
		return $count;
	}
}

if(!function_exists('sendSms')){
    function sendSms($mbNo, $textSms){
        $url = 'http://sms.creativetrends.in/api/sendmsg.php';
        $data = array (
            'user' => Config::get('constants.sms_user'),
            'pass' => Config::get('constants.sms_pass'),
            'sender' => Config::get('constants.sms_sender'),
            'phone' => $mbNo,
            'text' => $textSms,
            'priority' => 'ndnd',
            'stype' => 'normal',
            );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); //Remote Location URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //parameters data    
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}

if(!function_exists('pushNotification')){
    function pushNotification($token,$message,$authorization){
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        //$token=$token;
        $notification = [
            'body' => $message,
            'sound' => true,
        ];
        
        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key='.$authorization,
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
        //dd($result);
    }
}

if(!function_exists('checkSecurity')){
    function checkSecurity($device_token, $ass_user_id, $user_type){
        $data = deviceToken::where([['device_token', '=', $device_token], ['ass_user_id', '=', $ass_user_id], ['user_type', '=', $user_type]])->first();
        if($data != null){
            return true;
        }else{
            return false;
        }
    }
}