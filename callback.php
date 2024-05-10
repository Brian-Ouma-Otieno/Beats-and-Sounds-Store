<?php 
    require_once 'DB/beats&sounds_db.php';
    include 'Functions/functions.php';


    if (isset($_SESSION['reg_user']) && isset($_POST['Beatid'])) {

        // header("Content-Type: application/json");
        header("Content-Type: application/json; charset=UTF-8");

        $userId = $_SESSION['reg_user'];
        $beatId = $_POST['Beatid'];

        $DownQuery = mysqli_query($db_connect,"SELECT * FROM beats WHERE id = '$beatId'");
        $DownFetch = mysqli_fetch_assoc($DownQuery);

        $DownName = $DownFetch['beat_name'];
        $DownAuthor = $DownFetch['author']; 
        $DownImage = $DownFetch['image']; 
        $DownPrice = $DownFetch['price'];
        $DownAudio = $DownFetch['audio'];
               
        

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
            mysqli_query($db_connect,"INSERT INTO transactions (MerchantRequestID,CheckoutRequestID,ResultCode,Amount,MpesaReceiptNumber,PhoneNumber,TransactionDate,reg_userCartid,beat_id) 
            VALUES ('$MerchantRequestID','$CheckoutRequestID','$ResultCode','$Amount','$TransactionId','$UserPhoneNumber','$TransactionDate','$userId','$beatId')");

            mysqli_query($db_connect,"INSERT INTO downloads (beat_name, author, image, audio, reg_userCartid) VALUES ('$DownName', '$DownAuthor', '$DownImage', '$DownAudio', '$userId')");
        }
    

    }else {
        header('Location: /Beats and sounds store/');
    }



?>