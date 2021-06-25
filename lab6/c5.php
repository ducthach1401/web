<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 5</title>
    <style>
        .mid{
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="mid">
        <h1>Calculator</h1>
        <form method="post">
            <label for="operation">Input</label>
            <input type="text" name="operation">
            <input type="submit" name = "submit" value="Submit">
        </form>
    </div>
    <?php
        $operation = $_POST["operation"];
        $sign = "";
        $a = 0;
        $b = 0;
        $count = 0;
        for ($i = 0; $i < strlen($operation); $i++){
            if ($operation[$i] == "+"){
                $sign = $operation[$i];
                $count ++;
            }
            elseif ($operation[$i] == "-"){
                $sign = $operation[$i];
                $count ++;
            }
            elseif ($operation[$i] == "*"){
                $sign = $operation[$i];
                $count ++;
            }
            elseif ($operation[$i] == "/"){
                $sign = $operation[$i];
                $count ++;
            }
            elseif ($operation[$i] == "^"){
                $sign = $operation[$i];
                $count ++;
            }
            elseif ($operation[$i] == "~"){
                $sign = $operation[$i];
            }
            elseif (($count == 1) && ((int)$operation[$i])){
                $b = $b*10 + $operation[$i];
            }
            elseif  (($count == 0) && ((int)$operation[$i])){
                $a = $a*10 + $operation[$i];
            }
            else {
                echo "Error";
                exit;
            }
        }
        $result = 0; 
        if (($sign == "+") && ($count == 1)){
            $result = $a + $b;
            echo "Result: $result";
        }
        elseif (($sign == "-") && ($count == 1)){
            $result = $a - $b;
            echo "Result: $result";
        }
        elseif (($sign == "*") && ($count == 1)){
            $result = $a * $b;
            echo "Result: $result";
        }
        elseif (($sign == "/") && ($count == 1)){
            $result = $a / $b;
            echo "Result: $result";
        }
        elseif (($sign == "^") && ($count == 1)){
            $result = 1;
            for ($i = 1; $i <= $b; $i++){
                $result = $result * $a;
            }
            echo "Result: $result";
        }
        elseif (($sign == "~") && ($count == 0)){
            $result = strrev($a);
            echo "Result: $result";
        }
    ?>
</body>
</html>