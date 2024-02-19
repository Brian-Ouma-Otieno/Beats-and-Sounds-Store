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


<!-- 
<form class="contact2-form validate-form" action="#" method="post">
   <input type="hidden" name="Check_request_ID" value="">
   </br></br>
   <button class="contact2-form-btn" style="margin-bottom: 30px;">Confirm Payment is Complete</button>
</form> -->