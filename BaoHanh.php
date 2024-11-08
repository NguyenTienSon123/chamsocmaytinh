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
    <title>Chính Sách Và Bảo Hành</title>
    <link rel="stylesheet" href="BaoHanh.css">
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
    </div>

    <div id="Policy">
        <div>
            <h1>QUY ĐỊNH BẢO HÀNH</h1>
            <h2>I. Điều kiện bảo hành</h2>
            <div>
                <p>- Thiết bị có đầy đủ và nguyên tem bảo hành của Chamsoclaptop.vn và của Nhà Phân Phối, các thiết bị được cấp phiếu bảo hành, phải xuất trình Phiếu bảo hành. 
                    Tem hoặc phiếu bảo hành còn trong thời gian bảo hành sẽ được bảo hành theo quy định của cửa hàng và nhà sản xuất.
                </p>
                <p>- Những hư hỏng của thiết bị được xác định do lỗi kỹ thuật hoặc lỗi từ nhà sản xuất.</p>
                <p>- Tem bảo hành, mã vạch số serial, emei của sản phẩm phải còn nguyên vẹn, không có dấu hiệu cạo sửa, tẩy xóa, bị rách, mờ…</p>
                <p>- Đối với màn hình có từ 05 điểm chết trở lên.</p>
            </div>

            <h2>II. Không bảo hành trong các trường hợp sau</h2>
            <div>
                <p>- Trên thiết bị,  mã vạch, chỉ số dung lượng, tem bảo hành, số serial number bị rách, mờ hay có dấu hiệu chấp vá, cạo sửa…</p>
                <p>- Thiết bị bị biến dạng, trầy xước, bể, mẻ, cong, xì tụ, cháy nổ… dùng nguồn điện không ổn định (HDD bị nứt, bể cổng cắm cable, 
                    rách barcode ,CPU bị mẻ, nứt chíp, rỉ chân, vô nước, mainboard cong, gãy chân socket…, lỗi phát sinh do quá trình sử dụng).
                </p>
                <p>- Thiết bị có dấu hiệu hư hại do dung dịch, ẩm ướt, bụi bặm, từ trường cao, bị oxy hóa, hoặc do côn trùng, 
                    chuột bọ phá hoại, hoặc hư hỏng do thiên tai, hỏa hoạn , vận chuyển không đúng qui cách.
                </p>
                <p>- Dữ liệu có chứa trong thiết bị lưu trữ của khách hàng khi bảo hành thiết bị.</p>
                <p>- Các thiết bị không có tem bảo hành của crazy Company hoặc còn tem bảo hành của Crazy Company
                    nhưng không có tem bảo hành của Nhà Phân Phối cũng không đảm bảo điều kiện được nhận bảo hành.
                </p>
            </div>

            <h2>III. Phương thức bảo hành</h2>
            <div>
                <p>- Thời gian giải quyết bảo hành từ 3 - 7 ngày làm việc kể từ ngày nhận (trừ Chủ Nhật và Lễ Tết) 
                    và tùy theo tình trạng hư hỏng của sản phẩm có thể giải quyết sớm hoặc chậm hơn.
                </p>
                <p>- Đối với thiết bị tem còn bảo hành nhưng nằm trong Trường hợp II - Không được bảo hành, tùy từng trường hợp chúng tôi chỉ tạm nhận hỗ trợ để gửi về Nhà Phân Phối, 
                    trong quá trình hỗ trợ nếu sản phẩm của quý khách bị từ chối bảo hành, chúng tôi sẽ hoàn trả sản phẩm lại cho quý khách và không chịu trách nhiệm về thắc mắc của quý khách hàng. 
                    Nếu trong quá trính hỗ trợ, Nhà Phân Phối có các chính sách nhận lại sản phẩm và trả tiền hoặc đổi lại dòng sản phẩm tương tự, 
                    chúng tôi có trách nhiệm thông báo lại cho quý khách để thương lượng phướng án giải quyết tốt nhất vì quyền lợi khách hàng.
                </p>
                <p>- Trong trường hợp sản phẩm gửi bảo hành không còn lưu hành thì chúng tôi giải quyết bằng những cách sau:
                    <li>Sẽ đổi cho khách sản phẩm có cấu hình tương đương (không nhất thiết sản phẩm này còn mới 100%).</li>
                    <li>Đổi sản phẩm khác có tính năng cao cấp hơn nếu khách hàng đồng ý trả thêm phần chênh lệch theo giá hiện tại. 
                        Riêng đối với sản phẩm chính hãng - chúng tôi sẽ thực hiện đúng theo qui định bảo hành của hãng.
                    </li>
                    <li>Đối với những sản phẩm nhà cung cấp hiện không còn hàng để trả, nhà cung cấp sẽ áp dụng chính sách trả tiền có khấu trừ thời gian sử dụng.</li>
                    <li>Thời hạn bảo hành ghi trên tem vẫn tiếp tục duy trì theo tem cũ.</li>
                </p>
            </div>

            <h2>IV. Quy định đổi mới sản phẩm</h2>
            <div>
                <p>-  Quý khách sử dụng sản phẩm mua tại crazy Company trong 07 ngày đầu tiên, nếu bị lỗi kỷ thuật hoặc lỗi do Nhà sản xuất sẽ được đổi mới với điều kiện: 
                    <li>Sản phẩm không rơi vào Trường hợp II - Các trường hợp không được bảo hành.</li>
                    <li>Sản phẩm còn trong tình trạng như mới (hàng phải còn đầy đủ hộp và đúng số serial sản phẩm, các phụ kiện đi kèm và phiếu xuất hàng).</li>
                </p>
                <p>- Chúng tôi không áp dụng hình thức ĐỔI MỚI đối với các thiết bị như: các thiết bị có tính chất hao mòn…, hoặc sản phẩm bị mất bao bì hoặc bị trầy xước, rách, bẩn.</p>
            </div>

            <h2>V. Quy định với một số sản phẩm cụ thể</h2>
            <div>
                <h3>1. Ổ cứng HDD, SSD, Box di động…</h3>
                <div>
                    <p>- Ổ cứng HDD, SSD, Box di động… phải còn đầy đủ tem của Crazy Company và Nhà Phân Phối.</p>
                    <p>- Sản phẩm còn trong thời hạn bảo hành.</p>
                    <p>- Sản phẩm không trầy quá nhiều, không móp, không gãy chân cắm cable, không xước board, không có dấu hiệu hư tổn do dung dịch, quá tải nhiệt, do sửa chữa, cháy nổ…</p>
                    <p>- Sản phẩm phải còn nguyên imei, serial… và không bảo hành đối với phụ kiện đi kèm sản phẩm.</p>
                    <p>- Chúng tôi không chịu trách nhiệm đối với dữ liệu được lưu trong Sản Phẩm của quý khách.</p>
                    <p>- Sản phẩm Ổ cứng HDD, SSD, Box di động… mua tại Crazy Company trong 01 tháng đầu tiên, nếu bị lỗi kỷ thuật hoặc lỗi do Nhà sản xuất sẽ được đổi mới với điều kiện thỏa mãn các quy định trong mục IV. 
                        Qui định đổi mới Sản Phẩm.
                    </p>
                </div>

                <h3>2. Mainboard, Card VGA…</h3>
                <div>
                    <p>- Mainboard, Card VGA… phải còn đầy đủ tem của Crazy Company và Nhà Phân Phối.</p>
                    <p>- Sản phẩm còn trong thời hạn bảo hành.</p>
                    <p>- Sản phẩm không hư hại Socket, không rơi vỡ, không phồng tụ, không xì tụ, không có dấu hiệu đã qua sửa chữa, không hư hại bởi tác động của dung dịch, quá tải nhiệt, 
                        bụi bặm, từ trường cao, bị oxy hóa, hoặc do côn trùng, chuột bọ phá hoại, hoặc hư hỏng do thiên tai, hỏa hoạn , vận chuyển không đúng qui cách…
                    </p>
                    <p>- Sản phẩm không cong vênh, sứt mẻ, trầy xước…</p>
                    <p>- Sản phẩm Mainboard Jeway được bảo hành dựa theo Quy định về bảo hành Sản phẩm của Jeway.</p>
                    <p>- Sản phẩm Mainboard, Card VGA… mua tại Crazy Company trong 01 tháng đầu tiên, nếu bị lỗi kỷ thuật hoặc lỗi do Nhà sản xuất sẽ được đổi mới với điều kiện thỏa mãn các quy định trong mục IV. 
                        Qui định đổi mới Sản Phẩm.
                    </p>
                </div>

                <h3>3. RAM, CPU…</h3>
                <div>
                    <p>- RAM, CPU… phải còn đầy đủ tem của Crazy Company và Nhà Phân Phối.</p>
                    <p>- Sản phẩm còn trong thời hạn bảo hành.</p>
                    <p>- Sản phẩm không mẻ góc, không rơi vỡ, không trầy xước, không mất tụ, không phồng tụ, không xì tụ, không có dấu hiệu đã qua sửa chữa, không hư hại bởi tác động của dung dịch, quá tải nhiệt, bụi bặm, từ trường cao, 
                        bị oxy hóa, hoặc do côn trùng, chuột bọ phá hoại, hoặc hư hỏng do thiên tai, hỏa hoạn , vận chuyển không đúng qui cách…
                    </p>
                    <p>- Sản phẩm RAM, CPU… mua tại Crazy Company trong 07 ngày đầu tiên, nếu bị lỗi kỷ thuật hoặc lỗi do Nhà sản xuất sẽ được đổi mới với điều kiện thỏa mãn các quy định trong mục IV. 
                        Qui định đổi mới Sản Phẩm.
                    </p>
                </div>
            </div>

            <h2>VI. Quy định trả bảo hành</h2>
            <div>
                <p>- Khách hàng khi gửi bảo hành tại cửa hàng vui lòng lấy phiếu nhận bảo hành và giữ gìn phiếu bảo hành cẩn thận.</p>
                <p>- Chúng tôi không có trách nhiệm giải quyết việc trả bảo hành cho quý khách trong các trường hợp mất phiếu bảo hành, phiếu bảo hành hư hại nặng, 
                    không có con dấu và chữ kí của nhân viên nhận bảo hành… hoặc các trường hợp tương tự.
                </p>
                <p>- Chúng tôi không có trách nhiệm giải quyết việc trả bảo hành cho quý khách trong trường hợp phiếu bảo hành của quý khách đã quá hạn ghi trên phiếu.</p>
            </div>
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