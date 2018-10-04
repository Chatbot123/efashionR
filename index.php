<?php

$method = $_SERVER['REQUEST_METHOD'];
//process only when method id post
if($method == 'POST')
{


	

	$sessionID = uniqid('',true);
try {
    
        $query = $_POST['Hi'];
        $sessionid = $_POST['sessionid'];
        $postData = array('query' => array($query), 'lang' => 'en', 'sessionId' => $sessionid);
        $jsonData = json_encode($postData);
        $v = date('Ymd');
        $ch = curl_init('https://api.api.ai/v1/query?v='.$v);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer CLIENT_ACCESS_TOKEN'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        echo $result;
        curl_close($ch);
    
}
catch (Exception $e) {
    $speech = $e->getMessage();
   $response = new \stdClass();
    	$response->fulfillmentText = $speech;
    	$response->source = "webhook";
	
    echo json_encode($response);
}
	}
else
{
	echo "Method not allowed";
}
?>
	//------------------------------------------

/*	$event_url = "https://api.dialogflow.com/v1/query?v=20181001&sessionId=".$sessionID;
	//$username    = "intelligentmachine2018@gmail.com";
    //$password    = "Centurylink2018";
		$ch      = curl_init($event_url);
    	$options = array(
        	CURLOPT_SSL_VERIFYPEER => false,
        	CURLOPT_RETURNTRANSFER => true,
        	//CURLOPT_USERPWD        => "{$username}:{$password}",
        	CURLOPT_HTTPHEADER     => array( 'Content-Type: application/json',
						'Authorization: Bearer a7fa07b1e8cb46bc881c1a8bd1491838'
											),
			CURLOPT_POSTFIELDS	=> array( "lang": "en",
							 "query": "Hi",
							 "e": "TESTEVENT"
			
							)
    		);
    		curl_setopt_array( $ch, $options );
		$json = curl_exec( $ch );
		$someobj = json_decode($json,true);
		$speech = $someobj;
	echo $speech;
	$response = new \stdClass();
    	$response->fulfillmentText = $speech;
    	$response->source = "webhook";
	echo json_encode($response);

}
else
{
	echo "Method not allowed";
}

?>*/

	
