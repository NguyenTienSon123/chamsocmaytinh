<?php
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
include("db_connnection.php");

$user = $_SESSION["user"];
$sql1 = "SELECT taikhoanid FROM taikhoan WHERE tendangnhap = '$user'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);



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
    <h2>Đơn hàng của bạn</h2>
    <form method="post" >
        <h3>Tìm kiếm theo</h3>
        <table id="ray">
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
                <th><label>ngày đặt</label></th>
                <td><input type="date" name="ngaydat"></td>
            </tr>
        </table>
        <input type="submit" name="loc" id="nut" value="Áp dụng">
    </form>
    <table>
        <?php
        $sql = "SELECT * FROM dondat WHERE taikhoanid = '$row1[0]'";

        $tendv ="";
        $ngaydat="";

        if(isset($_POST["loc"])){
   
            if(isset($_POST["tendv"])){
                $tendv = $_POST["tendv"];
            }else{
                $tendv = "";
            }
            
            if(isset($_POST["ngaydat"])){
                $ngaydat=$_POST["ngaydat"];
            }else{
                $ngaydat = "";
            }

            // Kiểm tra nếu cả hai biến đều có giá trị
            if ($tendv !== "" && $ngaydat !== "") {
                // Thực hiện công việc khi chỉ có biến $tendv và $ngaydat có giá trị
                $sql = "SELECT * FROM dondat WHERE taikhoanid = '$row1[0]' 
                AND dichvu = '$tendv' AND ngaysua = '$ngaydat'";

            } elseif ($tendv !== "") {
                // Thực hiện công việc khi chỉ có biến $tendv có giá trị
                $sql = "SELECT * FROM dondat WHERE taikhoanid = '$row1[0]' AND dichvu = '$tendv'";

            } elseif ($ngaydat !== "") {
                // Thực hiện công việc khi chỉ có biến $ngaydat có giá trị
                $sql = "SELECT * FROM dondat WHERE taikhoanid = '$row1[0]' AND ngaysua = '$ngaydat'";

            } else {
                // Nếu cả hai biến đều không có giá trị
                $sql = "SELECT * FROM dondat WHERE taikhoanid = '$row1[0]'";
            }
        }

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<tr><th>Mã đơn đặt</th><th>Họ tên</th><th>Số điện thoại</th><th>Dịch vụ</th><th>Ngày hẹn</th><th>Giá</th><th>Tình trạng</th><th></th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["hoten"] . "</td>";
                echo "<td>" . $row["sdt"] . "</td>";
                echo "<td>" . $row["dichvu"] . "</td>";
                echo "<td>" . $row["ngaysua"] . "</td>";
                echo "<td>" . $row["gia"] . "</td>";
                if($row["tinhtrang"]==0){
                    $tinhtrang ="Chưa xử lý";
                    echo "<td>" . $tinhtrang . "</td>";
                }else{
                    $tinhtrang ="Đã xử lý";
                    echo "<td>" . $tinhtrang . "</td>";
                }
                echo "<td><a href='delete_order.php?id=" . $row["id"] . "'>Xóa</a></td>";
                echo "</tr>";
            }

        } else {
            echo "Không có đơn hàng nào.";
        }
        ?>
    </table>
</body>
</html>