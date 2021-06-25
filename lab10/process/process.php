<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $db = "examples";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    function check_id($id){
        if (ctype_digit($id)){
            return 1;
        }
        return 0;
    }

    function check_name($name){
        $len = strlen($name);
        if (($len >=5) && ($len <= 40)){
            return 1;
        }
        return 0;
    }

    function check_year($year){
        if (!ctype_digit($year)){
            return 0;
        }
        $year = (int)$year;
        if (($year >=1990) && ($year <= 2015)){
            return 1;
        }
        return 0;
    }
?>