<?php
include_once "connect.php";
$pw=md5($_POST['pw']);

$sql="UPDATE `users` 
        SET `pw`='{$pw}',
            `addr`='{$_POST['addr']}',
            `education`='{$_POST['education']}',
            `passnote`='{$_POST['passnote']}',
            `email`='{$_POST['email']}'
        WHERE `id`='{$_POST['id']}'"; 
                    
$pdo->exec($sql);//登入帳號後把更新的資料存回資料庫

header('location:?do=member_center');

?>