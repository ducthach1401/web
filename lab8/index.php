<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ex 7</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".select").load("process/select.php");
            $("#idUpdate").load("process/updateid.php");
            $("#idDelete").load("process/updateid.php");
            $(".delete").click(function(event){
                event.preventDefault();
                $.ajax({
                    url:  "process/delete.php",
                    type: "get",
                    data:  $("#formdelete").serialize(),
                    success: function (data) {
                        $(".successdelete").html(data);
                        $(".select").load("process/select.php");
                        $("#idUpdate").load("process/updateid.php");
                        $("#idDelete").load("process/updateid.php");
                    }
                });
            });

            $(".add").click(function(event){
                event.preventDefault();
                $.ajax({
                    url:  "process/add.php",
                    type: "get",
                    data:  $("#formadd").serialize(),
                    success: function (data) {
                        $(".successadd").html(data);
                        $(".select").load("process/select.php");
                        $("#idUpdate").load("process/updateid.php");
                        $("#idDelete").load("process/updateid.php");
                    }
                });
            });

            $(".update").click(function(event){
                event.preventDefault();
                $.ajax({
                    url:  "process/update.php",
                    type: "get",
                    data:  $("#formupdate").serialize(),
                    success: function (data) {
                        $(".successupdate").html(data);
                        $(".select").load("process/select.php");
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>A. Select</h3>
                <table class="select"></table>
            </div>
            <div class="col">
                <h3>B. Add</h3>
                <form id="formadd">
                    <label for="id">ID: </label>
                    <input type="text" name="id" id="id"> <br>

                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name"> <br>

                    <label for="year">Year: </label>
                    <input type="text" name="year" id="year"> <br>

                    <button type="button" class="add btn btn-warning" name="add">Add</button> <br>
                    <span class="successadd"></span>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3>C. Update</h3>
                <form id="formupdate">
                    <label for="idUpdate">ID: </label>
                    <select name="idUpdate" id="idUpdate"> </select>
                    <br>
                    <label for="nameUpdate">Name: </label>
                    <input type="text" name="nameUpdate" id="nameUpdate"> <br>

                    <label for="yearUpdate">Year: </label>
                    <input type="text" name="yearUpdate" id="yearUpdate"> <br>

                    <button type="button" class="update btn btn-warning" name="update">Update</button> <br>
                    <span class="successupdate"></span>
                </form>
            </div>
            <div class="col">
                <h3>D. Delete</h3>
                <form id="formdelete">
                    <label for="idDelete">ID: </label>
                    <select name="idDelete" id="idDelete"> </select>
                    <br>
                    <button type="button" class="delete btn btn-warning" name="delete">Delete</button>
                    <br> 
                    <span class="successdelete"></span>
                </form>
            </div>
        </div>
    </div>
</body>