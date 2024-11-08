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
    // Truy vấn cơ sở dữ liệu để lấy thông tin dịch vụ cần xóa
    $sql = "SELECT * FROM dichvu WHERE dichvuid = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["dichvu"];
        $gia = $row["gia"];

        $name2 = $name;
        $gia2 = $gia;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) {
    //truy vấn tất cả các đơn đặt để khi xóa dịch vụ sẽ xóa tất cả các đơn hàng
    $id = $_POST["id"];
    $sql2 = "SELECT * FROM dondat WHERE dichvuid = '$id'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $madondat = $row2["id"];
            $sql3 = "DELETE FROM dondat WHERE id = '$madondat' AND tinhtrang = 0";
            $result4 = mysqli_query($conn, $sql3);
        }
    }
    
    // Xóa thông tin dịch vụ
    $sql = "DELETE FROM dichvu WHERE dichvuid = $id";
    if ($conn->query($sql) == TRUE) {
        //xóa thành công thì chuyển về trang chủ
        header('location:admin.php?page=dsdichvu');
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
    <title>Xóa dịch vụ</title>
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
        <h2>Xóa thông tin dịch vụ</h2>
        
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
        header('location:admin.php?page=dsdichvu');
    }
    ?>
</body>
</html>
