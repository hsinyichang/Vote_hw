<?php
include_once "connect.php";
$acc=$_POST['acc'];
$pw=md5($_POST['pw']);//編碼過的密碼

$sql="INSERT INTO `users` (`acc`,`pw`,`name`,`birthday`,`gender`,`addr`,`education`,`reg_date`,`passnote`,`email`) 
                    values('{$_POST['acc']}','$pw','{$_POST['name']}','{$_POST['birthday']}','{$_POST['gender']}','{$_POST['addr']}','{$_POST['education']}','{$_POST['reg_date']}','{$_POST['passnote']}','{$_POST['email']}');";

$pdo->exec($sql);

header('location:?do=login');

?>