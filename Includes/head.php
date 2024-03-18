<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beats and Sounds Store</title>
    <link rel="stylesheet" href="/Beats and sounds store/css/main.css">
    <link rel="stylesheet" href="/Beats and sounds store/fontawesome-free-6.1.1-web\css\all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="/Beats and sounds store/Jquery/jquery-3.6.0.min (1).js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
    <script src="https://unpkg.com/wavesurfer.js@7"></script>
    <style>
        /* packs section */
        .samp-packs-container{
           display: flex;
           padding: 15px;
        }
        .samp-pack-details{
            border: 5px solid #2196F3;
            width: 30%; 
            height: 100%;
            padding: 20px;
        } 

        .samp-pack{
            height: 100%;
        }

        .samp-pack-pic{
            height: 70%;
        }

        .samp-pack-x{
            height: 30%;
        }

        .samp-pack-x:hover{
            background-color: #DCDCDC;
        }

        .samp-pack-p{
            text-align: center;
            line-height: 20px;
        }

        .samp-pack-btn button{
            padding: 15px;
            border: none;   
            cursor: pointer;
            color: rgb(255, 255, 255);
            background-color: #FF6347;
            font-size: medium;
            opacity: 0.6;
        }

        .samp-pack-btn button:hover{
            opacity: 1;
        }

        .samp-packs-container iframe{
            height:100%;
            width:70%; 
            border: 5px solid #FF6347;
            margin-left: 10px;
        }

        .packs{
            padding: 40px;
        }
        
    </style>

</head>
<body>