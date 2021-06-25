<?php
    include "process.php";
    $nameupdate = $_GET["nameUpdate"];
    $idupdate = $_GET["idUpdate"];
    $yearupdate = $_GET["yearUpdate"];
    $yearU_error = $nameU_error = "";
    $successUpdate = "";
    $temp = 0;
    if (!empty($nameupdate)){
        if (check_name($nameupdate)==0){
            $nameU_error = "Name Length must be from 5 to 40 characters";
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
            $yearU_error = "Year must be from 1990 to 2015";
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
            $successUpdate = "Update Complete!!!";
        }
        elseif (empty($yearU_error)){
            $successUpdate = "Update Year Complete!!";
        }
        elseif (empty($nameU_error)){
            $successUpdate = "Update Name Complete!!!";
        }
    }
    echo "<p class='error'> $nameU_error</p>";
    echo "<p class='error'> $yearU_error</p>";
    echo "<p class='success' id='check2'>$successUpdate</p>";
?>