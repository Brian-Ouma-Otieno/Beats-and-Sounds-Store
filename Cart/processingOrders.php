<?php
    require_once '../DB/beats&sounds_db.php'; 
    include '../Functions/functions.php';
    if (isset($_SESSION['reg_user'])) {
        if (isset($_POST['ProChkOut'])) {
            
            $phone = $_POST['num'];
            $pinCode = 'BSS_'.uniqid();
            $error = array();
            $success = true;
            $sqlPcheckOut = "SELECT * FROM regular_users WHERE id = $_SESSION[reg_user]";
            $PcheckOutQuery = mysqli_query($db_connect,$sqlPcheckOut);
            $PcheckOutFetch = mysqli_fetch_assoc($PcheckOutQuery);

            if(empty($phone)){
                $error[] = 'You must provide Phone number.';
                $success = false;        
            } 

            if (!empty($phone)) {
                if (!preg_match("/^[0-9]*$/",$phone)) {
                    
                    $error[] = 'Please provide the correct phone number.';
                    $success = false;
                }
            }

            // check for errors
            if($success == false){
                echo display_errors($error[0]);

            }else{
                // echo'OK';
                // Initialize the variables
                $consumer_key = 'Lms5EIf2gK16o1sptYPaA3HsfbGUd7fv';
                $consumer_secret = 'dgfk1IefQx1SnG1A';
                $Business_Code = '174379';
                $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
                $Type_of_Transaction = 'CustomerPayBillOnline';
                $Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
                // $phone_number = $_POST['phone_number'];
                $phone = $_POST['num'];
                $OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
                $total_amount = $_POST['amount'];
                $CallBackURL = 'https://2f50f430.ngrok.io/callback.php?key=your password';
                $Time_Stamp = date("Ymdhis");
                $password = base64_encode($Business_Code . $Passkey . $Time_Stamp);

                //generate authentication token.
                $curl_Tranfer = curl_init();
                curl_setopt($curl_Tranfer, CURLOPT_URL, $Token_URL);
                $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
                curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
                curl_setopt($curl_Tranfer, CURLOPT_HEADER, false);
                curl_setopt($curl_Tranfer, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl_Tranfer, CURLOPT_SSL_VERIFYPEER, false);
                $curl_Tranfer_response = curl_exec($curl_Tranfer);

                $token = json_decode($curl_Tranfer_response)->access_token;

                $curl_Tranfer2 = curl_init();
                curl_setopt($curl_Tranfer2, CURLOPT_URL, $OnlinePayment);
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
                    'AccountReference' => 'Hillary',
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

            }
        }       
    }else{
        header('Location: /Beats and sounds store/');
    }
    
    include '../Includes/head.php';
    include '../Includes/navbar.php';  
?>

<h2 class='margin h3'>CHECKOUT</h2>
<!-- <div class="margin" style="height: 250px; background-color:#C0C0C0;;"> -->

    <!-- <div class="pos-sp-around"> -->
        <div class="margin">
            <h2>Beat Details</h2>
            <p><strong>Beat Name:</strong>   </p>
            <p><strong>By:</strong> </p>
            <p><strong>Price:</strong> </p> 
            <hr>
            <h2>Payment Method</h2>
            <p>Mpesa</p> 
            <hr>
        </div>
        <div class="pos-middle">
            <div class="form-container">
                <form action="processingOrders.php" method="POST" class="form1">
                    <!-- <input type="radio" name="" value=""> Mpesa<br>
                    <input type="radio" name="" value=""> Airtel Money<br>
                    <input type="radio" name="" value=""> Paypal<br><br> -->
                    <div class="form-control">
                        <label for="">Username</label>
                        <input type="text" value="<?= ((isset($PcheckOutFetch['username']))? $PcheckOutFetch['username']:'') ;?>" readonly>
                    </div>
                    <div class="form-control">
                        <label for="">Email</label>
                        <input type="email" value="<?= ((isset($PcheckOutFetch['email']))? $PcheckOutFetch['email']:'');?>" readonly>
                    </div>
                    <div class="form-control">
                        <label for="">Phone Number</label>
                        <input type="text" name="num" placeholder="Enter Phone Number eg. 07xxxxxxxx">
                    </div>  
                    <div class="form-control">
                        <label for="">Pin Code</label>
                        <input type="text" value="<?= ((isset($pinCode))? $pinCode:'');?>" readonly>
                    </div>
                    
                    <div class="form-group-child">               
                        <button type="submit"  name="ProChkOut" value="">Confirm Purchase</button>       
                    </div>
                </form>
            </div> 
        </div>  
    <!-- </div> -->
     
<!-- </div> -->
    







<?php
    include '../Includes/footer.php';
?>