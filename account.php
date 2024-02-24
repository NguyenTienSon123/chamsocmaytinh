<?php
//nếu không đăng nhập thì đẩy ra trang đăng nhập thì mới được vào 
//bằng cách kiểm tra xem có biến user đã được lưu vào phiên hoạt động chưa
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
include("db_connnection.php");

$user = $_SESSION["user"];
// Truy vấn cơ sở dữ liệu để lấy danh sách khách hàng
$sql = "SELECT * FROM taikhoan WHERE tendangnhap LIKE '$user'";
$result = $conn->query($sql);

// Mô phỏng dữ liệu của tài khoản
if ($result->num_rows > 0){
    //lưu kết quả truy vấn thành 1 mảng kết hợp
    $row = $result->fetch_assoc();
    //lấy các dữ liệu cần thiết trong mảng lưu vào một mảng cơ bản
    $accountInfo = array(
        'Tên' => $row["hoten"],
        'Số điện thoại' => $row["sdt"] ,
        'Địa chỉ' => $row["thanhpho"]
    );
}

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
        table{
            margin-bottom: 20px;
        }
        button{
            width: 100px;
            height: 40px;
            color: aliceblue;
            background-color: #F4A55D;
            border: 0px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h2>Thông tin tài khoản</h2>
    <table>
        <?php
        //in mảng bằng for
        foreach ($accountInfo as $key => $value) {
            echo "<tr><th>$key</th><td>$value</td></tr>";
        }
        ?>
    </table>
    <?php
    echo"<a href='edit_customer.php?id=" . $row["taikhoanid"] . "'>
            <button>Sửa</button>
        </a> 
        <a href='delete_customer.php?id=" . $row["taikhoanid"] . "'>
            <button>Xóa</button>
        </a>"
    ?>
    
</body>
</html>
