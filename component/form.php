<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" id="name" placeholder="กิจกรรม" required>
    </div>
    <div class="form-group">
        <label for="detail">detail</label>
        <input type="text" name="detail" id="detail" placeholder="รายละเอียด" required>
    </div>
    <div class="form-group">
        <label for="date">date</label>
        <input type="date" name="date" id="date" placeholder="กิจกรรม" required>
    </div>
    <div class="form-group">
        <label for="select">Community</label>
        <select name="select" id="select" required>
            <option value="" disabled selected>Select</option>
            <option value="2">ชุมชนทดสอบ1</option>
            <option value="3">ชุมชนทดสอบ2</option>
            <option value="4">ชุมชนทดสอบ3</option>
        </select>
    </div>
    <center>
        <div class="form-group">
            <button type="submit" class="bottonSubmit">Create</button>
            &nbsp;&nbsp;
            <button type="submit" class="bottonDelete">Cancel</button>
        </div>
    </center>
</body>
</html>

<!-- กิจกรรม
รายละเอียด
วันที่ -->
