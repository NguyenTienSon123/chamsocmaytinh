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
    <title>Dịch vụ | ChamSocMayTinh</title>
    <link rel="stylesheet" href="service.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        #SecondContent{
            background-image: linear-gradient(rgb(0, 0, 0, 0.6), rgb(0, 0, 0, 0.6)), url("bgdichvu.jpg");
            background-repeat: no-repeat;
            backdrop-filter: blur(5px); /* Độ mờ của nền */
            background-size: 100% 100%;
        }

        table {
            border-collapse: collapse;
            width: 70%;
        }

        table, th, td {
            width: 100%;
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
        #content h2{
            color: #F4A55D;
            padding-bottom: 20px;
        }
        /* .Button1{
            background-color: blue;
            color: white;
            width: 300px;
            height: 40px;
        }
        .Button2{
            background-color: red;
            color: white;
            width: 400px;
            height: 50px;
        } */
    </style>
    <script>
     function showAlert() {
        alert('Bạn chưa đăng nhập, hãy đăng nhập để sử dụng dịch vụ');
     }
   </script>
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
        
        <div id="Banner">
            <h1>Dịch vụ<br></h1>
        </div>
    </div>
    <div id="Content">
        <form id="Con">
            <div id="content">
                <h2>Danh sách dịch vụ của chúng tôi</h2>
                <?php
                $sql = "SELECT * FROM dichvu";
        
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>Dich vụ</th><th>Giá</th></tr>";
    
                    //biến row lưu một mảng lưu trữ dữ liệu 1 bản ghi, 
                    //dùng while để in ra các thông tin lấy được từ row
                    while ($row = $result->fetch_assoc()) {
    
                        echo "<tr>";
                        echo "<td>" . $row["dichvu"] . "</td>";
                        echo "<td>" . $row["gia"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Không tìm thấy đơn nào.";
                }
                ?>
            </div>
        </form>
    </div>

    <div id="SecondContent">
        <div id="SCon">
            <div id="buttonContent">
                <div>
                    <button class="Button1">
                        <img class="img2" src="phone.png" width="20px" height="20px">
                        <b>GỌI NGAY ĐỂ ĐƯỢC TƯ VẤN</b>                    
                    </button>
                </div>
            </div>

            <div>
                <div>
                    <?php
                    if(!isset($_SESSION["user"])){
                    ?>
                    <!-- chua dang nhap(chua co sesstion) -->
                    <button class="Button2" onclick="showAlert()"><b>$ &nbsp; CLICK VÀO ĐÂY ĐỂ SỬ DỤNG DỊCH VỤ</b></button>
                    <?php
                    }else{
                    ?>
                    <a href="dangkysudungdichvu.php"><button class="Button2"><b>$ &nbsp; CLICK VÀO ĐÂY ĐỂ SỬ DỤNG DỊCH VỤ</b></button></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
        
    </div>

    

    <div id="Footer" style="font-family: 'Courier New', Courier, monospace;">
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