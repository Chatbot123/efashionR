<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.api.ai/api/query?v=20150910");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{'event':{ 'name': 'TESTEVENT', \n'data': {'name': 'Rachna'}}, \n'timezone':'Asia/Calcutta', 'lang':'en', 'sessionId':'1321321'}");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/json; charset=utf-8";
$headers[] = "Authorization: Bearer a7fa07b1e8cb46bc881c1a8bd1491838";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
?>
	
