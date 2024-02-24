<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
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
    <div id="Header">
        <div id="Logo">
            <a href="trangchu.php"><img style="padding: 30px;" src="logo_tron.png" width="80px" height="80px"/></a>
            <a href="trangchu.php"><h1>CRAZY COMPANY</h1></a>
        </div>
        <div id="Menu">
            <ul class="ul-menu">
                <li id="list-menu" class="dropdown "><a href="trangchu.php">Trang Chủ</a></li>
                <li id="list-menu" class="dropdown "><a href="gioithieu.php">Giới Thiệu</a></li>
                <li id="list-menu" class="dropdown ">
                    <a class="dropbtn" href="">Dịch Vụ</a>
                    <div class="dropdown-content">
                        <a href="TabThayBanPhim.php">Thay Bàn Phím</a>
                        <a href="TabThayManHinh.php">Thay Màn Hình</a>
                        <a href="TabThayOCung.php">Thay Ổ Cứng</a>
                        <a href="TabThayPin.php">Thay Pin</a>
                        <a href="TabThayCPU.php">Thay CPU</a>
                        <a href="TabThayRam.php">Thay RAM</a>
                        <a href="TabThayTouchPad.php">Thay Touchpad</a>
                    </div>
                </li>
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
    <!-- <div id="Footer">
        <div id="ThongTin">
            <div id="MoTa">
                <div id="FLogo">
                    <img src="Logo.png" width="30px" height="30px"/>
                    <h1 style="color: #F4A55D;">CRAZY COMPANY</h1>
                </div>
                <div id="text">
                    <p>Hầu hết những mối đe dọa mà ta phải đối mặt <br>
                        đến từ sự tiến bộ trong khoa học và công nghệ. <br>
                        Chúng ta sẽ không ngừng bước tiến bộ lại, <br>
                        hay đảo ngược sự tiến bộ, vậy nên ta phải <br>
                        nhận ra mối nguy hiểm và khống chế chúng.<br>
                        Tôi là người lạc quan, và tôi tin chúng ta <br>
                        có thể.<br>
                        – Stephen Hawking –
                    </p>
                </div>
            </div>

            <div id="LienLac">
                <div><h1>Liên Hệ</h1></div>
                <div>
                    <p><b>Địa Chỉ:</b>Vệ Hồ - Ba Đình - Hà Nội</p>
                    <p><b>Email:</b> cc@gmail.com</p>
                    <p><b>Điện thoại:</b> +7464 0187 3535 645</p>
                    <p><b>FAX:</b> +9 659459 49594</p>
                </div>
            </div>
            <div id="OPENING">
                <h1>Mở Cửa</h1>
                <div id="lich">
                    <div id="Thu">
                        <p>Thứ Hai</p>
                        <p>Thứ Ba</p>
                        <p>Thứ Tư</p>
                        <p>Thứ Năm</p>
                        <p>Thứ Sáu</p>
                        <p>Thứ Bảy</p>
                        <p>Chủ Nhật</p>
                    </div>
                    <div id="Gio">
                        <p>9:00 - 18:00</p>
                        <p>10:00 - 18:00</p>
                        <p>11:00 - 18:00</p>
                        <p>12:00 - 18:00</p>
                        <p>14:00 - 18:00</p>
                        <p>16:00 - 18:00</p>
                        <p>closed</p>
                    </div>
                </div>
            </div>
            <div id="TheoDoi">
                <h1>Follow Us</h1><br>
                <div id="TheoDoiimg">
                    <a href="https://www.facebook.com/tuyetnhung.tothi.1"><img src="facebook_logo.png" width="30px" height="30px"/></a>
                    <a href="https://www.instagram.com/"><img src="istagram_logo.png" width="30px" height="30px" /></a>
                    <a href="https://www.youtube.com/"><img src="youtube_logo.png" width="30px" height="30px" /></a>
                    <a href="https://twitter.com/?lang=vi"><img src="twister_logo.png" width="30px" height="30px" /></a>
                    <a href="https://www.pinterest.com/"><img src="pinterrest_logo.png" width="30px" height="30px" /></a>
                </div>
            </div>
        </div>
        <hr>
        <p style="position: absolute; left: 50%; transform: translate(-50%, 27%);">Copyright@ 2023 Desing by <b style="color: #F4A55D;">Crazy Company</b></p>
    </div> -->
</body>
</html>
