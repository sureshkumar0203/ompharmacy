<?php

namespace App\Http\Controllers;
use App\User;
use App\ServiceRequest;
use App\UserRegistration;
use App\Services;
use App\CmsPage;
use App\Bookservice;
use App\TransactionHistory;
use App\deviceToken;
use Session;
use Illuminate\Http\Request;
use DateTime;
use DateInterval;
use Config;

class BookingController extends Controller
{
    public function bookingService($id){
    	$userData = UserRegistration::where('id', Session::get('userId'))->first();
        $map_api_key = Config::get('constants.map_api_key');

        if($userData->lat != '' && $userData->lat != null){
            $user_lat = $userData->lat;
        }else{
            $user_lat = Config::get('constants.defult_lat');
        }

        if($userData->lng != '' && $userData->lng != null){
            $user_lng = $userData->lng;
        }else{
            $user_lng = Config::get('constants.defult_lng');
        }



    	$service = Services::with('cms_page')->where('id', $id)->first();
		if($service == null){
			return redirect('404');
		}
        //dd($service);
        $creditAmount = walletCredit(Session::get('userId'));
        $debitAmount = walletDebit(Session::get('userId'));
        $totalAmount = walletAmount(Session::get('userId'));
        if($totalAmount < $service->sale_price){
            return redirect('./');
        }
        $current_time = date('H:i:s');
        $from_time = $service->cms_page->from_time;
        $to_time = $service->cms_page->to_time;
        
        //24 hour services booking
        if($service->cms_page->time24_status == 0){
                //After how many hrs you will get the services. Which is set in adminpanel-services 
                $hour = $service->hour;
                $minute = $service->minute;


                $currentDate = date('d-m-Y');
                $currentDateTime = date('Y-m-d h:i A');
                $time = new DateTime($currentDateTime);
                $time->add(new DateInterval('PT' . $hour . 'H' . $minute . 'M'));

                //Get the booking date and time
                $bookDate = $time->format('d-m-Y');
                $bookFromTime = $time->format('h:i A');

                //echo $bookDate; exit;
                
                $bookToTime = "11:45 PM";

                //Server time
                $serverTime = $time->format('H:i:00');
                
                if(strtotime($bookDate) > strtotime($currentDate)){
                    $bookFromTime = $service->cms_page->from_time;
                }

                //Restricted service that means opening time and closeing time is avalable 
                if($service->cms_page->time24_status !=0){
                    if(strtotime($serverTime) > strtotime($service->cms_page->from_time) && strtotime($serverTime) > strtotime($service->cms_page->to_time)){
                        $date = $currentDate;
                        $date = strtotime($date);
                        $date = strtotime("+1 day", $date);
                        $bookDate = date('d-m-Y', $date);
                        $bookFromTime = $service->cms_page->from_time;
                        $bookToTime = $service->cms_page->to_time;
                    }
                }
                    
                $diff = strtotime($bookDate) - strtotime($currentDate);
                $diffDay =  abs(round($diff / 86400));
                if($diffDay != 0){
                    $diffDays = $diffDay;
                }else{
                    $diffDays = "true";
                }

                //service_request !=1 then this service send to associate otherswise service send to admin

                if($service->cms_page->service_request !=1 || null){
                    return view('booking-service', compact('userData', 'service', 'bookDate', 'bookFromTime', 'bookToTime', 'diffDays', 'serverTime', 'user_lat', 'user_lng', 'map_api_key'));
                }else{
                    return view('booking-service-admin', compact('userData', 'service', 'bookDate', 'bookFromTime', 'bookToTime', 'diffDays', 'serverTime', 'user_lat', 'user_lng', 'map_api_key'));
                }
        }else{
            if($current_time <= $to_time && $current_time >= $from_time){
                $hour = $service->hour;
                $minute = $service->minute;
                $currentDate = date('d-m-Y');
                $currentDateTime = date('Y-m-d h:i A');
                $time = new DateTime($currentDateTime);
                $time->add(new DateInterval('PT' . $hour . 'H' . $minute . 'M'));

                $bookDate = $time->format('d-m-Y');
                //echo $bookDate; exit;
                $bookFromTime = $time->format('h:i A');

                $bookToTime = $service->cms_page->to_time;
                $serverTime = $time->format('H:i:00');

                if(strtotime($bookDate) > strtotime($currentDate)){
                    $bookFromTime = $service->cms_page->from_time;
                    $bookToTime = $service->cms_page->to_time;
                }

                if(strtotime($serverTime) > strtotime($service->cms_page->from_time) && strtotime($serverTime) > strtotime($service->cms_page->to_time)){
                //if($currentDate == $bookDate){
                    //echo "here"; exit;
                    $date = $currentDate;
                    $date = strtotime($date);
                    $date = strtotime("+1 day", $date);
                    $bookDate = date('d-m-Y', $date);
                    $bookFromTime = $service->cms_page->from_time;
                    $bookToTime = $service->cms_page->to_time;
                }
                //echo $bookDate.'//'.$currentDate; exit;
                $diff = strtotime($bookDate) - strtotime($currentDate);
                $diffDay =  abs(round($diff / 86400));
                if($diffDay != 0){
                    $diffDays = $diffDay;
                }else{
                    $diffDays = "true";
                }
                
                if($service->cms_page->service_request !=1 || null){
                    return view('booking-service', compact('userData', 'service', 'bookDate', 'bookFromTime', 'bookToTime', 'diffDays', 'serverTime', 'user_lat', 'user_lng', 'map_api_key'));
                }else{
                    return view('booking-service-admin', compact('userData', 'service', 'bookDate', 'bookFromTime', 'bookToTime', 'diffDays', 'serverTime', 'user_lat', 'user_lng', 'map_api_key'));
                }
            }else{
                return redirect('./');
            }
        }
    }

