<?php
session_start();
//kiểm tra xem đã đăng nhập chưa nếu rồi thì ép chuyển đến trangchu.php
if(!isset($_SESSION["user"])){
    header("location:trangchu.php");
}
include("db_connnection.php");
$kq="";
if(isset($_POST["submit"])){
    //kiểm tra và set các biến lưu chuỗi lỗi tương tự như đăng kí
    if(!$_POST["dichvu"]){
        $dichvuer = "Hãy chọn dịch vụ bạn muốn sử dụng";
    }else{
        $dichvuer = "";
        $dichvu = $_POST["dichvu"];
    }

    if(!$_POST["date"]){
        $dateer="Bạn hãy nhập ngày đặt";
    }else{
        $dateer = "";
        $date = $_POST["date"];   
    }

    //biến lưu lại date hiện tại
    $currentDateTime = date("Y-m-d H:i:s");
    $dateToCheck = $date;
    //biến kiểm tra date đăng ký có phải chủ nhật không(ngày đóng cửa) qua một biến tạm
    $dayOfWeek = date('w', strtotime($dateToCheck));
    //nếu đăng ký ngày nghỉ hoặc thời gian trong quá khứ thì set lại các biến lỗi
    if($date > $currentDateTime){
        if($dayOfWeek == 0){
            $dateer="Đó là ngày Chủ Nhật, chúng tôi không mở cửa!";
        }
    }else{
        $dateer ="Bạn không thể đăng ký ngày này";
    }
    //truy vấn tài khoản để lấy họ tên và số điện thoại mã tài khoản
    $user = $_SESSION["user"];
    $sql2 = "SELECT * FROM taikhoan
    WHERE tendangnhap = '$user'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $taikhoanid = $row2["taikhoanid"];
    $name = $row2["hoten"];
    $sdt = $row2["sdt"];


    
    //tương tự đăng ký khi các lỗi rỗng thì bắt đầu xử lý

    if($dichvuer== "" && $dateer == ""){
        $sql = "INSERT INTO dondat (id, hoten, sdt, dichvu, ngaysua, tinhtrang, taikhoanid)
        VALUES('','$name', '$sdt', '$dichvu', '$date', 0, '$taikhoanid')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $kq="Đăng ký thành công, hãy đến sửa vào đúng ngày hẹn";
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
    <title>Đăng ký sử dụng dịch vụ</title>
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
            width: 450px;
            border-radius: 5px;
          
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
            justify-content: space-evenly;
        }
        .button{
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
                <h1 style="margin:0px; margin-left:10px;">Sử dụng dịch vụ</h1>
            </div>
            <hr>
            <div id="nguc">
                <div>
                    <label>Chọn dịch vụ</label><br>
                    <select type="text" name="dichvu" class="nhap">
                        <option></option>
                        <option>Thay Bàn Phím</option>
                        <option>Thay Màn Hình</option>
                        <option>Thay Ổ Cứng</option>
                        <option>Thay Pin</option>
                        <option>Thay CPU</option>
                        <option>Thay RAM</option>
                        <option>Thay Touchpad</option>
                    </select><br>
                    <!-- thẻ p in ra lỗi dưới các inputs -->
                    <p>
                        <?php
                        if(isset($_POST["submit"])){
                            if($dichvuer){
                                echo $dichvuer;
                            }
                        }
                        ?>
                    </p>
                    <label>Hẹn ngày sửa</label><br>
                    <input type="date" name="date" class="nhap"><br>
                    <p>
                        <?php
                        if(isset($_POST["submit"])){
                            if($dateer){
                                echo $dateer;
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div id="bung">
                <input class="button" type="submit" name="submit" value="Xác nhận">
                <input type="submit" class="button" name="ql" value="Trở về">
            </div>
            <!-- thông báo kết quả -->
            <p>
                <?php
                if(isset($_POST["submit"])){
                    if($kq){
                        echo "".$kq."";
                    }                    }
                ?>
            </p>
        </form>
        <?php
        //click nút ql sẽ đẩy ra trangchu.php
        if(isset($_POST['ql'])){
            header('location:trangchu.php');
        }
        ?>
    </div>
</body>
</html>
