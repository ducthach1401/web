function check_string(str) {
    if ((str.length >=2) && (str.length <= 30)) {
        return 1;
    }
    return 0;
}

function check_email(str){
    var re = /\S+@\S+\.\S+/;
    return re.test(str);
}

function check_area(str){
    if (str.length<=10000){
        return 1;
    }
    return 0;
}

function click_submit() {
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var gender = document.getElementsByName("gender");
    var day = document.getElementById("Day").value;
    var month = document.getElementById("Month").value;
    var year = document.getElementById("Year").value;
    if (check_string(firstname) == 0){
        alert("Fisrt name must be more than 2 characters and less than 30 characters");
    }
    else if (check_string(lastname) == 0){
        alert("Last name must be more than 2 characters and less than 30 characters");
    }
    else if (check_email(email)==0){
        alert("Email must be <sth>@<sth>.<sth>");
    }
    else if (check_string(password) == 0){
        alert("Password must be more than 2 characters and less than 30 characters");
    }
    else if (day === 'Day'){
        alert("Please choose day");
    }
    else if (month === 'Month'){
        alert("Please choose month");
    }
    else if (year === 'Year'){
        alert("Please choose year");
    }
    else {
        alert("Complete!");
        click_reset();
    }
}
function create_day(){
    var day = document.getElementById("Day");
    for (var i = 1; i <=31;i++){
        var option = document.createElement("option");
        option.value = i;
        option.innerText = i;
        day.add(option);
    }
}

function create_month(){
    var day = document.getElementById("Month");
    for (var i = 1; i <=12;i++){
        var option = document.createElement("option");
        option.value = i;
        option.innerText = i;
        day.add(option);    
    }
}

function create_year(){
    var day = document.getElementById("Year");
    for (var i = 2021; i >=1900;i--){
        var option = document.createElement("option");
        option.value = i;
        option.innerText = i;
        day.add(option);
    }
}

function click_reset() {
    document.getElementById("firstname").value = "";
    document.getElementById("lastname").value = "";
    document.getElementById("email").value = "";
    document.getElementById("password").value = "";
    document.getElementById("male").checked = true;
    document.getElementById("female").checked = false;
    document.getElementById("other").checked = false;
    document.getElementById("country").selectedIndex = 0;
    document.getElementById("Day").selectedIndex = 0;
    document.getElementById("Month").selectedIndex = 0;
    document.getElementById("Year").selectedIndex = 0;
    document.getElementById("about").value = "";
}