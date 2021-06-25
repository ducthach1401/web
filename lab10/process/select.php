<?php
    include "process.php";
    $sql = "SELECT * FROM cars";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($data, array($row["id"],$row["name"],$row["year"]));
        }
    }
    echo json_encode(array("result"=>$data));
?>