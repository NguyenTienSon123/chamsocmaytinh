<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
if(isset($_SESSION["level"])){
    if($_SESSION["level"]){
        header("location:admin.php");
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
            height: 100%;

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
    <div id="Header">
        <div id="Logo">
            <a href="trangchu.php"><img style="padding: 30px;" src="logo_tron.png" width="80px" height="80px"/></a>
            <a href="trangchu.php"><h1>CRAZY COMPANY</h1></a>
        </div>
        <div id="Menu">
            <ul class="ul-menu">
                <li id="list-menu" class="dropdown "><a href="trangchu.php">Trang Chủ</a></li>
                <li id="list-menu" class="dropdown "><a href="gioithieu.php">Giới Thiệu</a></li>
                <li id="list-menu" class="dropdown "><a class="dropbtn" href="dichvu.php">Dịch Vụ</a></li>
                <li id="list-menu" class="dropdown "></liid><a href="BaoHanh.php">Bảo Hành</a></li>
            </ul>
        </div>
        <div id=TimKiem>
            <a href="thongtinuser.php"><img src="user.png" style="width: 80px; height: 80px; border-radius: 50px;"> </a>
        </div>
    </div>
    <div id="botent">
        <div id="sidebar">
            <ul>
                    <h1><img src="iconnguoidung.webp" height="30px" width="30px">
                    Cá nhân</h1>
                <li>
                    <a href="?page=account">
                    <img style="width:20px; height:20px; padding-right:5px"
                    src="iconnguoidung.webp">
                    Thông tin của bạn</a>
                </li>
                <li>
                    <a href="?page=orders">
                    <img style="width:20px; height:20px;padding-right:5px"
                    src="donhang.png">
                    Đơn hàng của bạn</a>
                </li>
                <li>
                    <img style="width:20px; height:20px; padding-right:5px"
                    src="ngoisao.png">
                    Đánh giá
                </li>
                <li>
                    <a href="?page=changepassword">
                        <img style="width:20px; height:20px; padding-right:5px"
                        src="khoa.png">
                        Đổi mật khẩu</a>
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
                    case 'account':
                        include('account.php');
                        break;
                    case 'orders':
                        include('orders.php');
                        break;
                    case 'changepassword':
                        include('changepassword.php');
                        break;
                    case 'logout':
                        include('logout.php');
                        break;
                    default:
                        echo 'Chọn một mục từ menu.';
                }
            } 
            ?>
        </div>
    </div>
    
</body>
</html>
