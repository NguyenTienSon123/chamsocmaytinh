<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
include "db_connnection.php";


// echo '<script type="text/javascript">
//     window.onload = function () { alert("Hãy đọc kỹ thông báo trước khi sửa!"); }
//     </script>';
$kq="";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    // Truy vấn cơ sở dữ liệu để lấy thông tin khách hàng cần sửa
    $sql = "SELECT * FROM dondat WHERE id = $id";
    $result = $conn->query($sql);
    //nếu truy vẫn >0 thì thực hiện trong if
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //các biến lưu trữ các phần tử trong mảng row
        $tinhtrang = $row["tinhtrang"];
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id = $_POST["id"];
    $sql = "UPDATE dondat SET tinhtrang = 1 WHERE id = $id";
    if ($conn->query($sql) == TRUE) {
        $kq="Cập nhật tình trạng đơn đặt thành công!";
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
    <h2>Sửa tình trạng đơn hàng</h2>
    <input type="hidden" name="id" class="nhap" value="<?php echo $id; ?>">
        <p>
            Khi bạn xác nhận, 
            trạng thái đơn đặt sẽ chuyển sang "Đã xử lý".
            Hãy chắc chắn rằng điều này là đúng!
        </p>
        <div class="nut">
            <input type="submit" class="button" name="submit" value="Lưu thay đổi">
            <input type="submit" class="button" name="ql" value="Trở về">
        </div>
        <p>
            <?php
            if(isset($_POST["submit"])){
                if($kq){
                    echo "".$kq."";
                }  
            }
            ?>
        </p>
    </form>
    <?php
    if(isset($_POST['ql'])){
        header('location:admin.php?page=dsdondat');
    }
    ?>
</body>
</html>
