<?php
session_start();
//kiểm tra xem đã đăng nhập chưa nếu rồi thì ép chuyển đến trangchu.php
if(isset($_SESSION["user"])){
    header("location:trangchu.php");
}
include("db_connnection.php");

//các biến lưu lại kết quả đăng ký, lỗi khi nhập thiếu hoăc không nhập
$id="";
$kq="";
$name= "";
$sdt= "";
$city= "";
$user= "";
$pass= "";
$pass2= "";

//bắt đầu xủ lý khi click vào nút submit
if(isset($_POST["submit"])){
    //kiểm tra xem các inputs đã được nhập chưa
    //nếu chưa nhập thì gán biến lỗi bằng chuỗi cảnh báo
    //nhập rồi thì lưu vào biến khác để dùng sau và set lại biến lỗi bằng rỗng
    if(!$_POST["name"]){
        $nameer = "Bạn chưa nhập họ tên";
    }else{
        $nameer="";
        $name = trim($_POST["name"]);
    }
    if(!$_POST["sdt"]){
        $sdter = "Bạn chưa nhập số điện thoại";
    }else{
        $sdter= "";
        $sdt = trim($_POST["sdt"]);
    }
    if(!$_POST["city"]){
        $cityer = "Hãy chọn thành phố bạn sống";
    }else{
        $cityer = "";
        $city = $_POST["city"];
    }

    if(!$_POST["user"]){
        $userer = "Bạn hãy nhập vào tên đăng nhập";
    }else{
        //kiểm tra xem tên đăng nhập có chứa dấu cách không
        $userer = "";
        $user = trim($_POST["user"]);
        if (strpos($user, ' ') !== false) {
            $userer = "Tên đăng không được chứa dấu cách.";
        } else {
            //kiểm tra xem tên đăng nhập này đã có chưa
            $sql2 = "SELECT tendangnhap FROM taikhoan
            WHERE tendangnhap = '$user'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_array($result2);
            if($row2 != null){
                $userer = "Tên đăng nhập đã tồi tại";
            }
        }
    }

    
    if(!$_POST["pass"]){
        $passer="Bạn hãy nhập mật khẩu";
    }else{
        //kiểm tra mật khẩu có chứa dấu cách không
        $passer = "";
        $pass = $_POST["pass"];
        if (strpos($pass, ' ') !== false) {
            $passer = "Mật khẩu không được chứa dấu cách.";
        }
    }
    if(!$_POST["pass2"]){
        $pass2er= "Bạn chưa nhập lại mật khẩu";
    }else{
        $passer = "";
        $pass2 = $_POST["pass2"];
        //kiểm tra nhập lại mật khẩu đúng chưa
        if($pass2!= $pass){
            $pass2er = "Nhập lại mật khẩu sai";
        }else{
            $pass2er = "";
        }
    }


    //khi tất cả các dữ liệu đã hợp lệ thì các biến lỗi vẫn là rỗng
    //khi không còn lỗi mối bắt đầu thêm dữ liệu đăng kí
    if($nameer== "" && $sdter == "" &&$cityer == "" &&$userer=="" && $passer== "" && $pass2er==""){
        $sql = "INSERT INTO taikhoan (taikhoanid, hoten, sdt, thanhpho, tendangnhap, matkhau, level)
        VALUES('$id','$name', '$sdt', '$city', '$user', '$pass' , '0')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $kq="Đăng ký thành công! Đăng nhập ngay.";
        }else{
            $kq="Đăng ký Thất bại";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        body{
            background-image: linear-gradient(rgb(0, 0, 0, 0.6), rgb(0, 0, 0, 0.6)),url("background.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 100vw;
            height: 100vh;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #F4A55D;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #dk{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color:azure;
            padding: 40px;
            width: 600px;
            border-radius: 5px;
          
        }
        #nguc{
            display: flex;
        }
        #nguc .nhap{
            width: 290px;
            height: 30px;
            border: 1px solid #F4A55D;
            border-radius: 3px;
        }
        #nguc p{
            color: red;
        }
        #bung{
            display: flex;
            flex-direction: column;
            justify-content:center;
            align-items: center;
        }
        button, .button{
            background-color: #F4A55D;
            border: 0px;
            border-radius: 3px;
            color: azure;
            width: 100px;
            height: 30px;
        }
    </style>
