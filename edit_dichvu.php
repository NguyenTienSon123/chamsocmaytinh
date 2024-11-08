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

    // Truy vấn cơ sở dữ liệu để lấy thông tin dich vu cần sửa
    $sql = "SELECT * FROM dichvu WHERE dichvuid = $id";
    $result = $conn->query($sql);
    //nếu truy vẫn > 0 thì thực hiện trong if
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //các biến lưu trữ các phần tử trong mảng row
        $name = $row["dichvu"];
        $gia = $row["gia"];
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $gia = $_POST["gia"];
    $sql4 = "SELECT * FROM dichvu WHERE dichvu LIKE '$name'";
    $result4 = mysqli_query($conn, $sql4);
    $rau = mysqli_fetch_assoc($result4);
    $tendv = $rau["dichvu"];
    // Cập nhật thông tin dich vụ
    if(!$tendv){
        $sql = "UPDATE dichvu SET dichvu = '$name', gia = '$gia' WHERE dichvuid = $id";
        if ($conn->query($sql) == TRUE) {
            $kq="Cập nhật thông tin dịch vụ thành công!";
            $sql2 = "SELECT * FROM dondat WHERE dichvuid = $id AND tinhtrang = 0";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $dondatid = $row2["id"] ;
                    $sql3 = "UPDATE dondat SET gia = '$gia', dichvu = '$name' WHERE id = '$dondatid'";
                    $result3 = $conn->query($sql3);
                }
            }
        } else {
            $kq = "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }else{
        $kq="Dịch vụ đã tồn tại!";
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
    <title>Sửa thông tin dịch vụ</title>
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
        
        <label>Dịch vụ:</label>
        <input type="text" name="name" class="nhap" value="<?php echo $name; ?>" required><br>

        <label>Giá dich vụ</label>
        <input type="tel" name="gia" class="nhap" value="<?php echo $gia; ?>"><br>
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
        header('location:admin.php?page=dsdichvu');
    }
    ?>
</body>
</html>
