<?php
    include "process.php";
    $id_error=$name_error=$year_error=$Success = "";

        $id = $_GET["id"];
        $name = $_GET["name"];
        $year = $_GET["year"];
        if (check_id($id)==0){
            $Success = "ID must be Integer";
        }
        elseif (check_name($name) == 0){    
            $Success = "Name Length must be from 5 to 40 characters";
        }
        elseif (check_year($year) == 0){
            $Success = "Year must be from 1990 to 2015";
        }
        else {
            $id = (int)$id;
            $sql = "INSERT INTO cars(id, name, year) VALUES ($id, '$name', '$year')";
            if ($conn->query($sql) === TRUE) {
                $Success = "New Car created successfully";
            } 
            else {
                $Success = "Failed!!";
            }
        }
        $result = array("result"=>$Success);
        $resultJson = json_encode($result);
        echo $resultJson;
?>