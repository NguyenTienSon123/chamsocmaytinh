<?php
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
include("db_connnection.php");

$sql = "SELECT * FROM taikhoan WHERE level = 0";

$tenkh="";
$city ="";

if(isset($_POST["loc"])){

    if(isset($_POST["tenkh"])){
        $tenkh=trim($_POST["tenkh"]);
    }else{
        $tenkh = "";
    }

    if(isset($_POST["city"])){
        $city=$_POST["city"];
    }else{
        $city = "";
    }

    // Kiểm tra nếu cả hai biến đều có giá trị
    if ($tenkh !== "" && $city !== "") {
        // Thực hiện công việc khi cả hai biến có giá trị
        $sql = "SELECT * FROM taikhoan WHERE level = 0 AND hoten = '$tenkh' AND  thanhpho = '$city'";
    } elseif ($tenkh !== "") {
        // Thực hiện công việc khi chỉ có biến $tenkh có giá trị
        $sql = "SELECT * FROM taikhoan WHERE level = 0 AND hoten = '$tenkh' ";

    } elseif ($city !== "") {
        // Thực hiện công việc khi chỉ có biến $city có giá trị
        $sql = "SELECT * FROM taikhoan WHERE level = 0 AND  thanhpho = '$city'";

    } else {
        // Nếu cả hai biến đều không có giá trị
        $sql = "SELECT * FROM taikhoan WHERE level = 0 AND hoten = '$tenkh' AND  thanhpho = '$city'";
    }
}




$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2{
            color: #F4A55D;
            padding-bottom: 20px;
        }
        form th{
            width: 300px
        }
        
        form table, #nut, h3{
            margin-bottom: 25px;
        }
        #ray input, select{
            width: 100%;
            height: 100%;
            border: none;
        }
        form #nut{
            width: 100px;
            height: 40px;
            background-color: #F4A55D;
            border: 0px;
            border-radius: 5px;
            color: #e8e8e8;
            font-weight:bolder;
        }
    </style>
</head>
<body>
    <h2>Danh sách khách hàng</h2>
    <form method="post" >
        <h3>Tìm kiếm theo :</h3>
        <table id="ray">
            <tr>
                <th><label>Tên khách hàng</label></th>
                <td><input type="text" name="tenkh"></td>
            </tr>
            <tr>
                <th><label>Địa chỉ</label></th>
                <td>
                    <select type="text" name="city" class="nhap">
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
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" name="loc" id="nut" value="Áp dụng">
    </form>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Họ tên</th><th>Số điện thoại</th><th>Địa chỉ</th></tr>";
    
        //biến row lưu một mảng lưu trữ dữ liệu 1 bản ghi, dùng while để in ra các thông tin lấy được từ row
        while ($row = $result->fetch_assoc()) {
    
            echo "<tr>";
            echo "<td>" . $row["hoten"] . "</td>";
            echo "<td>" . $row["sdt"] . "</td>";
            echo "<td>" . $row["thanhpho"] . "</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    } else {
        echo "Không có khách hàng nào.";
    }
    ?>
    <p><br></p>
</body>
</html>