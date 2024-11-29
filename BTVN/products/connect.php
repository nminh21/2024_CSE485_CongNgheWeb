<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'php';

$conn = new mysqli($host, $user, $password, $database);

if($conn)
{
    mysqli_query($conn, "SET NAMES 'utf8' ");
    echo 'Đã kết nối thành công';
}
else 
{
    echo 'Kết nối thất bại';
}
?>