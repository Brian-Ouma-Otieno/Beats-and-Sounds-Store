<?php
    require_once '../DB/beats&sounds_db.php'; 
    include '../Functions/functions.php';

    if (isset($_POST['chkOutbtn']) && isset($_SESSION['reg_user'])) {
        $phone_number = $_POST['chkNum'];
        $chkUname = $_POST['chkUname'];
        $chkEmail = $_POST['chkEmail'];
        $chkPin = $_POST['chkPin'];
          
        $error = array();
        $success = true;

        if(empty($phone_number)){
            $error[] = 'Please provide phone number.';
            $success = false;        
        } 

        if (!empty($phone_number)) {
            if (!preg_match("/^([0-9]{12})*$/",$phone_number)) {
                
                $error[] = 'Please provide the correct phone number.';
                $success = false;
            }
        }

        // check for errors
        if($success == false){
            echo display_errors($error[0]);

        }else{
            // Initialize the variables
            $consumer_key = 'FAJXHBudGNPg5DH9d7A7dZ8zHrAP7SEI';
            $consumer_secret = 'hxCAcSokgMACo37i';
            $Business_Code = '174379';
            // $Passkey = 'MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjMxMjE1MjAyMjI5';
            $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
            $Type_of_Transaction = 'CustomerPayBillOnline';
            // Authenticate and return the API token used for accessing Lipa Na Mpesa services in Safaricom Daraja
            $Token_URLauthorization = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
            $phone_number = $_POST['chkNum'];
            // $phone_number = '254716307679';
            // Initiates online payment on behalf of a customer.
            $OnlinePaymentRequest = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
            $total_amount = '1';
            // $CallBackURL = 'https://2f50f430.ngrok.io/callback.php?key=your password';
            // URL used to receive notifications from Mpesa API.
            $CallBackURL = 'https://f831-105-162-11-182.ngrok-free.app/Beats%20and%20Sounds%20Store/callback.php';
            // $CallBackURL = "https://mydomain.com/path";
            date_default_timezone_set("Africa/Nairobi");
            $Time_Stamp = date("Ymdhis");
            $password = base64_encode($Business_Code . $Passkey . $Time_Stamp);

            //generate authentication token.
            $curl_Tranfer = curl_init();
            curl_setopt($curl_Tranfer, CURLOPT_URL, $Token_URLauthorization);
            $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
            curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
            curl_setopt($curl_Tranfer, CURLOPT_HEADER, false);
            curl_setopt($curl_Tranfer, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_Tranfer, CURLOPT_SSL_VERIFYPEER, false);
            $curl_Tranfer_response = curl_exec($curl_Tranfer);

            $token = json_decode($curl_Tranfer_response)->access_token;

            // Initiating the STK push on the users’ phone
            $curl_Tranfer2 = curl_init();
            curl_setopt($curl_Tranfer2, CURLOPT_URL, $OnlinePaymentRequest);
            curl_setopt($curl_Tranfer2, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));

            $curl_Tranfer2_post_data = [
                'BusinessShortCode' => $Business_Code,
                'Password' => $password,
                'Timestamp' =>$Time_Stamp,
                'TransactionType' =>$Type_of_Transaction,
                'Amount' => $total_amount,
                'PartyA' => $phone_number,
                'PartyB' => $Business_Code,
                'PhoneNumber' => $phone_number,
                'CallBackURL' => $CallBackURL,
                'AccountReference' => 'Brian',
                'TransactionDesc' => 'Test',
            ];

            $data2_string = json_encode($curl_Tranfer2_post_data);

            curl_setopt($curl_Tranfer2, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_Tranfer2, CURLOPT_POST, true);
            curl_setopt($curl_Tranfer2, CURLOPT_POSTFIELDS, $data2_string);
            curl_setopt($curl_Tranfer2, CURLOPT_HEADER, false);
            curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYHOST, 0);
            $curl_Tranfer2_response = json_decode(curl_exec($curl_Tranfer2));

            echo json_encode($curl_Tranfer2_response, JSON_PRETTY_PRINT);

            
            // codes from daraja API 
            // $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
            // curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer cFJZcjZ6anEwaThMMXp6d1FETUxwWkIzeVBDa2hNc2M6UmYyMkJmWm9nMHFRR2xWOQ=='.base64_encode($consumer_key . ':' . $consumer_secret)]);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // $response = curl_exec($ch);
            // curl_close($ch);
            // echo $response;


            // $ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
            // curl_setopt($ch, CURLOPT_HTTPHEADER, [
            //     'Authorization: Bearer X86GG4NxWq0VQJrCx3oN3Sm1eyIp',
            //     'Content-Type: application/json'
            // ]);
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data2_string
            // // {
            // //     "BusinessShortCode": 174379,
            // //     "Password": "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjMxMjE2MTI1NjQ5",
            // //     "Timestamp": "20231216125649",
            // //     "TransactionType": "CustomerPayBillOnline",
            // //     "Amount": 1,
            // //     "PartyA": 254716307679,
            // //     "PartyB": 174379,
            // //     "PhoneNumber": 254716307679,
            // //     "CallBackURL": "https://mydomain.com/path",
            // //     "AccountReference": "CompanyXLTD",
            // //     "TransactionDesc": "Payment of X" 
            // // }
            // );
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // $response     = curl_exec($ch);
            // curl_close($ch);
            // echo $response;


                

                

        }
               


    }else{
        header('Location: /Beats and sounds store/');
    }

    
?>


    
