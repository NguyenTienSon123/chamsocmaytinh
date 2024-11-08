<?php
include("db_connnection.php");

$tenkh="";
$tendv ="";
$ngaydat="";

$sql = "SELECT * FROM dondat";


if(isset($_POST["loc"])){
    if(isset($_POST["tenkh"])){
        $tenkh=trim($_POST["tenkh"]);
    }else{
        $tenkh = "";
    }
    if(isset($_POST["tendv"])){
        $tendv=$_POST["tendv"];
    }else{
        $tendv = "";
    }
    if(isset($_POST["ngaydat"])){
        $ngaydat=$_POST["ngaydat"];
    }else{
        $ngaydat = "";
    }
    

    // Kiểm tra nếu cả ba biến đều có giá trị
    if ($tenkh !== "" && $tendv !== "" && $ngaydat !== "") {
        // Thực hiện công việc khi cả ba biến có giá trị
        $sql = "SELECT * FROM dondat WHERE hoten = '$tenkh' AND dichvu = '$tendv' AND ngaysua = '$ngaydat'";

    } elseif ($tenkh !== "" && $tendv !== "") {
        // Thực hiện công việc khi chỉ có biến $tenkh và $tendv có giá trị
        $sql = "SELECT * FROM dondat WHERE hoten = '$tenkh' AND dichvu = '$tendv'";

    } elseif ($tenkh !== "" && $ngaydat !== "") {
        // Thực hiện công việc khi chỉ có biến $tenkh và $ngaydat có giá trị
        $sql = "SELECT * FROM dondat WHERE hoten = '$tenkh' AND ngaysua = '$ngaydat'";

    } elseif ($tendv !== "" && $ngaydat !== "") {
        // Thực hiện công việc khi chỉ có biến $tendv và $ngaydat có giá trị
        $sql = "SELECT * FROM dondat WHERE dichvu = '$tendv' AND ngaysua = '$ngaydat'";

    } elseif ($tenkh !== "") {
        // Thực hiện công việc khi chỉ có biến $tenkh có giá trị
        $sql = "SELECT * FROM dondat WHERE hoten = '$tenkh'";

    } elseif ($tendv !== "") {
        // Thực hiện công việc khi chỉ có biến $tendv có giá trị
        $sql = "SELECT * FROM dondat WHERE dichvu = '$tendv'";

    } elseif ($ngaydat !== "") {
        // Thực hiện công việc khi chỉ có biến $ngaydat có giá trị
        $sql = "SELECT * FROM dondat WHERE ngaysua = '$ngaydat'";

    } else {
        // Nếu cả ba biến đều không có giá trị
        $sql = "SELECT * FROM dondat";

    }
}

if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
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
    </style>
</head>
<body>
    <h2>Danh sách đơn đặt</h2>
    <form method="post" >
        <h3>Tìm kiếm theo</h3>
        <table id="ray">
            <tr>
                <th><label>Tên khách hàng</label></th>
                <td><input type="text" name="tenkh"></td>
            </tr>
            <tr>
                <th><label>Tên dich vụ</label></th>
                <td>
                    <select type="text" name="tendv" class="nhap">
                        <option value=""></option>
                        <?php
                        $sql2 = "SELECT * FROM dichvu";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0){
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<option>" . $row2["dichvu"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label>Ngày đặt</label></th>
                <td><input type="date" name="ngaydat"></td>
            </tr>
        </table>
        <input type="submit" name="loc" id="nut" value="Áp dụng">
    </form>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Họ tên khách hàng</th><th>Số điện thoại</th>".
        "<th>Dich vụ</th><th>Ngày hẹn</th><th>Giá</th><th>Tình trạng</th></tr>";
        //biến row lưu một mảng lưu trữ dữ liệu 1 bản ghi, 
        //dùng while để in ra các thông tin lấy được từ row
        while ($row = $result->fetch_assoc()) {
    
            echo "<tr>";
            echo "<td>" . $row["hoten"] . "</td>";
            echo "<td>" . $row["sdt"] . "</td>";
            echo "<td>" . $row["dichvu"] . "</td>";
            echo "<td>" . $row["ngaysua"] . "</td>";
            echo "<td>" . $row["gia"] . "</td>";
            if($row["tinhtrang"]==0){
                $tinhtrang = "Chưa xử lý";
                echo "<td>".$tinhtrang . " | <a href='edit_oder.php?id=" . $row["id"] . "'>Sửa</a></td>";
            }else{
                $tinhtrang = "Đã xử lý";
                echo "<td>".$tinhtrang . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không tìm thấy đơn nào.";
    }

    
    ?>
    <a href="indsdondat.php"><button style="margin-top:25px;" id="nut" name="ep" type="submit">Excel</button></a>
    <p><br></p>
</body>
</html>