<?php
    include_once './C/con_getById_Activity.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>TouristNPRU</title>
    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <?php 
        include_once './component/navbar.php'
    ?>
    <div class="header"></div>
    <div class="container-list">
        <div class="left">
            <p class="text">Activity</p>
        </div>
        <div class="right">
            <a href="./V/create.php?id=<?=$id?>"><button type="button" class="createButton">Create</button></a>
        </div>
    </div>
    <div class="bdCSS">
        <div class="row">
            <?php foreach ($communityactivities as $community) { ?>
                <div class="column">
                    <div class="card">
                        <img src="https://th.bing.com/th/id/R.e9198f5c93674c8fe9b561d5a33bc3b2?rik=bFqmHW%2foo2YqCg&pid=ImgRaw&r=0&sres=1&sresct=1" alt="Avatar">
                        <p><?=$community['activity_name'];?></p>
                        <p><?=$community['description'];?></p>
                        <p><?=$community['date'];?></p>
                        <center>
                            <div>
                                <!-- ใช้ SweetAlert ร่วมกับ JavaScript function deleteActivity() -->
                                <button type="button" class="bottonEdit" onclick="editActivity(<?=$community['activity_id']?>)">Edit</button>
                                <button type="button" class="bottonDelete" onclick="deleteActivity(<?=$community['activity_id']?>)">Delete</button>
                            </div>
                        </center>
                        <br>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        function editActivity(activityId) {
            // Redirect ไปที่หน้า update.php พร้อมกับ parameter activity_id
            window.location.href = `V/update.php?activity_id=${activityId}`;
        }

        function deleteActivity(activityId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `success.php?id=${activityId}`;
                    window.location.href = `index.php`;
                }
            });
        }
    </script>
</body>
</html>
