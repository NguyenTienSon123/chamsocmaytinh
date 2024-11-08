<?php
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h2{
            color: #F4A55D;
        }
        p{
            padding-bottom: 20px;
        }
        .bt{
            width: 100px;
            height: 40px;
            color: aliceblue;
            background-color: #F4A55D;
            border: 0px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h2 style="padding-bottom: 20px;">Xác nhận đăng xuất</h2>
    <form action="logout_process.php" method="post">
        <p>Bạn có chắc chắn muốn đăng xuất?</p>
        <input class="bt" type="submit" value="Đăng xuất">
    </form>

</body>
</html>