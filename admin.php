<?php
session_start();
include("db_connnection.php");
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}else{
    $user = $_SESSION["user"];
    $sql = "SELECT level FROM taikhoan WHERE tendangnhap = '$user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row[0]==0){
        echo '<script type="text/javascript">
        window.onload = function () { alert("Bạn không thể truy cập trang này!");}
        </script>';
        header("location:trangchu.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="thongtinuser.css">
    <title>Cá nhân</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        #sidebar {
            background-color:#ddd;
            padding: 40px;
            box-sizing: border-box;
        }
        #content {
            flex: 1;
            padding: 47px;
            box-sizing: border-box;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #3067e7;
            color: white;
        }

        form {
            display: inline;
        }
        ul{
            list-style: none;
            /* color: #ddd; */
        }
        
        ul a{
            text-decoration: none;
            color:black;

        }
        #botent{
            display: flex;
            height: 100vh;
        }
        #sidebar li{
            padding: 7px
        }
        #sidebar li:hover{
            background-color: #F4A55D;
        }
        #conten h2{
            color: #F4A55D;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
 
                    
    <div id="botent">
        <div id="sidebar">
            <ul>
                <div id="Logo">
                    <a href="trangchu.php"><img style="padding-right: 20px;" src="logo_tron.png" width="60px" height="60px"/></a>
                    <a href="trangchu.php"><h2 style="padding-top: 10px; color:#F4A55D;">CRAZY <br>COMPANY</h2></a>
                </div>
                <li>
                    <a href="?page=dsnguoidung">
                    <img style="width:20px; height:20px; padding-right:5px"
                    src="iconnguoidung.webp">
                    Quản lý người dùng</a>
                </li>
                <li>
                    <a href="?page=dsdondat">
                    <img style="width:20px; height:20px;padding-right:5px"
                    src="donhang.png">
                    Quản lý đơn đặt</a>
                </li>
                <li>
                    <a href="?page=">
                    <img style="width:20px; height:20px; padding-right:5px"
                    src="dichvu.png">
                    Quản lý dịch vụ</a>
                </li>
                <li>
                    <a href="?page=logout">
                    <img style="width:20px; height:20px; padding-right:5px"
                    src="icondangxuat.png">
                    Đăng xuất</a>
                </li>
            </ul>
        </div>

        <div id="content">
            <?php
            // Xử lý nội dung tương ứng với lựa chọn từ menu
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                switch ($page) {
                    case 'dsnguoidung':
                        include('dsnguoidung.php');
                        break;
                    case 'dsdondat':
                        include('dsdondat.php');
                        break;
                    case 'logout':
                        include('logout.php');
                        break;
                    default:
                        echo 'Chưa có bản cập nhật cho trang này.';
                }
            } 
            ?>
        </div>
    </div>
</body>
</html>
