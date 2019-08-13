<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
$servername='localhost';
$serveruser='root';
$serverpass='';
$serverdbname='comments';
$con=mysqli_connect($servername,$serveruser,$serverpass,$serverdbname);
if(!$con){
    die("cannot connect". mysqli_connect_error());
}else{
    //echo "connection successful";
}
if(isset($_POST['editcomment'])){
    $name=$_POST['name'];
    $date=$_POST['date'];
    $message=$_POST['message'];
    $sql="UPDATE comment SET message='$message',date='".date('Y-m-d H:i:s')."' WHERE name='$name' && date='$date'";
$query=mysqli_query($con,$sql);
//echo "<h5 style='color:white'>edited</h5>";
header('location:getcomments.php');
}
?>