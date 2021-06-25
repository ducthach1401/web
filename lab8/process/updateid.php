<?php
    include "process.php";
    $sql = "SELECT * FROM cars";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value=$row[id]>$row[id]</option>";
        }
    }
?>