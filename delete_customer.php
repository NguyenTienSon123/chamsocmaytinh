<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
echo '<script type="text/javascript">
    window.onload = function () { alert("Hãy đọc kỹ thông báo trước khi xóa!"); }
    </script>';

include "db_connnection.php";

$kq="";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    // Truy vấn cơ sở dữ liệu để lấy thông tin khách hàng cần xóa
    $sql = "SELECT * FROM taikhoan WHERE taikhoanid = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["hoten"];
        $sdt = $row["sdt"];
        $city = $row["thanhpho"];

        $name2 = $name;
        $sdt2 = $sdt;
        $city2 = $city;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) {
    //truy vấn tất cả các đơn đặt để khi xóa tài khoản sẽ xóa tất cả các đơn hàng
    $id = $_POST["id"];
    $sql2 = "SELECT * FROM dondat WHERE taikhoanid = '$id'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $madondat = $row2["id"];
            $sql3 = "DELETE FROM dondat WHERE id = '$madondat'";
            $result4 = mysqli_query($conn, $sql3);
        }
    }
    
    // Xóa thông tin khách hàng
    $sql = "DELETE FROM taikhoan WHERE taikhoanid = $id";
    if ($conn->query($sql) == TRUE) {
        //xóa thành công thì đăng xuất và chuyển về trang chủ
        session_destroy();
        header('location:trangchu.php');
        exit;
    } else {
        $kq = "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa thông tin khách hàng</title>
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
        <h2>Xóa thông tin khách hàng</h2>
        <p>
            Khi bạn xác nhận xóa, 
            bạn sẽ không thể đăng nhập hay sử dụng các dịch vụ tại đây bằng tài khoản này. 
            Hãy chắc chắn là bạn muốn xóa sau đó chúng tôi sẽ đưa bạn trở về trang chủ!
        </p>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
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
            <input type="submit" class="button" name="confirm_delete" value="Xác nhận xóa">
            <input type="submit" class="button" name="ql" value="Trở về">
        </div>
    </form>
    <?php
    if(isset($_POST['ql'])){
        header('location:trangchu.php');
    }
    ?>
</body>
</html>
