<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>TouristNPRU</title>
</head>

<body>
    <?php 
        include_once './component/navbar.php'
    ?>
    <div class="header">
    </div>
    <div class="container-list">
        <div class="left">
            <p class="text">TouristNPRU</p>
        </div>
    </div>
    <div class="bdCSS">
        <div class="row">
            <?php 
                include_once './C/con_get_city.php'
            ?>
        </div>
    </div>
</body>

</html>