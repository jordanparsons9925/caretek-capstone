<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$type = $_SESSION["userType"];
$testType = ($type == "PCA");
if (!$testType)
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