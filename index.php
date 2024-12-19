<?php

session_start();
if(isset($_SESSION["logged"])) {
    header("Location: ./public/views/dashboard.php");
} else {
    header("Location: ./public/views/login.php");
}
?>