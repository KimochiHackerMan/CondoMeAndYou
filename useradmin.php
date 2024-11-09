<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: home_page.php");
    exit();
}
echo "Welcome to the Admin Page!";
?>
