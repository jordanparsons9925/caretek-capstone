<?php
session_start();
$type = $_SESSION["userType"];
switch($type) {
    case "Client":
        include("client_interface.php");
        break;
    case "PCA":
        include("pca_interface.php");
        break;
    case "Manager":
        include("manager_interface.php");
        break;
    default:
        header("Location: ../");
}
?>