</head>
<body>
    <div id="dk">
        <form method="post">
            <div id="dau">
                <h1 style="margin:0px; margin-left:10px;">Đăng ký</h1>
            </div>
            <hr>
            <div id="nguc">
                <div>
                    <label>Họ tên</label><br>
                    <input type="text" name="name" class="nhap"
                    value="<?php
                    //các input có valué này để khi submit dù 
                    //thành công hay thất bại thì dữ liệu không bị reset về rỗng
                        if(isset($_POST["submit"])){
                            echo "".$name."";
                        }
                        ?>"
                    >
                    <br>
                    <!-- thẻ p in ra lỗi -->
                    <p>
                        <?php
                        if(isset($_POST["submit"])){
                            if($nameer){
                                echo "".$nameer."";
                            }
                        }
                        ?>
                    </p>
                    <label>Số điện thoại</label><br>
                    <input type="text" name="sdt" class="nhap"
                    value="<?php
                        if(isset($_POST["submit"])){
                            echo "".$sdt."";
                        }
                        ?>"
                    ><br>
                    <p>
                        <?php
                        if(isset($_POST["submit"])){
                            if($sdter){
                                echo "".$sdter."";
                            }
                        }
                        ?>
                    </p>
                    <label>Thành phố</label><br>
                    <select type="text" name="city" class="nhap" 
                    value="<?php
                        if(isset($_POST["submit"])){
                            echo "".$city."";
                        }
                        ?>">
                        <option></option>
                        <option>Hà Nội</option>
                        <option>TP Hồ Chí Minh</option>
                        <option>An Giang</option>
                        <option>Bà rịa Vũng Tàu</option>
                        <option>Bạc Liêu</option>
                        <option>Bắc Giang</option>
                        <option>Bắc Kạn</option>
                        <option>Bắc Ninh</option>
                        <option>Bến Tre</option>
                        <option>Bình Dương</option>
                        <option>Bình Định</option>
                        <option>Bình Phước</option>
                        <option>Bình Thuận</option>
                        <option>Cà Mau</option>
                        <option>Cao Bằng</option>
                        <option>Cần Thơ</option>
                        <option>Đà Nẵng</option>
                        <option>Đắk Lắk</option>
                        <option>Đắk Nông</option>
                        <option>Điện Biên</option>
                        <option>Đồng Nai</option>
                        <option>Đồng Tháp</option>
                        <option>Gia Lai</option>
                        <option>Hà Giang</option>
                        <option>Hà Nam</option>
                        <option>Hà Tĩnh</option>
                        <option>Hải Dương</option>
                        <option>Hải Phòng</option>
                        <option>Hậu Giang</option>
                        <option>Hòa Bình</option>
                        <option>Hưng Yên</option>
                        <option>Khánh Hòa</option>
                        <option>Kiên Giang</option>
                        <option>Kon Tum</option>
                        <option>Lai Châu</option>
                        <option>Lạng Sơn</option>
                        <option>Lào Cai</option>
                        <option>Lâm Đồng</option>
                        <option>Long An</option>
                        <option>Nam Định</option>
                        <option>Nghệ An</option>
                        <option>Ninh Bình</option>
                        <option>Ninh Thuận</option>
                        <option>Phú Thọ</option>
                        <option>Phú Yên</option>
                        <option>Quảng Bình</option>
                        <option>Quảng Nam</option>
                        <option>Quảng Ngãi</option>
                        <option>Quảng Ninh</option>
                        <option>Quảng Trị</option>
                        <option>Sóc Trăng</option>
                        <option>Sơn La</option>
                        <option>Tây Ninh</option>
                        <option>Thái Bình</option>
                        <option>Thái Nguyên</option>
                        <option>Thanh Hóa</option>
                        <option>Thừa Thiên Huế</option>
                        <option>Tiền Giang</option>
                        <option>Trà Vinh</option>
                        <option>Tuyên Quang</option>
                        <option>Vĩnh Long</option>
                        <option>Vĩnh Phúc</option>
                        <option>Yên Bái</option>
                    </select><br>
                    <p>
                        <?php
                        if(isset($_POST["submit"])){
                            if($cityer){
                                echo "".$cityer."";
                            }
                        }
                        ?>
                    </p>
                </div>
                <div style="margin-left: 25px;">
                    <label>Tên đăng nhập</label><br>
                    <input type="text" name="user" class="nhap" 
                    value="<?php
                        if(isset($_POST["submit"])){
                            echo "".$user."";
                        }
                        ?>"
                        ><br>
                    <p>
                        <?php
                        if(isset($_POST["submit"])){
                            if($userer){
                                echo "".$userer."";
                            }
                        }
                        ?>
                    </p>
                    <label>Mật khẩu</label><br>
                    <input type="password" name="pass" class="nhap"
                    value="<?php
                        if(isset($_POST["submit"])){
                            echo "".$pass."";
                        }
                        ?>"
                    ><br>
                    <p>
                        <?php
                        if(isset($_POST["submit"])){
                            if($passer){
                                echo "".$passer."";
                            }
                        }
                        ?>
                    </p>
                    <label>Nhập lại mật khẩu</label><br>
                    <input type="password" name="pass2" class="nhap"
                    value="<?php
                        if(isset($_POST["submit"])){
                            echo "".$pass2."";
                        }
                        ?>"
                        >
                    <p>
                        <?php
                        if(isset($_POST["submit"])){
                            if($pass2er){
                                echo "".$pass2er."";
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div id="bung">
                <input class="button" type="submit" name="submit" value="Đăng ký"><br>
                <p>
                    <?php
                    if(isset($_POST["submit"])){
                        if($kq){
                            echo "".$kq."";
                        }                    }
                    ?>
                </p>
                <?php
                if($kq){
                    ?>
                <button><a style="text-decoration: none; color:aliceblue"  href="dangnhap.php">Đăng nhập</a></button>
                <?php
                }
                ?>
                
            </div>
        </form>
    </div>
</body>
</html>
