<?php
include_once "connect.php";
$pw=base64_encode($_POST['pw']);

$sql="UPDATE `users` 
        SET `pw`='{$pw}',
            `name`='{$_POST['name']}',
            `addr`='{$_POST['addr']}',
            `education`='{$_POST['education']}',
            `passnote`='{$_POST['passnote']}',
            `email`='{$_POST['email']}'
        WHERE `id`='{$_POST['id']}'"; 
                    
$pdo->exec($sql);//登入帳號後把更新的資料存回資料庫

header('location:?do=member_center');

?>