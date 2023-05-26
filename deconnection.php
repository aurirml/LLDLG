<?php
session_start();
unset($_SESSION['con']);
header("Location: http://localhost/ProjetWD/index.php");
?>