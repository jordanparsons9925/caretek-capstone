<?php
session_start();
$type = $_SESSION["userType"];
if ($type != "Client")
    header("Location: ../");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <p>CLIENT INTERFACE</p>
</body>
</html>