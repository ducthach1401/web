<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ex 7</title>
</head>
<body>
    <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "mk14012000";
        $db = "examples";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    ?>
        <?php
            $id_error=$name_error=$year_error=$Success = "";
            function check_id($id){
                if (ctype_digit($id)){
                    return 1;
                }
                return 0;
            }
            function check_name($name){
                $len = strlen($name);
                if (($len >=5) && ($len <= 40)){
                    return 1;
                }
                return 0;
            }
            function check_year($year){
                if (!ctype_digit($year)){
                    return 0;
                }
                $year = (int)$year;
                if (($year >=1990) && ($year <= 2015)){
                    return 1;
                }
                return 0;
            }
            if (isset($_GET["submit1"])){
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
            }
        ?>
    
    <?php
        if (isset($_GET["submit2"])){
            $nameupdate = $_GET["nameUpdate"];
            $idupdate = $_GET["idUpdate"];
            $yearupdate = $_GET["yearUpdate"];
            $yearU_error = $nameU_error = "";
            $successUpdate = "";
            $temp = 0;
            if (!empty($nameupdate)){
                if (check_name($nameupdate)==0){
                    $nameU_error = "Name Length must be from 5 to 40 characters";
                }
                else {
                    $sql = "UPDATE cars SET name='$nameupdate' WHERE id=$idupdate";
                    $conn->query($sql);
                    if ($conn->query($sql) === TRUE) {
                        $temp ++;
                    }
                }
            }
            if (!empty($yearupdate)){
                if (check_year($yearupdate)==0){
                    $yearU_error = "Year must be from 1990 to 2015";
                }
                else {
                    $sql = "UPDATE cars SET year='$yearupdate' WHERE id=$idupdate";
                    $conn->query($sql);
                    if ($conn->query($sql) === TRUE) {
                        $temp ++;
                    }
                }
            }
            if ($temp>0){
                if (empty($yearU_error) && empty($nameU_error)){
                    $successUpdate = "Update Complete!!!";
                }
                elseif (empty($yearU_error)){
                    $successUpdate = "Update Year Complete!!";
                }
                elseif (empty($nameU_error)){
                    $successUpdate = "Update Name Complete!!!";
                }
            }
        }
    ?>
    
    <?php
        $deleteSuccess = "";
        if (isset($_GET["delete"])){
            $id_delete =(int) $_GET["idDelete"];
            $sql = "DELETE FROM cars WHERE id=$id_delete";
            if ($conn->query($sql)===TRUE){
                $deleteSuccess = "Delete complete";
            }
            else {
                $deleteSuccess = "Failed!!";
            }
        }
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>A. Select</h3>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Year</th>
                    </tr>
                    <?php
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
                </table>
            </div>
            <div class="col">
                <h3>B. Add</h3>
                <form method="get">
                    <label for="id">ID: </label>
                    <input type="text" name="id" id="id">
                    <span class="error"><?php echo $id_error ?></span> <br>

                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name">
                    <span class="error"><?php echo $name_error ?></span> <br>

                    <label for="year">Year: </label>
                    <input type="text" name="year" id="year">
                    <span class="error"><?php echo $year_error ?></span><br>

                    <button type="submit" class="btn btn-warning" value="submit1" name="submit1">Add</button> <br>
                    <span class="success"><?php echo $Success?></span>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>C. Update</h3>
                <form method="get">
                    <label for="idUpdate">ID: </label>
                    <select name="idUpdate" id="idUpdate">
                        <?php
                            $sql = "SELECT * FROM cars";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value=$row[id]>$row[id]</option>";
                                }
                            }
                        ?>
                    </select>
                    <br>
                    <label for="nameUpdate">Name: </label>
                    <input type="text" name="nameUpdate" id="nameUpdate">
                    <span class="error"><?php echo $nameU_error ?></span> <br>

                    <label for="yearUpdate">Year: </label>
                    <input type="text" name="yearUpdate" id="yearUpdate">
                    <span class="error"><?php echo $yearU_error ?></span><br>

                    <button type="submit" class="btn btn-warning" name="submit2" value="submit2">Update</button> <br>
                    <span class="success"><?php echo $successUpdate?></span>
                </form>
            </div>
            <div class="col">
                <h3>D. Delete</h3>
                <form method="get">
                    <label for="idDelete">ID: </label>
                    <select name="idDelete" id="idDelete">
                        <?php
                            $sql = "SELECT * FROM cars";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value=$row[id]>$row[id]</option>";
                                }
                            }
                        ?>
                    </select>
                    <br>
                    <button type="submit" name="delete" class="btn btn-warning" value="delete" id="delete">Delete</button>
                    <br> 
                    <span class="success"> 
                        <?php  
                            echo $deleteSuccess;
                            $conn->close();
                        ?>
                    </span>
                </form>
            </div>
        </div>
    </div>
</body>
</html>