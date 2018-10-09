<?php
/*$method = $_SERVER['REQUEST_METHOD'];
//process only when method id post
if($method == 'POST')
{*/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.dialogflow.com/v1/query?v=20150910");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"lang\": \"en\", \"sessionId\":\"12345\",\"event\":{\"name\":\"TESTEVENT\",\"data\":{\"user_name\":\"Rachna\"}}}");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/json; charset=utf-8";
$headers[] = "Authorization: Bearer a7fa07b1e8cb46bc881c1a8bd1491838";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$json = curl_exec($ch);
$someobj = json_decode($json,true);

$speech = $someobj;
if (curl_errno($ch)) {
    $speech =  'Error:' . curl_error($ch);
}
//$speech = $someobj->id;  result->fulfillment->speech;
curl_close ($ch);
$response = new \stdClass();
    	$response->results = $speech;
    	$response->source = "webhook";
	echo json_encode($response);
/*}
else
{
	echo "Method not allowed";
}*/
?>
	
