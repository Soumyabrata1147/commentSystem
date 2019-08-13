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
//getting the values
if(isset($_POST['comment'])){
$name=$_SESSION['name'];
$date=$_POST['date'];
$message=$_POST['message'];
}
//inserting the data in db
$sql="INSERT INTO comment (name,date,message) VALUES ('$name','$date','$message')";
$query=mysqli_query($con,$sql);
header('location:getcomments.php');
?>