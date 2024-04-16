<?php 
header("Content-Type: application/json");

$response = '{
   "ResultCode" : 0,
   "ResultDesc" : "Confirmation Received Successfully"
}';

$mpesaFeedback = file_get_contents('php://input');

// log the response
$logFile = "mpesaResponse.json";

// write to file
$log = fopen($logFile, "a");

fwrite($log, $mpesaFeedback);
fclose($log);

$mpesaFeedbackJson = json_decode($mpesaFeedback, true);
echo $mpesaFeedbackJson;




?>