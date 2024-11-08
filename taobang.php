<?php
include("db_connnection.php");

$sql = 
"CREATE TABLE taikhoan (
    taikhoanid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hoten VARCHAR(50) NOT NULL,
    sdt VARCHAR(10) NOT NULL,
    thanhpho VARCHAR(30),
    tendangnhap VARCHAR(50) NOT NULL,
    matkhau VARCHAR(30) NOT NULL,
    level INT(6)
)";


// $sql = "CREATE TABLE dondat (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     hoten VARCHAR(50) NOT NULL,
//     sdt VARCHAR(10) NOT NULL,
//     dichvu VARCHAR(50) NOT NULL,
//     ngaysua DATE NOT NULL,
//     tinhtrang INT(6),
//     taikhoanid INT(6) UNSIGNED,
//     dichvuid INT,
//     gia INT(6),
//     FOREIGN KEY (taikhoanid) REFERENCES taikhoan(taikhoanid),
//     FOREIGN KEY (dichvuid) REFERENCES dichvu(dichvuid)
// )";


// $sql = "CREATE TABLE dichvu (
//     dichvuid INT AUTO_INCREMENT PRIMARY KEY,
//     dichvu VARCHAR(50) NOT NULL,
//     gia INT(6)
// )";


// $sql = "INSERT INTO taikhoan (taikhoanid, hoten, sdt, thanhpho, tendangnhap, matkhau, level)
// VALUES ('', 'CRAZY COMPANY', '01873535645', 'Hà Nội', 'cc123', '123456', 1)";

if($conn ->query($sql)==true){
    echo "tao thanh cong";
}else{
    echo "tao that bai";
}
?>