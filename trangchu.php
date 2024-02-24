<?php
session_start();
include("db_connnection.php");
//ngăn không cho admin vào trang này
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
    <title>ChamSocMayTinh</title>
    <link rel="stylesheet" href="style.css">
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
            <?php
            if(!isset($_SESSION["user"])){
            ?>
                <a href="dangky.php"><button style="margin-right: 25px;"><h3>Đăng ký</h3></button></a>
                <a href="dangnhap.php"><button><h3>Đăng nhập</h3></button></a>
            <?php
            }else{
            ?>
                <a href="thongtinuser.php"><img src="user.png" style="width: 80px; height: 80px; border-radius: 50px;"> </a>          
            <?php
            }
            ?>
        </div>
        
        <div id="Banner">
            <h1>Chương trình quản lý dịch<br>vụ chăm sóc máy tính</h1>
        </div>
    </div>
    <div id="Content">
        <form id="Con">
            <div id="EMAIL"> 
                <div id="icon"><img src="logo_email.png" width="45px" height="45px" /></div>
                <div id="text">
                    <h2>Địa chỉ EMAIL</h1>
                    <p>cc@gmail.com</p>
                    <p>crazycompany@gmail.com</p>
                </div>
            </div>
            <div id="LOCATION">
                <div id="icon"><img src="icon_adress.png" width="45px" height="45px" /></div>
                <div>
                    <h2>Địa chỉ</h1>
                    <p>Vệ Hồ-Ba Đình-Hà Nội</p>
                    <p>Mỹ Đình-Nam Từ Liêm-Hà Nội</p>
                </div>
            </div>
            <div id="PHONE">
                <div id="icon"><img src="icon_dienthoai.jpg" width="45px" height="45px" /></div>
                <div>
                    <h2>Đường dây nóng</h1>
                    <p> 088-01869018907</p>
                    <p>(88) 908 675 43667</p>
                </div>
            </div>
            <div id="nhap">
                <div id="name"><input style="width: 400px;" type="text"  placeholder="Your Name : " /></div>
                <div id="mail"><input style="width: 400px; margin-left:30px ;" type="text"  placeholder="Your Mail : " /></div>
            </div>
            <div id="message"><textarea style="width: 830px; height: 200px; padding: 20px;"  placeholder="Your Message"></textarea></div>
            <button id="nuts"><h1>Gửi</h1></button>
        </form>
    </div>
    <div id="Footer">
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
    </div>
    <scrip>

    </scrip>
</body>
</html>