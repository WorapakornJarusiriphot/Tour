<?php 
  include_once("../M/ConDB.php");
  include_once("../M/Tourist.php");
?>
<?php
  $activity_id = htmlspecialchars($_GET["activity_id"]);
  
  $obj_name = new Tourist();
  $rs2 = $obj_name->getTouristDetail($activity_id)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Form</title>
</head>
<body>
    <?php include_once '../component/navbar.php' ?>
    <div class="">
        <div class="container-form">
            <center>
                <h1>Update</h1>
            </center>
            <form name="update" method = "post" action="../C/con_edit_course.php" enctype="multipart/form-data">
            <input name="activity_id" type="hidden" id="ID" value="<?php echo $rs2['activity_id'];?>">
            <div class="form-group">
                    <label for="activity_name">activity_name</label>
                    <input type="text" name="activity_name" placeholder="กิจกรรม" required id="activity_name" value="<?php echo $rs2['activity_name'];?>">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" name="description" placeholder="รายละเอียด" required id="description" value="<?php echo $rs2['description'];?>">
                </div>
                <div class="form-group">
                    <label for="date">date</label>
                    <input type="date" name="date" placeholder="กิจกรรม" required id="date" value="<?php echo $rs2['date'];?>">
                </div>
                <center>
                    <div class="form-group">
                        <button type="submit" class="bottonSubmit">Update</button>
                        &nbsp;&nbsp;
                        <button type="button" class="bottonDelete" onclick="cancelForm()">Cancel</button>
                    </div>
                </center>
            </form>
        </div>
    </div>
</body>
</html>

<!-- กิจกรรม
รายละเอียด
วันที่ -->
