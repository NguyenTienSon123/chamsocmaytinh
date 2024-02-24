<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu | ChamSocMayTinh</title>
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
            <h1>Giới thiệu<br></h1>
        </div>
    </div>
    <div id="Content">
        <div class=Content_gt>
            <div style="margin-right: 60px;">
                <h2>GIỚI THIỆU VỀ CHÚNG TÔI</h2>
                <h1>Chào mừng đến với Crazy <br>Company</h1>
                <h4 style="width: 450px;">
                    Công ty Crazy là một công ty quản lý hệ thống chăm sóc máy tính 
                    nổi tiếng. Với hơn 50 năm vận hành tích lũy kinh nghiệm trong ngành
                    phần cứng máy tính của những người đứng đầu cùng với các thành viên 
                    đã tạo nên sự nổi tiếng, uy tín, chất lượng được mọi người tin tưởng 
                    sử dụng dịch vụ chăm sóc của chúng tôi.
                </h4>
            </div>
            <div>
                <img src="team.webp" width="700px" height="400px">
            </div>
        </div>
        <div class=Content_gt>
            <div style="margin-right: 60px;">
                <img src="quytrinhsuachua.jpg" width="700px" height="400px">
            </div>
            <div>
                <h1>Quy trình sửa chữa <br>chuyên nghiệp</h1>
                <h4 style="width: 450px;">
                    Tất cả quá trình TIẾP NHẬN – TEST MÁY – 
                    XÁC NHẬN LINH KIỆN – SỬA CHỮA – GIAO MÁY 
                    được tiến hành trước mặt dưới sự giám sát 
                    của quý khách.
                </h4>
            </div>
        </div>
        <div class="GT">
            <div class="GT_bo" style="margin-bottom: 60px;">
                <div class="GT_con">
                    <h2>Nhân viên tiếp nhận</h2>
                    <p>Bộ phận tiếp nhận và ghi nhận thông tin từ khách hàng.</p>
                </div>
                <div class="GT_con">
                    <h2>Kỹ thuật kiểm tra</h2>
                    <p>Bộ phận kỹ thuật kiểm tra lỗi đưa ra giải pháp và báo giá cho khách hàng.</p>
                </div>
                <div class="GT_con">
                    <h2>Xác nhận linh kiện</h2>
                    <p>Hướng dẫn khách hàng ký tên lên linh kiện xác nhận linh kiện của máy tính .</p>
                </div>
            </div>
            
            <div class="GT_bo">
                <div class="GT_con">
                    <h2>Tiến hành sửa chữa</h2>
                    <p>Sửa lấy ngay, hoặc lập giấy hẹn cho khách hàng kèm thời gian sửa chữa, thời gian bảo hành.</p>
                </div>
                <div class="GT_con">
                    <h2>Kiểm tra lần cuối</h2>
                    <p>Cho máy chạy thử. Bộ phận kỹ thuật kiểm tra máy lần cuối trước khi giao.</p>
                </div>
                <div class="GT_con">
                    <h2>Bàn giao - Hậu mãi</h2>
                    <p>Xác nhận lỗi đã được khắc phục. Hướng dẫn khách hàng kiểm tra lại linh kiện. Thanh toán, dán tem bảo hành, nhận thẻ bảo hành.</p>
                </div>
            </div>
        </div>
        <div class=Content_gt>
            <div style="margin-right: 60px;">
                <h1>Lịch sử hình thành</h1>
                <h4 style="width: 450px;">
                    Tiền thân là một nhóm 3 sinh viên năm 3 của EAUT. 
                    CC được thành lập năm 2023, ban đầu, nhóm 
                    hoạt động dưới hình thức cài win dạo, 
                    thế nhưng chỉ mới đó thôi lượng khách hàng đã rất 
                    lớn khiến hộ điên đầu đặt tên Crary Company.
                    Với mục đích mang đến cho mọi người máy tính khỏe mạnh
                    để phục vụ học tập, làm việc, giải trí với trải nhiệm very good,
                     chúng tôi quyết định mở rộng công ty làm về mảng sửa máy tính.
                    Sau thời gian dài từ đó đến nay công ty đã có khoảng 
                    thời gian khó khăn thế nhưng vì mục tiêu của mình 
                    chúng tôi vẫn tiếp tục để đạt được những thành công như hiện tại
                </h4>
            </div>
            <div>
                <img src="hoinhom.jpg" width="700px" height="400px">
            </div>
        </div>
        <div class="management">
            <div>
                <img src="son.jpg" width="250px" height="auto">
                <h3>Producer</h3>
                <h2>Nguyễn Tiến Sơn</h2>
                <p>50 năm kinh nghiện trong nghề</p>
            </div>
            <div>
                <img src="dat.jpg" width="250px" height="auto">
                <h3>Master</h3>
                <h2>Ngô Quốc Đạt</h2>
                <p>50 năm kinh nghiệm trong nghề</p>
            </div>
            <div>
                <img src="nhung.jpg" width="255px" height="auto">
                <h3>Master</h3>
                <h2>Tô Thị Tuyết Nhung</h2>
                <p>50 năm kinh nghiệm trong nghề</p>
            </div>
        </div>
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
    
</body>
</html>