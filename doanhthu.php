<?php
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
include("db_connnection.php");


$ngaydau="";
$ngaycuoi = "";
$kq="";
$sql = "SELECT * FROM dondat  WHERE tinhtrang = 1";


if(isset($_POST["loc"])){
    if(isset($_POST["ngaydau"])){
        $ngaydau=$_POST["ngaydau"];
    }else{
        $ngaydau = "";
    }

    if(isset($_POST["ngaycuoi"])){
        $ngaycuoi=$_POST["ngaycuoi"];
    }else{
        $ngaycuoi = "";
    }
    

    // Kiểm tra nếu cả ba biến đều có giá trị
    if ($ngaycuoi !== "" && $ngaydau !== "") {
        // Thực hiện công việc khi cả ba biến có giá trị
        $sql = "SELECT * FROM dondat WHERE ngaysua >= '$ngaydau' 
        AND ngaysua <= '$ngaycuoi' AND tinhtrang = 1";
    } else{
        $kq = "Cho biết cả ngày bắt đầu và ngày kết thức để thực hiện chức năng này!";
    }
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h2{
            color: #F4A55D;
            padding-bottom: 20px;
        }
        td a{
            text-decoration: none;
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
        #nut{
            width: 100px;
            height: 40px;
            background-color: #F4A55D;
            border: 0px;
            border-radius: 5px;
            color: #e8e8e8;
            font-weight:bolder;
        }
        p{
            color : red ;
        }
    </style>
</head>
<body>
    <h2>Danh sách đơn đặt</h2>
    <form method="post" >
        <h3>Thống kê : </h3>
        <table id="ray">
            <tr>
                <th><label>Từ ngày</label></th>
                <th><label>Đến ngày</label></th>
            </tr>
            <tr>
                <td><input type="date" name="ngaydau"></td>
                <td><input type="date" name="ngaycuoi"></td>
            </tr>
        </table>
        <p>
            <?php
            if($kq){
                echo $kq;
            }
            ?>
        </p>
        <br>
        <input type="submit" name="loc" id="nut" value="Áp dụng">
    </form>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Họ tên khách hàng</th><th>Số điện thoại</th><th>Dich vụ</th><th>Ngày hẹn</th><th>Giá</th><th>Tổng tiền</th></tr>";
    
        //biến row lưu một mảng lưu trữ dữ liệu 1 bản ghi, dùng while để in ra các thông tin lấy được từ row
        $tong = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["hoten"] . "</td>";
            echo "<td>" . $row["sdt"] . "</td>";
            echo "<td>" . $row["dichvu"] . "</td>";
            echo "<td>" . $row["ngaysua"] . "</td>";
            echo "<td>" . $row["gia"] . "</td>";
            echo "<td>" . $row["gia"] . "</td>";
            $tong = $tong + $row["gia"];
            echo "</tr>";
        }
        echo "<tr>";
            echo "<td>" . "</td>";
            echo "<td>" . "</td>";
            echo "<td>" . "</td>";
            echo "<td>" . "</td>";
            echo "<td>" . "</td>";
            echo "<td>" . $tong . "</td>";
        echo "</tr>";
        echo "</table>";
        echo "<br><p>". "* Doanh thu đạt " .$tong . " vnd." ."</p>";
    } else {
        echo "Không tìm thấy đơn nào.";
    }
    ?>
    <a href="indoanhthu.php"><button style="margin-top:25px;" id="nut" name="ep" type="submit">Excel</button></a>
</body>
</html>