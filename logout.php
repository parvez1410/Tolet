<?php
session_start();
unset($_SESSION['client']);
session_destroy();
header('Location: index.php');
?>

