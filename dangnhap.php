<?php
session_start();
include("db_connnection.php");
$kq="";
$user="";
$pass= "";
if(isset($_POST["submit"])){
    if(!isset($_POST["user"])){
        $userer = "Bạn chưa nhập tên đăng nhập";
    }else{
        $userer = "";
        $user = trim($_POST["user"]);
    }
    if(!isset($_POST["pass"])){
        $passer = "Bạn chưa nhập mật khẩu";
    }else{
        $passer = "";
        $pass = $_POST["pass"];
    }
    if($userer == "" && $passer==""){
        // Truy vấn cơ sở dữ liệu để lấy thông tin tài khoản
        $sql = "SELECT * FROM taikhoan WHERE tendangnhap LIKE '$user'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if($row["tendangnhap"] == $user && $row["matkhau"] == $pass){
                if($row["level"] == 0){
                    $_SESSION["user"] = $user;
                    $_SESSION["level"] = $row["level"];
                    header("location:trangchu.php");
                }else{
                    $_SESSION["level"] = $row["level"];
                    $_SESSION["user"] = $user;
                    header("location:admin.php");
                }
            }else{
                $kq = "Mật khẩu không đúng";
            }
        }else{
            $kq = "Tài khoản này không tồn tại";
        }
    }else{
        $kq = "Bạn hãy điền đủ các thông tin trước";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
        #dk{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color:azure;
            padding: 40px;
            width: 284px;
            border-radius: 5px;
          
        }
        #nguc .nhap{
            width: 290px;
            height: 30px;
            border: 1px solid #F4A55D;
            border-radius: 3px;
        }
        #nguc p{
            color: red;
        }
        /* #nguc{
            display: flex;
            flex-direction: column;
            justify-content:center;
            align-items: center;
        } */
        #bung{
            display: flex;
            flex-direction: column;
            justify-content:center;
            align-items: center;
        }
        #bung p{
            text-align: center;
        }
        button, .button{
            background-color: #F4A55D;
            border: 0px;
            border-radius: 3px;
            color: azure;
            width: 100px;
            height: 30px;
        }
    </style>
</head>
<body>
    
    <div id="dk">
        <form method="post">
            <h1 style="margin:0px; margin-left:10px;">Đăng nhập</h1>
            <hr>
            <div id="nguc">
                <label>Tên đăng nhập</label><br>
                <input class="nhap" type="text" name="user"
                value="<?php
                        if(isset($_POST["submit"])){
                            echo "".$user."";
                        }
                        ?>"
                >
                <p>
                    <?php
                        if(isset($_POST["submit"])){
                            if($userer){
                                echo "".$userer."";
                            }
                        }
                        ?>
                </p>
                <label>Mật khẩu</label><br>
                <input class="nhap" type="password" name="pass"
                value="<?php
                        if(isset($_POST["submit"])){
                            echo "".$pass."";
                        }
                        ?>"
                >
                <p>
                    <?php
                        if(isset($_POST["submit"])){
                            if($passer){
                                echo "".$passer."";
                            }
                        }
                        ?>
                </p>
            </div>
            <br>
            <div id="bung">
                <input class="button" type="submit" name="submit" value="Đăng nhập">
                <p style="color: red;">
                    <?php
                    if(isset($_POST["submit"])){
                        if($kq){
                            echo "".$kq."";
                        }                    
                    }
                    ?>
                </p>
                <p>Nếu bạn chưa có tài khoản, hãy đăng ký tài khoản để sử dụng dịch vụ</p>
                <button><a style="text-decoration: none; color:aliceblue"  href="dangky.php">Đăng ký</a></button>
            </div>
        </form>
    </div>
</body>
</html>
