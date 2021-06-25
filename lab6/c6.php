<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="c6.css">
</head>
<body>
<?php        
        if (isset($_POST["submit"])){
            $fistname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $day = $_POST["day"];
            $month = $_POST["month"];
            $year = $_POST["year"];
            $gender = $_POST["gender"];
            $country = $_POST["country"];
            $about = $_POST["about"];
            $complete = $fistnameerr = $lastnameerr = $emailerr = $abouterr = $passworderr = "";
            $check = 0;
            if (check_length($fistname)==0){
                $fistnameerr = "Between 2 and 30 characters";
                $check = 1;
            }

            if (check_length($lastname)==0){
                $lastnameerr = "Between 2 and 30 characters";
                $check = 1;
            }

            if (check_area($about)==0){
                $abouterr = "Less than 10000 characters";
                $check = 1;
            }

            if (check_length($password)==0){
                $passworderr = "Between 2 and 30 characters";
                $check = 1;
            }
            if (check_mail($email)==0){
                $emailerr = "Wrong format";
                $check = 1;
            }

            if ($check == 0){
                $fistname = $lastname = $email = $password = $about = "";
                $complete = "Complete!";
            }
        }
        

        function check_length($str){
            $temp = strlen($str);
            if (($temp >=2) &&($temp <=30)){
                return 1;
            }
            else {
                return 0;
            }
        }

        function check_area($str){
            $temp = strlen($str);
            if ($temp <= 10000){
                return 1;
            }
            else {
                return 0;
            }
        }

        function check_mail($str){
            if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $str)){
                return 1;
            }
            else {
                return 0;
            }
        }
    ?>

    <div class="border border-dark border-4 khung">
        <h1 class="title">Register Form</h1>
        <form method="post">
            <div class="form-format container">
                <div class="row">
                    <div class="col">
                        <label for="firstname">First Name</label>
                    </div>
                    <div class="col">
                        <input type="text" name="firstname" id = "firstname" value="<?php echo $fistname ?>">
                        <span class="error"> <?php echo $fistnameerr ?> </span>
                    </div>
                </div>  
                <div class="row">
                    <div class="col">
                        <label for="lastname">Last Name</label>
                    </div>
                    <div class="col">
                        <input type="text" name="lastname" id = "lastname" value="<?php echo $lastname ?>"> 
                        <span class="error"> <?php echo $lastnameerr ?> </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="email">Email</label>
                    </div>
                    <div class="col">
                        <input type="text" name="email" id = "email" value="<?php echo $email ?>"> 
                        <span class="error"> <?php echo $emailerr ?> </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="password">Password</label>
                    </div>
                    <div class="col">
                        <input type="password" name="password" id = "password" value="<?php echo $password ?>">
                        <span class="error"> <?php echo $passworderr ?> </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="birthday">Birthday</label>
                    </div>
                    <div class="col-8">
                        <select name="day" id="Day">
                            <option value="Day">Day</option>
                            <?php
                                for ($i =1; $i <=31;$i++){
                                    echo "<option value=",$i,">$i</option>";
                                }
                            ?>
                        </select>
                        <select name="month" id="Month">
                            <option value="Month">Month</option>
                            <?php
                                for ($i =1; $i <=12;$i++){
                                    echo "<option value=",$i,">$i</option>";
                                }
                            ?>
                        </select>
                        <select name="year" id="Year">
                            <option value="Year">Year</option>
                            <?php
                                for ($i = 2021; $i >=1990;$i--){
                                    echo "<option value=",$i,">$i</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="gender">Gender</label>
                </div>
                <div class="row">
                    <div class="col radio">
                        <input type="radio" name="gender" id ="male" value="male" checked="true">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id ="female" value="female">
                        <label for="female">Female</label>
                        <input type="radio" name="gender" id ="other" value="other">
                        <label for="other">Other</label> 
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="country">Country</label>
                    </div>
                    <div class="col">
                        <select name="country" id="country">
                            <option value="vietname">VietNam</option>
                            <option value="australia">Australia</option>
                            <option value="us">United States</option>
                            <option value="india">India</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="about">About</label> <br>
                    </div>
                    <div class="col">
                        <textarea name="about" id="about" cols="37" rows="5"></textarea> 
                        <span class="error"> <?php echo $abouterr ?> </span>
                        <br>
                    </div>
                </div>
                <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-warning"> 
                <input type="submit" id="reset" name="reset" value="Reset" class="btn btn-warning">
                <span class="error"> <?php echo $complete ?> </span>
            </div>
        </form>
    </div>


</body>
</html>