<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 4</title>
    <style>
        table {
            margin: auto;
            border-collapse: collapse;
            border-spacing: 1px;
        }
        td {
            font-size: large;
            border: 1px solid black;
            background-color: yellow;
            width: 40px;
            height: 40px;
            text-align: center;
            margin: 0px;
        }
    </style>
</head>
<body>
    <?php
        echo "<table>";
        for ($i = 1; $i <= 7; $i++){
            echo "<tr>";
            for ($j = 1; $j <= 7; $j++) { 
                echo "<td>",$i * $j,"</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>