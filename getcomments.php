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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel='stylesheet' href='getcomments.css'>
</head>
<body>
<?php
echo "<div class='getcommentform2'>";
   echo" <form method='post' action='setcomments.php'>
    <input name='name' type='hidden'>
    <input name='date' type='hidden' value='".date('Y-m-d H:i:s')."'>
    <input class='inputmessage' name='message' placeholder='Add a comment'type='text'><br>
    <input class='btn' name='comment' type='submit' value='Comment'>
    </form><br>";
   $count="SELECT * FROM comment";
   $count_query=mysqli_query($con,$count);
   $rows_count=mysqli_num_rows($count_query);
   echo "<p class='heading'>All"." ". "Comments(".$rows_count.")</p>";
   echo "</div>";
   ?>
<?php
//inserting the data in db
$sql="SELECT * FROM comment";
$query=mysqli_query($con,$sql);
while($rows=mysqli_fetch_assoc($query)){
    echo "<div class='getcommentform'>";
echo "<p class='name'>".$rows['name']."&nbsp;"."&nbsp;"."<span class='date'>". $rows['date'] ."</span>"."</p>";
echo "<p class='message'>".$rows['message']."</p>";
if($_SESSION['name']==$rows['name']){
    //if username matches the name in the comment then show edit and delete
    echo "<form method='post' action='editcomments.php'>
    <input name='name' type='hidden' value='".$rows['name']."'>
    <input name='date' type='hidden' value='".$rows['date']."'>
    <input name='message' type='hidden' value='".$rows['message']."'>
    <input name='edit' type='submit' value='Edit'>
    </form>";
    echo "<form method='post' action='deletecomments.php'>
    <input name='name' type='hidden' value='".$rows['name']."'>
    <input name='date' type='hidden' value='".$rows['date']."'>
    <input name='delete' type='submit' value='Delete'>
    </form>";
}
    echo "</div>";
}
?>
</body>
</html>
