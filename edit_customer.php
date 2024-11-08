<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
//sửa thông tin khách hàng
//ở file lấy dữ liệu sẽ có một đường link dẫn đến đây, nếu cần sửa thông tin
//LẤY id từ file laydl

include "db_connnection.php";
$kq="";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {

    $id = $_GET["id"];

    // Truy vấn cơ sở dữ liệu để lấy thông tin khách hàng cần sửa
    $sql = "SELECT * FROM taikhoan WHERE taikhoanid = $id";
    $result = $conn->query($sql);
    //nếu truy vẫn >0 thì thực hiện trong if
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //các biến lưu trữ các phần tử trong mảng row
        $name = $row["hoten"];
        $sdt = $row["sdt"];
        $city = $row["thanhpho"];
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $sdt = $_POST["sdt"];
    $city = $_POST["city"];

    // Cập nhật thông tin khách hàng
    $sql = "UPDATE taikhoan SET hoten = '$name', sdt = '$sdt', thanhpho = '$city' WHERE taikhoanid = $id";

    if ($conn->query($sql) == TRUE) {
        $sql2 = "SELECT * FROM dondat WHERE taikhoanid = $id";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $dondatid = $row2["id"] ;
                $sql3 = "UPDATE dondat SET hoten = '$name', sdt = '$sdt' WHERE id = '$dondatid'";
                $result3 = $conn->query($sql3);
            }
        }
        $kq="Cập nhật thông tin khách hàng thành công!";
    } else {
        $kq = "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<!-- tạo một bảng có các inputs cho người dùng sửa -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin khách hàng</title>
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
        form{
            display: flex;
            flex-direction: column;
            background-color:azure;
            padding: 40px;
            width: 300px;
            border-radius: 5px;
        }
        .nhap{
            width: 290px;
            height: 30px;
            border: 1px solid #F4A55D;
            border-radius: 3px;
        }
        .button{
            background-color: #F4A55D;
            border: 0px;
            border-radius: 3px;
            color: azure;
            width: 100px;
            height: 30px;
        }
        .nut{
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <h2>Sửa thông tin khách hàng</h2>
        <input type="hidden" name="id" class="nhap" value="<?php echo $id; ?>">
        
        <label for="name">Tên:</label>
        <input type="text" name="name" class="nhap" value="<?php echo $name; ?>" required><br>

        <label for="phone">Số điện thoại:</label>
        <input type="tel" name="sdt" class="nhap" value="<?php echo $sdt; ?>"><br>

        <label for="address">Địa chỉ:</label>
        <textarea name="city" class="nhap"><?php echo $city ; ?></textarea><br>
        <p>
        <?php
            if(isset($_POST["submit"])){
                if($kq){
                    echo "".$kq."";
                }  
            }
        ?>
        </p>
        <div class="nut">
            <input type="submit" class="button" name="submit" value="Lưu thay đổi">
            <input type="submit" class="button" name="ql" value="Trở về">
        </div>
    </form>
    <?php
    if(isset($_POST['ql'])){
        header('location:thongtinuser.php?page=account');
    }
    ?>
</body>
</html>
