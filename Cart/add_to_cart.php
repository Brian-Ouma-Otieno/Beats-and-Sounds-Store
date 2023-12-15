<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';


    if (isset($_POST['beat_name']) && isset($_POST['author']) && isset($_POST['price']) && isset($_POST['Bid'])) {
        $beat_id = $_POST['Bid'];
        // $beat_name = $_POST['beat_name'];
        // $author = $_POST['author'];
        // $beat_price = $_POST['price'];
        // $item = array();
        // $item[] = array(
        //     'Bid' => $beat_id,
        //     // 'beat_name' => $beat_name,
        //     // 'author' => $author,
        //     // 'Bprice' => $beat_price,
        //     // 'id' => $product_id,
        //     // 'id' => 2,
        //     // 'size' => $size,
        //     // 'size' => 32,
        //     // 'quantity' => $quantity,
        //     // 'quantity' => 2,
        // );
        // $_SESSION['success_flash'] = 'Added Successfully To Cart.';
        // $GLOBALS['items_json'] = json_encode($item);
       
        $beatSelectQ = mysqli_query($db_connect,"SELECT * FROM beats WHERE id = '$beat_id'");
        $beatSelectF = mysqli_fetch_assoc($beatSelectQ);        

        $items_json = json_encode($item);

        $sql_afro2 = "SELECT * FROM afro_beat WHERE id = $beat_id";
        $afro_query2 = mysqli_query($db_connect,$sql_afro2);
        $afro_fetch2 = mysqli_fetch_assoc($afro_query2);

        // insert data to cart table in database
        $reg_userCartid = $_SESSION['reg_user'];
        $checkdataQuery = mysqli_query($db_connect,"SELECT * FROM cart WHERE reg_userCartid = '$reg_userCartid'");
        $checkdataFetch = mysqli_fetch_assoc($checkdataQuery);
        // $checkdataFetchResults = $checkdataFetch['beats_and_samples'];
        // $previous_items = json_decode($checkdataFetchResults['beats_and_samples'],true);
        $previous_items = json_decode($checkdataFetch['beats_and_samples'],true);
        $new_items = array_merge($item,$previous_items);
        $items_json2 = json_encode($new_items);
        // if ($checkdataFetchResults != '') {
        //     // $reg_userCartid = $_SESSION['reg_user'];
        //     // $checkdataQuery = mysqli_query($db_connect,"SELECT * FROM cart WHERE reg_userCartid = '$reg_userCartid'");
        //     // $checkdataFetch = mysqli_fetch_assoc($checkdataQuery);
        //     // $checkdataFetchResults = $checkdataFetch['beats_and_samples'];

        //     // if (!empty($checkdataFetchResults)) {
        //     //     $previous_items = json_decode($checkdataFetchResults['beats_and_samples'],true);

        //     //     $new_items = array_merge($item,$previous_items);
        //     //     $items_json2 = json_encode($new_items);
        //         $cart_expire = date("Y-m-d H:i:s",time() + (5));
        //     //     // $BS_sql_update = mysqli_query($db_connect,"UPDATE cart SET items = '{$items_json2}', expire_date = '{$cart_expire}' WHERE id = '{$cart_id}'");
        //         // $BS_sql_update = mysqli_query($db_connect,"UPDATE cart SET beats_and_samples = ?, expire_date = ? WHERE reg_userCartid = ?;");
        //         $BS_sql_update = "UPDATE cart SET beats_and_samples = ?, expire_date = ? WHERE reg_userCartid = ?;";
        //         $stmt = mysqli_stmt_init($db_connect);
        //         if (!mysqli_stmt_prepare($stmt, $BS_sql_update)) {
        //             echo 'There was an error, please try again.';
        //         } else {

        //         mysqli_stmt_bind_param($stmt, "ssi", $items_json2, $cart_expire, $reg_userCartid);
        //         mysqli_stmt_execute($stmt);   
        //         // $cart_id = $db_connect->insert_id;
        //         // setcookie($cookie_name, $cart_id, time() + (5), "/");             
        //         }
                
        //     } else {
                // $cookie_name = "BSS";
                // $cookie_value = $ll['reg_userCartid'];
                // $cart_expire = date("Y-m-d H:i:s",strtotime("+10 sec"));
                $cart_expire = date("Y-m-d H:i:s",time() + (5));
                // $BS_sql_insert = "INSERT INTO cart (beats_and_samples, expire_date, reg_userCartid) VALUES(?, ?, ?);";
                $BS_sql_insert = "INSERT INTO cart (genre ,beat_name, author, image, price, audio, expire_date, reg_userCartid) VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($db_connect);
                if (!mysqli_stmt_prepare($stmt, $BS_sql_insert)) {
                    echo 'There was an error, please try again.';
                } else {

                mysqli_stmt_bind_param($stmt, "sssssssi", $beatSelectF['genre'], $beatSelectF['beat_name'], $beatSelectF['author'], $beatSelectF['image'], $beatSelectF['price'], $beatSelectF['audio'],
                $cart_expire, $reg_userCartid);
                mysqli_stmt_execute($stmt);   
                // $cart_id = $db_connect->insert_id;
                // setcookie($cookie_name, $cart_id, time() + (5), "/");             
                }
            // }
        // }
        // $k1= $beatSelectF['genre']; $k2= $beatSelectF['beat_name']; $k3= $beatSelectF['author']; 
        // $k4= $beatSelectF['image']; $k5= $beatSelectF['price']; $k6= $beatSelectF['audio'];
        // $i = "INSERT INTO cart (genre ,beat_name, author, image, price, audio, expire_date, reg_userCartid) VALUES( $k1, $k2, $k3, $k4, $k5, $k5, $cart_expire, $reg_userCartid)";
        // mysqli_query($db_connect,$i);
    }






?>