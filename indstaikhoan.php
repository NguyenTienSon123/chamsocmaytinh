<?php
include("db_connnection.php");
if(isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
require('Classes/PHPExcel.php');

$sql = "SELECT * FROM taikhoan";


if(isset($_POST['ep'])){
    $objExcel = new PHPExcel;
    $objExcel -> setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('Khách hàng');
    $rowCount = 1;
    $sheet->setCellValue('A'.$rowCount, 'Họ tên');
    $sheet->setCellValue('B'.$rowCount, 'Số điện thoại');
    $sheet->setCellValue('C'.$rowCount, 'Địa chỉ');

    $truyvan = $conn->query($sql);
    while($row = mysqli_fetch_array($truyvan)){
        $rowCount++;
        $sheet->setCellValue('A'.$rowCount, $row['hoten']);
        $sheet->setCellValue('B'.$rowCount, $row['sdt']);
        $sheet->setCellValue('C'.$rowCount, $row['thanhpho']);
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename = 'khachhang.xlsx';
    $objWriter->save($filename);
    header('Content-Disposition: attachment; filename="'. $filename .'"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Length: ' . filesize($filename));
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: no-cache');
    readfile($filename);
    return;
    
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        #sidebar {
            background-color:#ddd;
            padding: 40px;
            box-sizing: border-box;
            height: 100%;

        }
        #content {
            flex: 1;
            padding: 47px;
            box-sizing: border-box;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #3067e7;
            color: white;
        }

        form {
            display: inline;
        }
        ul{
            list-style: none;
            /* color: #ddd; */
        }
        
        ul a{
            text-decoration: none;
            color:black;

        }
        #botent{
            display: flex;
            height: 100vh;
        }
        
        #conten h2{
            color: #F4A55D;
            padding-bottom: 20px;
        }
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
    <h2>Danh sách khách hàng</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Họ tên</th><th>Số điện thoại</th><th>Địa chỉ</th></tr>";
    
        //biến row lưu một mảng lưu trữ dữ liệu 1 bản ghi, 
        //dùng while để in ra các thông tin lấy được từ row
        while ($row = $result->fetch_assoc()) {
    
            echo "<tr>";
            echo "<td>" . $row["hoten"] . "</td>";
            echo "<td>" . $row["sdt"] . "</td>";
            echo "<td>" . $row["thanhpho"] . "</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    } else {
        echo "Không có khách hàng nào.";
    }
    ?>
    <form method="post">
        <button style="margin-top:25px;" id="nut" name="ep" type="submit">In ngay</button>
    </form>
    <a href="admin.php?page=dsnguoidung"><button type="submit" id="nut" class="button" name="ql" >Trở về</button></a>
    <p><br></p>
</body>
</html>