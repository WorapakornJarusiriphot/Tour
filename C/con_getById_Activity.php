<?php
    include_once 'Register.php';
    $re = new Register();
    $id = htmlspecialchars($_GET["id"]);
    if (isset($_GET['searchCommunity'])) {
    $searchCommunity = $_GET['searchCommunity'];
    $communityactivities = $re->searchCommunitysByName($searchCommunity);
    } else {
    $communityactivities = $re->getByIdCommunitys($id);
    }
?>