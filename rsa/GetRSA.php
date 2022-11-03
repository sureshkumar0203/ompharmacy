<?php
$url = "https://secure.ccavenue.com/transaction/getRSAKey";

//$res_ = array();
$posted = $request->all();
$post = json_decode($posted['data'],true);

$access_code = $post['access_code'];
$order_id = $post['order_id'];	

$fields = array(
	'access_code'=>$access_code,
    'order_id'=>$order_id
);
	
/*$fields = array(
	'access_code'=>$_POST['access_code'],
    'order_id'=>$_POST['order_id']
);*/

$postvars='';
$sep='';
foreach($fields as $key=>$value){
	$postvars.= $sep.urlencode($key).'='.urlencode($value);
	$sep='&';
}
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch, CURLOPT_CAINFO, 'cacert.pem');
curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);

echo $result;
?>
