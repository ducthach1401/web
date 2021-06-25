<?php
    include "process.php";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Year</th>
        </tr>";
    $sql = "SELECT * FROM cars";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>$row[id]</td>";
            echo "<td>$row[name]</td>";
            echo "<td>$row[year]</td>";
            echo "</tr>";
        }
    }
?>