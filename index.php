<?php
$method = $_SERVER['REQUEST_METHOD'];
//process only when method id post
//if($method == 'POST')
//{
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.api.ai/api/query?v=20150910");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{'event':{ 'name': 'TESTEVENT', \n'parameters': {'name': 'Rachna'}}, \n'timezone':'Asia/Calcutta', 'lang':'en', 'sessionId':'1321321'}");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/json; charset=utf-8";
$headers[] = "Authorization: Bearer a7fa07b1e8cb46bc881c1a8bd1491838";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$json = curl_exec($ch);
$speech = json_decode($json,true);
if (curl_errno($ch)) {
    $speech =  'Error:' . curl_error($ch);
}
$response = new \stdClass();
    	$response->fulfillmentText = $speech;
    	$response->source = "webhook";
	echo json_encode($response);
curl_close ($ch);
}
//else
//{
	//echo "Method not allowed";
//}

?>
	
