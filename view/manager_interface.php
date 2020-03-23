<?php
session_start();
$type = $_SESSION["userType"];
if ($type != "Nurse Manager")
    header("Location: ../");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <p>NURSE MANAGER INTERFACE</p>
</body>
</html>