<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex 3</title>
</head>
<body>
    <?php
        function use_for(){
            echo "Print odd from 1 to 100 using for <br>";
            for ($i = 0; $i <= 100; $i++){
                if ($i % 2 == 1){
                    echo $i ,"<br>";
                }
            }
        }
        function use_while(){
            echo "Print odd from 1 to 100 using while <br>";
            $i = 0;
            while ($i <= 100){
                if ($i % 2 == 1){
                    echo $i,"<br>";
                }
                $i++;
            }
        }
        use_for();
        use_while();
    ?>
</body>
</html>