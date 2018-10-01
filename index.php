<?php
$method = $_SERVER['REQUEST_METHOD'];
//process only when method id post
if($method == 'POST')
{
	
$sessionID = uniqid('',true);

try {
    // create curl resource
    $ch = curl_init();
    // set url
    curl_setopt($ch, CURLOPT_URL, "https://api.api.ai/v1/query?v=20181001&e=TESTEVENT&lang=en&sessionId=" . $sessionID);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer a7fa07b1e8cb46bc881c1a8bd1491838'));
    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // $output contains the output string
    $output = curl_exec($ch);
    // close curl resource to free up system resources
    curl_close($ch);
}catch (Exception $e) {
    $speech = "Welcome to India";
    $fulfillment = new stdClass();
    $fulfillment->speech = $speech;
    $result = new stdClass();
    $result->fulfillment = $fulfillment;
    $response = new stdClass();
    $response->result = $result;
    echo json_encode($response);
	
}
?>
