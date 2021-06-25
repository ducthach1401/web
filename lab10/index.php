<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ex 10</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function updateID(data){
            data = data["id"];
            upID = document.getElementById("idUpdate");
            delID = document.getElementById("idDelete");
            while (upID.lastElementChild) {
               upID.removeChild(upID.lastElementChild);
            }

            while (delID.lastElementChild) {
                delID.removeChild(delID.lastElementChild);
            } 

            for (var i=0;i < data.length; i++){
                tab = document.createElement("option");
                tab.value = data[i];
                tab.innerHTML = data[i];
                delID.add(tab);

                tab = document.createElement("option");
                tab.value = data[i];
                tab.innerHTML = data[i];
                upID.add(tab);
            }
        }

        function updateTable(data){
            data = data["result"];
            table = document.getElementById("select1");
            while (table.lastElementChild){
                table.removeChild(table.lastElementChild);
            }
            tr = document.createElement("tr");
            th = document.createElement("th");
            context = document.createTextNode("ID");
            th.appendChild(context)
            tr.appendChild(th);

            th = document.createElement("th");
            context = document.createTextNode("Name");
            th.appendChild(context)
            tr.appendChild(th);

            th = document.createElement("th");
            context = document.createTextNode("Year");
            th.appendChild(context)
            tr.appendChild(th);

            table.appendChild(tr);

            for (var i = 0; i< data.length;i++){
                tr = document.createElement("tr");
                td = document.createElement("td")
                context = document.createTextNode(data[i][0]);
                td.appendChild(context);
                tr.appendChild(td);

                td = document.createElement("td")
                context = document.createTextNode(data[i][1]);
                td.appendChild(context);
                tr.appendChild(td);

                td = document.createElement("td")
                context = document.createTextNode(data[i][2]);
                td.appendChild(context);
                tr.appendChild(td);
                table.appendChild(tr);
            }
        }
        $(document).ready(function(){
            $.getJSON("process/select.php", updateTable);
            $.getJSON("process/updateid.php", updateID);
            $(".delete").click(function(event){
                event.preventDefault();
                $.ajax({
                    url:  "process/delete.php",
                    type: "get",
                    data:  $("#formdelete").serialize(),
                    success: function (data) {
                        var json = JSON.parse(data);
                        $(".successdelete").html(json["result"]);
                        $.getJSON("process/select.php", updateTable);
                        $.getJSON("process/updateid.php", updateID);
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
                        var json = JSON.parse(data);
                        $(".successadd").html(json["result"]);
                        $.getJSON("process/select.php", updateTable);
                        $.getJSON("process/updateid.php", updateID);
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
                        var json = JSON.parse(data);
                        $(".successupdate").html(json["result"]);
                        $.getJSON("process/select.php", updateTable);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div id = "test"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>A. Select</h3>
                <table class="select" id="select1">
 
                </table>
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