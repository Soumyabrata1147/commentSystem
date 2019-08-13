<?php
session_start();

if(isset($_POST['delete'])){
    $name=$_POST['name'];
    $date=$_POST['date'];
}
echo "<form method='post' action='delete.php'>
    <input name='name' type='hidden' value='".$name."'>
    <input name='date' type='hidden' value='".$date."'>
    <div class='del'>Do you want to delete??</div>
    <input name='deletecomment' type='submit' value='Delete'>
    <input name='no' type='submit' value='No'>
    </form>";
?>