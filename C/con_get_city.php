<?php
include_once './M/ConDB1.php';

$obj_name = new ConDB();
$rs = $obj_name->getAllTour();
$jsonCode = $rs;
$jsonDeCode = json_decode($jsonCode, true);

foreach ($jsonDeCode as $rs2) {
    echo '<div class="column">
            <div class="card">
                <img src="https://th.bing.com/th/id/R.e9198f5c93674c8fe9b561d5a33bc3b2?rik=bFqmHW%2foo2YqCg&pid=ImgRaw&r=0&sres=1&sresct=1" alt="Avatar">
                <p>' . $rs2['community_name'] . '</p>
                <p>' . $rs2['description'] . '</p>
                <p>' . $rs2['location'] . '</p>
                <center>
                    <div>
                        <a href="Homepage.php?id=' . $rs2['community_id'] . '"><button type="button" class="bottonSubmit">Info</button></a>
                    </div>
                </center>
                <br>
            </div>
        </div>';
}
?>
