<?php
//檢查帳密是否正確
include "connect.php";
$acc=$_POST['acc'];

$sql="SELECT * FROM `users` WHERE `acc`='$acc'";

$user=$pdo->query($sql)->fetch();

//$user=0,null,[],""  //true

?>
<div class="chk-acc">
<?php
if(empty($user)){
?> 
    
        <p>查無此帳號</p>
    <?php
    }else{
    ?>
        <p><span><?=$user['name']?></span>　您當初提供的密碼提示為:<br>
         <input type="text" value="<?=$user['passnote']?>" readonly>   </p>
    <?php
    }
    ?>

    <a href="./index.php"><button type="button">回首頁</button></a>
    <a href="?do=login"><button>重新登入</button></a>

    </div>