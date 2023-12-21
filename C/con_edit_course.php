<?php
  include_once "../M/ConDB.php";
  include_once "../M/Tourist.php";

  $activity_id = $_POST['activity_id'];
  $activity_name = $_POST['activity_name'];
  $description = $_POST['description'];
  $date = $_POST['date'];

  $obj_name = new Tourist();
  $rs2 = $obj_name->editTouristeditTourist($activity_id, $activity_name, $description, $date);

  header('Location: ../index.php?updated=true');
  exit;
?>
