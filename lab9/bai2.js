function display(){
    var cookies = document.cookie.split(";");
    var result = "";
    for (var i=0;i < cookies.length ;i++){
        result = result + (i + 1) + "." + cookies[i] + ";" + "<br>";
    }
    document.getElementById("displayCookies").innerHTML = result;
}

function addCookie(){
    var name = document.getElementById("addName").value;
    var value = document.getElementById("addValue").value;
    var cookie = name + "=" + value + ";";
    document.cookie=cookie;
    document.getElementById("resultAdd").innerHTML = "Add cookie success!!"
}

function create_cookies(){
    var day = document.getElementById("updateName");
    var cookies = document.cookie.split(";");
    var result = "";
    for (var i=0;i < cookies.length ;i++){
        var option = document.createElement("option");
        option.value = cookies[i].split("=")[0] + ";";
        option.innerText = cookies[i].split("=")[0];
        day.add(option);
    }
}

function update(){
    var name = document.getElementById("updateName").value;
    var value = document.getElementById("updateValue").value;
    var cookie = name + "=" + value + ";";
    document.cookie=cookie;
    document.getElementById("resultUpdate").innerHTML = "Update cookies success!!!";
}

function deleteCookie(){
    var cookie = document.getElementById("deleteName").value;
    document.cookie= cookie + "Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
    document.getElementById("resultDelete").innerHTML = "Delete cookies success!!!";
}

function create_cookies_delete(){
    var day = document.getElementById("deleteName");
    var cookies = document.cookie.split(";");
    var result = "";
    for (var i=0;i < cookies.length ;i++){
        var option = document.createElement("option");
        option.value = cookies[i] + ";";
        option.innerText = cookies[i].split("=")[0];
        day.add(option);
    }
}
