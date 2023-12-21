<?php
include_once '../C/Register C.php';
$re = new Register();
$id = htmlspecialchars($_GET["id"]);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $register = $re->addCommunity($_POST, $_FILES , $id);
  }
    
if (isset($_POST['playerId']) && isset($_POST['action'])) {
  $communityId = $_POST['playerId'];
  $action = $_POST['action'];

  if ($action == 'delete') {
    $result = $re->deleteCommunity($communityId);
    echo $result ? "<p>Community with ID $communityId has been deleted.</p>" : "<p>Failed to delete player.</p>";
    header("Location: Showall.php");
    exit;
  } elseif ($action == 'edit') {
    $data = [
      'activity_name' => $_POST['playerName'],
      'community_id' => $_POST['teamId'],
      'Event_ID' => $_POST['eventId'],
      'description' => $_POST['age'],
      'date' => $_POST['goalsScored'],
    ];
    $result = $re->editCommunity($communityId, $data);
    echo $result ? "<p>Community with ID $communityId has been edited.</p>" : "<p>Failed to edit player.</p>";
    header("Location: Showall.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Form</title>
</head>

<body>
    <?php include_once '../component/navbar.php' ?>
    <div class="">
        <div class="container-form">
            <center>
                <h1>Create</h1>
            </center>
            <form name="create" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="activity_name">activity_name</label>
                    <input type="text" name="activity_name" placeholder="กิจกรรม" required>
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" name="description" placeholder="รายละเอียด" required>
                </div>
                <div class="form-group">
                    <label for="date">date</label>
                    <input type="date" name="date" placeholder="กิจกรรม" required>
                </div>
                <center>
                    <div class="form-group">
                        <button type="submit" class="bottonSubmit">Create</button>
                        &nbsp;&nbsp;
                        <button type="button" class="bottonDelete" onclick="cancelForm()">Cancel</button>
                    </div>
                </center>
            </form>
        </div>
    </div>
</body>

</html>

<script>
function validateForm() {
    // ทำการตรวจสอบข้อมูลที่นี่ (ถ้ามี)

    // กระทำเมื่อข้อมูลถูกต้อง
    Swal.fire({
        title: 'Success',
        text: 'Data has been created successfully.',
        icon: 'success',
    }).then((result) => {
        if (result.isConfirmed) {
            // กระทำเมื่อผู้ใช้กด OK หลังจากแสดง Success
            document.forms["create"].submit();
        }
    });

    // ไม่ทำการ submit form
    return false;
}


function cancelForm() {
    // แสดง SweetAlert แล้ว redirect หรือดำเนินการตามต้องการ
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you really want to cancel?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, cancel it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // ดำเนินการตามต้องการ เช่น redirect
            window.location.href = '../index.php';
        }
    });
}
</script>