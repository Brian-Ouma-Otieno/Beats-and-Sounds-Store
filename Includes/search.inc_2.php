<?php

    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';




    $kk = $_POST['input'];

    if ($kk != "") {
        $search2 = mysqli_real_escape_string($db_connect,$_POST['input']);
        $searchSql2 ="SELECT * FROM samples WHERE genre LIKE '%$search2%'";
        $searchSqlquery2 = mysqli_query($db_connect,$searchSql2);
        $searchResultsRow2 = mysqli_num_rows($searchSqlquery2);

        if ($searchResultsRow2 > 0) {
            while ($searchFetch2 = mysqli_fetch_assoc($searchSqlquery2)) {
                // echo $searchFetch2['genre'].'<br>';
                echo "<a href='/Beats and sounds store/includes/samples_packs.php'> <?=" . $searchFetch2['genre'] . "; ?> </a>".'<br>';
                // var_dump($searchFetch2['genre']);
            }
        } else {
            echo "No results Found";
        }
        

    } else {
        header("Location: /Beats and sounds store/");
    }


?>