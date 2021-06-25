$(document).ready(function () {

    // Add new cookie
    $(".btn-add").click(function (event) {
        event.preventDefault();
        var cookieName = $("#cookie-name").val();
        var cookieValue = $("#cookie-value").val();
        if (cookieName == "" || cookieValue == "") {
            $(".cookie-error").toggleClass("d-none");
            setTimeout(() => {
                $(".cookie-error").toggleClass("d-none");
            }, 1500);
        } else {
            var cookieExist = getCookie(cookieName);
            if (!cookieExist) {
                document.cookie = cookieName + "=" + cookieValue + "; expires=Thu, 31 Dec 2025 12:00:00 UTC";
                $("#cookie-name").val('');
                $("#cookie-value").val('');
                $(".cookie-success").toggleClass("d-none");
                setTimeout(() => {
                    $(".cookie-success").toggleClass("d-none");
                }, 1500);
            } else {
                $(".cookie-exist").toggleClass("d-none");
                setTimeout(() => {
                    $(".cookie-exist").toggleClass("d-none");
                }, 1500);
            }
        }
    });

    // Display cookie
    $(".btn-display").click(displayCookie);

    // Edit cookie
    $(".btn-edit").click(function (event) {
        event.preventDefault();
        var cookieName = $("#cookie-name-edit").val();
        var cookieValue = $("#cookie-value-edit").val();
        if (cookieName == "" || cookieValue == "") {
            $(".cookie-edit-error").toggleClass("d-none");
            setTimeout(() => {
                $(".cookie-edit-error").toggleClass("d-none");
            }, 1500);
        } else {
            var cookieExist = getCookie(cookieName);
            if (cookieExist) {
                document.cookie = cookieName + "=" + cookieValue + "; expires=Thu, 31 Dec 2025 12:00:00 UTC";
                $("#cookie-name-edit").val('');
                $("#cookie-value-edit").val('');
                $(".cookie-edit-success").toggleClass("d-none");
                setTimeout(() => {
                    $(".cookie-edit-success").toggleClass("d-none");
                }, 1500);
            } else {
                $(".cookie-edit-not-exist").toggleClass("d-none");
                setTimeout(() => {
                    $(".cookie-edit-not-exist").toggleClass("d-none");
                }, 1500);
            }
        }
    });

    // Edit cookie
    $(".btn-delete").click(function (event) {
        event.preventDefault();
        var cookieName = $("#cookie-name-delete").val();
        if (cookieName == "") {
            $(".cookie-delete-error").toggleClass("d-none");
            setTimeout(() => {
                $(".cookie-delete-error").toggleClass("d-none");
            }, 1500);
        } else {
            var cookieExist = getCookie(cookieName);
            if (cookieExist) {
                document.cookie = cookieName + "=" + "; expires=1 Jan 1970 12:00:00 UTC";
                $("#cookie-name-delete").val('');
                $(".cookie-delete-success").toggleClass("d-none");
                setTimeout(() => {
                    $(".cookie-delete-success").toggleClass("d-none");
                }, 1500);
            } else {
                $(".cookie-delete-not-exist").toggleClass("d-none");
                setTimeout(() => {
                    $(".cookie-delete-not-exist").toggleClass("d-none");
                }, 1500);
            }
        }
    });
});

function getCookie(c_name) {
    var c_value = document.cookie,
        c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1) c_start = c_value.indexOf(c_name + "=");
    if (c_start == -1) {
        c_value = null;
    } else {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1) {
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start, c_end));
    }
    return c_value;
}

function displayCookie() {
    if (document.cookie)
            $(".cookies-info").text("> " + document.cookie); 
        else $(".cookies-info").text("> No cookies!");
}