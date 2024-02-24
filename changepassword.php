<?php

    include "db_connnection.php";
    // Kiểm tra đăng nhập, nếu chưa đăng nhập thì chuyển hướng đến trang đăng nhập
    if (!isset($_SESSION['user'])) {
        header('Location: dangnhap.php');
        exit;
    }
    // Xử lý đổi mật khẩu ở đây
    $kq="";
    if(isset($_POST["change"])){
        if($_POST["current_password"]==""){
            $kq = "Bạn chưa nhập mật khẩu!";
        }else{
            $user = $_SESSION['user'];
            $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '$user'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                //biến lưu trữ các phần tử trong mảng row (chỉ cần dùng matkhau)
                $pass = $row["matkhau"];
            }
            if($_POST["current_password"]==$pass){
                if($_POST["new_password"]||$_POST["confirm_password"]){
                    if($_POST["new_password"]==$_POST["confirm_password"]){
                        $newpass = $_POST["new_password"];
                        $sql2 = "UPDATE taikhoan SET matkhau = '$newpass' WHERE tendangnhap = '$user'";
                        $result = mysqli_query($conn, $sql2);
                        if($result){
                            $kq = "Đổi thành công";
                        }
                    }else{
                        $kq = "Nhập lại mật khẩu sai!";
                    }
                }else{
                    $kq = "Hãy nhập mật khẩu mới!";
                }
            }else{
                $kq = "Mật khẩu sai !";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            background-color:azure;
            padding: 40px;
            width: 300px;
            border-radius: 5px;
            color: #F4A55D;
        }
        .nhap{
            width: 290px;
            height: 30px;
            border: 1px solid #F4A55D;
            border-radius: 3px;
        }
        .button{
            background-color: #F4A55D;
            border: 0px;
            border-radius: 3px;
            color: azure;
            width: 100px;
            height: 30px;
        }
        .nut{
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>
<body>
    <form method="post">
        <h2>Đổi mật khẩu</h2><br>
        <label for="current-password">Mật khẩu hiện tại:</label>
        <input class="nhap" type="password" id="current-password" name="current_password"><br>

        <label for="new-password">Mật khẩu mới:</label>
        <input class="nhap" type="password" id="new-password" name="new_password"><br>

        <label for="confirm-password">Xác nhận mật khẩu mới:</label>
        <input class="nhap" type="password" id="confirm-password" name="confirm_password"><br>

        <input class="button" type="submit" value="Đổi mật khẩu" name="change"><br>
        <p>
            <?php
            if(isset($_POST["change"])){
                echo $kq;
            }
            ?>
        </p>
    </form>
</body>
</html>



