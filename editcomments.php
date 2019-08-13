<?php
session_start();

if(isset($_POST['edit'])){
    $name=$_POST['name'];
    $date=$_POST['date'];
    $message=$_POST['message'];
}
echo "<form method='post' action='edit.php'>
    <input name='name' type='hidden' value='".$name."'>
    <input name='date' type='hidden' value='".$date."'>
    <textarea name='message'>".$message."</textarea>
    <input name='editcomment' type='submit' value='Edit'>
    </form>";
?>