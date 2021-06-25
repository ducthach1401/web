<?php
    include "process.php";
    $nameupdate = $_GET["nameUpdate"];
    $idupdate = $_GET["idUpdate"];
    $yearupdate = $_GET["yearUpdate"];
    $result  = $yearU_error = $nameU_error = "";
    $temp = 0;
    if (!empty($nameupdate)){
        if (check_name($nameupdate)==0){
            $result = "Name Length must be from 5 to 40 characters";
            $nameU_error = "1";
        }
        else {
            $sql = "UPDATE cars SET name='$nameupdate' WHERE id=$idupdate";
            $conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                $temp ++;
            }
        }
    }
    if (!empty($yearupdate)){
        if (check_year($yearupdate)==0){
            $result = "Year must be from 1990 to 2015";
            $yearU_error = "1";
        }
        else {
            $sql = "UPDATE cars SET year='$yearupdate' WHERE id=$idupdate";
            $conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                $temp ++;
            }
        }
    }
    if ($temp>0){
        if (empty($yearU_error) && empty($nameU_error)){
            $result = "Update Complete!!!";
        }
        elseif (empty($yearU_error)){
            $result = "Update Year Complete!!";
        }
        elseif (empty($nameU_error)){
            $result = "Update Name Complete!!!";
        }
    }
    $result = array("result"=>$result);
    echo json_encode($result);
?>