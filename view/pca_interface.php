<?php
session_start();
$type = $_SESSION["userType"];
if ($type != "PCA")
    header("Location: ../");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <p>PCA INTERFACE</p>
</body>
</html>