    public function changeDate(Request $request){
        //dd($request->all());
    	$date = $request->input('date');
    	$assignDate = $request->input('assignDate');
        $assignTime = $request->input('assignTime');
        $category = $request->input('category');
        $service = CmsPage::where('id', $category)->select('id', 'from_time', 'to_time', 'time24_status')->first();

        $diff = strtotime($date) - strtotime($assignDate);
        $diffDay =  abs(round($diff / 86400));
        if($diffDay == 0){
            if($service->time24_status == 0){
                $exTime = explode(':', $assignTime);
                $h = $exTime[0];
                $m = $exTime[1];
                if($m > 45){
                    $h = $h+1;
                }
                $minuteRound = minuteRound($m);
                $getHours = create_time_range($h.':'.$minuteRound, '23:45:00', '15 mins');
                return response()->json(['response' => "success", 'getHours' => $getHours]);
            }else{
                if(strtotime($assignTime) > strtotime($service->from_time) && strtotime($assignTime) > strtotime($service->to_time)){
                    $assignTime = $service->from_time;
                }
                $exTime = explode(':', $assignTime);
                $h = $exTime[0];
                $m = $exTime[1];
                if($m > 45){
                    $h = $h+1;
                }
                $minuteRound = minuteRound($m);
                $getHours = create_time_range($h.':'.$minuteRound, $service->to_time, '15 mins');
                return response()->json(['response' => "success", 'getHours' => $getHours]);
            }
        }else{
            if($service->time24_status == 0){
                $getHours =  create_time_range('00:00:00', '23:45:00', '15 mins');
                return response()->json(['response' => "success", 'getHours' => $getHours]);
            }else{
                $getHours =  create_time_range($service->from_time, $service->to_time, '15 mins');
                return response()->json(['response' => "success", 'getHours' => $getHours]);
            }
        }
    }

