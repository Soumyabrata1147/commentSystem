<?php
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
if(isset($_POST['no'])){
    header('location:getcomments.php');
}
if(isset($_POST['deletecomment'])){
    $name=$_POST['name'];
    $date=$_POST['date'];
    $sql="DELETE FROM comment WHERE name='$name' && date='$date'";
$query=mysqli_query($con,$sql);
header('location:getcomments.php');
}


?>