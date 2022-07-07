<?php
//檢查帳密是否正確
include "connect.php";
$acc=$_POST['acc'];

$sql="SELECT * FROM `admins` WHERE `acc`='$acc'";

$user=$pdo->query($sql)->fetch();

//$user=0,null,[],""  //true

if(empty($user)){
    echo "查無此帳號";
}else{
   echo "請聯絡該管理者<br>";
}

?>
<a href="../back.php">回首頁</a><a href="?do=login">重新登入</a>