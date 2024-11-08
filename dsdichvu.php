<?php
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
include("db_connnection.php");

$tendv ="";

$sql = "SELECT * FROM dichvu";

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
        form #nut{
            width: 100px;
            height: 40px;
            background-color: #F4A55D;
            border: 0px;
            border-radius: 5px;
            color: #e8e8e8;
            font-weight:bolder;
        }
        #adddv{
            display: flex;
            flex-direction: column;
            background-color:azure;
            padding: 40px;
            width: 300px;
            border-radius: 5px;
            color: #F4A55D;
            margin-bottom: 25px;
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
    <h2>Quản lý dịch vụ</h2>
    <?php
    $tendver="";
    $giaer="";
    $kq2 = "";
    if(isset($_POST["tendv"])){
        $tendv= trim($_POST["tendv"]);
    }else{
        $tendv="";
        $tendver= "Bạn chưa nhập tên dịch vụ!";
    }

    if(isset($_POST["gia"])){
        $gia= $_POST["gia"];
    }else{
        $gia="";
        $giaer ="Bạn chưa nhập giá dịch vụ";
    }
    if(isset($_POST["them"])){
        //kiểm tra trùng tên
        // $sql4 = "SELECT * FROM dichvu WHERE dichvu LIKE '$tendv'";
        // $result4 = mysqli_query($conn, $sql4);
        // $rau = mysqli_fetch_assoc($result4);
        // $name = $rau["dichvu"];
        
        // if(!$name){
        //     //Thêm dịch vụ
        //     if($giaer == "" && $tendver == ""){
        //         $sql3 = "INSERT INTO dichvu (dichvuid, dichvu, gia)
        //         VALUES('', '$tendv', '$gia')";
        //         $result3 = mysqli_query($conn, $sql3);
        //         if($result3){
        //             $kq2="Thêm thành công!";
        //         }else{
        //             $kq2="Thêm thất bại";
        //         }
        //     } 
        // }else{
        //     $kq2="Dịch vụ đã tồn tại!";
        // }
    
        if($giaer == "" && $tendver == ""){
            $sql3 = "INSERT INTO dichvu (dichvuid, dichvu, gia)
            VALUES('', '$tendv', '$gia')";
            $result3 = mysqli_query($conn, $sql3);
            if($result3){
                $kq2="Thêm thành công!";
            }else{
                $kq2="Thêm thất bại";
            }
        } 
    }
    ?>
    <form method="post" id="adddv">
        <h3>Thêm dịch vụ</h3>
        <label>Tên dich vụ</label>
        <input class="nhap" type="text" name="tendv"><br>
        <p>
            <?php
            if(isset($_POST["them"])){
                if($tendver){
                    echo $tendver;
                }
            }
            ?>
        </p>
        <label>Giá dịch vụ</label>
        <input class="nhap" type="text" name="gia"><br>
        <p>
            <?php
            if(isset($_POST["them"])){
                if($giaer){
                    echo $giaer;
                }
            }
            ?>
        </p>
        <input type="submit" name="them" id="nut" value="Thêm dịch vụ">
        <p>
            <?php
            if(isset($_POST["them"])){
                echo $kq2;
            }
            ?>
        </p>
    </form>
    
    <h3>Danh sách dịch vụ</h3>

    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Dich vụ</th><th>Giá</th><th></th></tr>";
    
        //biến row lưu một mảng lưu trữ dữ liệu 1 bản ghi, 
        //dùng while để in ra các thông tin lấy được từ row
        while ($row = $result->fetch_assoc()) {
    
            echo "<tr>";
            echo "<td>" . $row["dichvu"] . "</td>";
            echo "<td>" . $row["gia"] . "</td>";
            echo "<td><a href='edit_dichvu.php?id=" . $row["dichvuid"] . "'>Sửa</a> | <a href='delete_dichvu.php?id=" . $row["dichvuid"] . "'>Xóa</a></td>";
            echo "</tr>";
        }
    
        echo "</table>";
    } else {
        echo "Không tìm thấy đơn nào.";
    }
    ?>
    <p><br></p>
</body>
</html>