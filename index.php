<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TEST GET USER</title>
    <script src="model/user_db.js"></script>
</head>

<body>
    <p id="testText">TEST</p>
    <script>
        async function main() {
            var user = await getUserType("HammoAnnea", "uqwe3aj3he");
            document.getElementById("testText").innerText = user;
        }
        main();
    </script>
</body>
</html>