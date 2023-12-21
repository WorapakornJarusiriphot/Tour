<?php
    include_once './C/Register.php';
    $re = new Register();
    $id = htmlspecialchars($_GET["id"]);
    $rs2 = $re->deleteCommunity($id) 
?>