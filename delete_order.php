<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
include("db_connnection.php");
$kq ="";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM dondat WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $name = $row["hoten"];
        $sdt = $row["sdt"];
        $dichvu = $row["dichvu"];
        $date = $row["ngaysua"];
    } else {
        echo "Không tìm thấy đơn đặt.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM dondat WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $kq = "Xóa đơn đặt thành công!";
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
            width: 200px;
            border-radius: 5px;
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
        <h2>Xóa đơn đặt</h2>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="nut">
            <input style="margin-right: 25px;" type="submit" class="button" name="confirm_delete" value="Xác nhận xóa">
            <input type="submit" class="button" name="ql" value="Trở về">
        </div>
        <p>
            <?php
                if(isset($_POST["confirm_delete"])){
                    if($kq){
                        echo "".$kq."";
                    }  
                }
            ?>
        </p>
    </form>
    <?php
    if(isset($_POST['ql'])){
        header('location:thongtinuser.php?page=orders');
    }
    ?>

</body>
</html>
