<?php
@sessinon_start();
header("Content-type: text/html; charset=utf-8");
if (!$_SESSION['usuario']) {
    header('Location: view/index.php');
    exit();
}
?>