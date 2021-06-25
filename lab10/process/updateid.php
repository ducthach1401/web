<?php
    include "process.php";
    $sql = "SELECT * FROM cars";
    $result = $conn->query($sql);
    $json = array();
    $count = 0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($json, $row["id"]);
            $count++;
        }
    }
    echo json_encode(array("id"=>$json));
?>