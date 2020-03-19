function getUserType(username, password) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            return xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", "user_db.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send("username=" + username + "&password=" + password);

    /*fetch("user_db.php", {
        method: "POST", 
        body: JSON.stringify(data)
    }).then(res => {
        return res;
    });*/
}