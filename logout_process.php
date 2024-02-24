<?php
// Xử lý đăng xuất ở đây (ví dụ: xóa session, cookie, v.v.)
session_start();
if(!isset($_SESSION["user"])){
    header("location:dangnhap.php");
}
session_destroy();
header('Location: trangchu.php');
exit;
?>
