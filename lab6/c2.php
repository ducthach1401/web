<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex2</title>
</head>
<body>
    <?php
        function output($number){
            $n = $number % 5;
            switch ($n){
                case 0:
                    echo "Hello <br>";
                    break;
                case 1:
                    echo "How are you? <br>";
                    break;
                case 2:
                    echo "I'm doing well, thank you <br>";
                    break;
                case 3:
                    echo "See you later <br>";
                    break;
                case 4:
                    echo "Good-bye <br>";
                    break;
            }
        }

        output(0);
        output(1);
        output(2);
        output(3);
        output(4);
    ?>
</body>
</html>