    public function sendRequest(Request $request){
        //dd($request->all());
        $adminPhone =  getAdminDetails()->phone_no;
        $user_id = Session::get('userId');
        $userlat = $request->input('lat');
        $userlng = $request->input('lng');
        $creditAmount = walletCredit($user_id);
        $debitAmount = walletDebit($user_id);
        $totalAmount = walletAmount($user_id);

        $around_km = Config::get('constants.around_km');
        $random_asso = Config::get('constants.random_asso');

        $service = Services::with(array('cms_page'=>function($query){
            $query->select('id', 'title', 'service_request');
        }))->where('id', $request->input('services_id'))->first();
        //dd($service);
		//Associate Booking section
		$associate = User::where([['id', '!=', 1], ['type', '=', null], ['active', '=', 1]])->select('id', 'lat', 'lng')->inRandomOrder()->take($random_asso)->get();
        
		if($service->cms_page->service_request != 1 && count($associate) > 0){
			$asso_id_ary = array();
			foreach ($associate as $key => $value) {
				$km = distanceCalculation($value->lat, $value->lng, $userlat, $userlng);
				if($km <= $around_km){
					array_push($asso_id_ary, $value->id);
					//$asso_id_ary[] = $value->id;
				}
			}

			$associate_ids = implode(',', $asso_id_ary);
			$data = $request->all();
			$data['user_id'] = $user_id;
			$data['associate_ids'] = $associate_ids;
            $data['price'] = $service->sale_price;
			$data['booking_date'] = date('Y-m-d' ,strtotime($request->input('booking_date')));
			$data['booking_time']  = date("H:i", strtotime($request->input('booking_time')));
			$data['service_address']  = $request->input('service_address');
			$data['lat']  = $userlat;
			$data['lng']  = $userlng;
			//dd($data);
			$booking = Bookservice::create($data);

            
			if($booking){
				$balance = [];
				$balance['user_id'] = $user_id;
				$balance['booking_id'] = $booking->id;
				$balance['debit_amount'] = $service->sale_price;
				$debitMoney = TransactionHistory::create($balance);
				
				
				if($debitMoney){
					//Push Notification for associate
                    $lastId = $booking->id;
                    $bookingFetch = Bookservice::where('id', $lastId)->first();
                    $insAssIds = $bookingFetch->associate_ids;
                    $arr_ph = explode(',', $insAssIds);

                    $authorization = Config::get('constants.authorization');
                    $message = "A new booking is placed. Check your application to get the booking details";
                    foreach($arr_ph as $val){
                        $deviceToken = deviceToken::where([['user_type', '=', 1], ['ass_user_id', '=', $val]])->first();
                        if($deviceToken != null){
                            pushNotification($deviceToken->device_token, $message, $authorization);
                        }
                    }

                    //SMS for Customer
                    $sms = sendSms(customerMobile($user_id), 'Your Booking has been Completed successfully, BOOKING ID : #'.$booking->id.', SERVICE NAME : '.$service->cms_page->title.', TEST NAME : '.$service->name.', TEST ID : #'.$service->test_id.', SERVICE PRICE : ₹ '.$service->sale_price.', SERVICE BOOKING DATE : '.$request->input('booking_date').' AT '.$request->input('booking_time'));
					
					//SMS for Admin
                    $aSms = sendSms($adminPhone, 'Dear Admin now as a new booking, BOOKING ID : #'.$booking->id.', SERVICE NAME : '.$service->cms_page->title.', TEST NAME : '.$service->name.', TEST ID : #'.$service->test_id.', SERVICE PRICE : ₹ '.$service->sale_price.', SERVICE BOOKING DATE : '.$request->input('booking_date').' AT '.$request->input('booking_time'));

					return view('book-success');
				}
			}else{
				return back()->withInput();
			}
        }else{
			//Admin Booking section
            $data = $request->all();
            $data['user_id'] = $user_id;
            $data['associate_ids'] = 1;
            $data['disp_only_adm'] = 1;
            $data['price'] = $service->sale_price;
            $data['booking_date'] = date('Y-m-d' ,strtotime($request->input('booking_date')));
            $data['booking_time']  = date("H:i", strtotime($request->input('booking_time')));
            $data['service_address']  = $request->input('service_address');
            $data['lat']  = $userlat;
            $data['lng']  = $userlng;
            //dd($data);
            $booking = Bookservice::create($data);

            if($booking){
                $balance = [];
                $balance['user_id'] = $user_id;
                $balance['booking_id'] = $booking->id;
                $balance['debit_amount'] = $service->sale_price;
                $debitMoney = TransactionHistory::create($balance);
				
                if($debitMoney){
                    //SMS for Customer
                    $sms = sendSms(customerMobile($user_id), 'Your Booking has been Completed successfully, BOOKING ID : #'.$booking->id.', SERVICE NAME : '.$service->cms_page->title.', TEST NAME : '.$service->name.', TEST ID : #'.$service->test_id.', SERVICE PRICE : ₹ '.$service->sale_price.', SERVICE BOOKING DATE : '.$request->input('booking_date').' AT '.$request->input('booking_time'));
					
					 //SMS for Admin
                    $aSms = sendSms($adminPhone, 'Dear Admin now as a new booking, BOOKING ID : #'.$booking->id.', SERVICE NAME : '.$service->cms_page->title.', TEST NAME : '.$service->name.', TEST ID : #'.$service->test_id.', SERVICE PRICE : ₹ '.$service->sale_price.', SERVICE BOOKING DATE : '.$request->input('booking_date').' AT '.$request->input('booking_time'));
					//echo $aSms; exit;
					return view('book-success');
                }
            }else{
                return back()->withInput();
            }
        }
    }
    
}
