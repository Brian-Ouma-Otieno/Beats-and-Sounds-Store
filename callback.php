<?php 
require_once 'DB/beats&sounds_db.php';
include 'Functions/functions.php';




// header("Content-Type: application/json");
header("Content-Type: application/json; charset=UTF-8");

// $response = '{
//    "ResultCode" : 0,
//    "ResultDesc" : "Confirmation Received Successfully"
// }';

$mpesaFeedback = file_get_contents('php://input');

// log the response
$logFile = "mpesaResponse.json";

// write to file
$log = fopen($logFile, "a");

fwrite($log, $mpesaFeedback);
fclose($log);

$mpesaFeedbackData = json_decode($mpesaFeedback);
echo $mpesaFeedbackData;

$MerchantRequestID = $mpesaFeedbackData->Body->stkCallback->MerchantRequestID;
$CheckoutRequestID = $mpesaFeedbackData->Body->stkCallback->CheckoutRequestID;
$ResultCode = $mpesaFeedbackData->Body->stkCallback->ResultCode;
$ResultDesc = $mpesaFeedbackData->Body->stkCallback->ResultDesc;
$Amount = $mpesaFeedbackData->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$TransactionId = $mpesaFeedbackData->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$TransactionDate = $mpesaFeedbackData->Body->stkCallback->CallbackMetadata->Item[3]->Value;
$UserPhoneNumber = $mpesaFeedbackData->Body->stkCallback->CallbackMetadata->Item[4]->Value;

// check if the transaction was successful
if ($ResultCode == 0) {
    // store the transaction details in the database
    mysqli_query($db_connect,"INSERT INTO transactions (MerchantRequestID,CheckoutRequestID,ResultCode,Amount,MpesaReceiptNumber,PhoneNumber,TransactionDate) 
    VALUES ('$MerchantRequestID','$CheckoutRequestID','$ResultCode','$Amount','$TransactionId','$UserPhoneNumber','$TransactionDate')");
}


?>