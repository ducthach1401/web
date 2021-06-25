<?php
    include "process.php";
    $id_error=$name_error=$year_error=$Success = "";

        $id = $_GET["id"];
        $name = $_GET["name"];
        $year = $_GET["year"];
        if (check_id($id)==0){
            $id_error = "ID must be Integer";
        }
        elseif (check_name($name) == 0){    
            $name_error = "Name Length must be from 5 to 40 characters";
        }
        elseif (check_year($year) == 0){
            $year_error = "Year must be from 1990 to 2015";
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
        echo "<p class='error'>$id_error</p>";
        echo "<p class='error'>$name_error</p>";
        echo "<p class='error'>$year_error</p>";
        echo "<p class='success' id='check1'>$Success</p>";
?>