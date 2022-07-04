<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
    <style>
        .memberdiv{
            width: 40%;
            margin: 0 auto;
            padding-top: 10px;
        }
    </style>
    
</head>
<body>
    <div class="memberdiv">
    
    <h1 style="text-align:center ;">會員中心</h1>
    <?php
    include "connect.php";//session_start()已寫在裡面了
    ?>

    <p style="text-align:center;">歡迎<?=$_SESSION['user'];?>,祝你有美好的一天</p>

    <?php
    $sql="SELECT * FROM `users` where acc='{$_SESSION['user']}'";
    $user=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    echo '<hr>';
    echo '<table>';
    echo '<tr>';
    echo '<td>ID:</td><td>'.$user['id'].'</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>帳號:</td><td>'.$user['acc'].'</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>密碼:</td><td>******</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>姓名:</td><td>'.$user['name'].'</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>生日:</td><td>'.$user['birthday'].'</td>';
    echo '<tr>';
    if($user['gender']==0){
        echo '<td>性別:</td><td>女</td>';
    }else{
        echo '<td>性別:</td><td>男</td>';
    }
    echo '</tr>';
    echo '<tr>';
    echo '<td>地址:</td><td>'.$user['addr'].'</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>教育程度:</td><td>'.$user['education'].'</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>註冊時間:</td><td>'.$user['reg_date'].'</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>密碼提示:</td><td>'.$user['passnote'].'</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>E-mail:</td><td>'.$user['email'].'</td>';
    echo '</tr>';
    echo '</table>';
    ?>
    <button type="button" onclick="location.href='?do=edit&id=<?=$user['id'];?>'">編輯</button>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <a class="remove" href='remove_acc.php?id=<?=$user['id'];?>'>移除個人資料</a>

    <!--
     
    <form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?=$user['id'];?>">
    <input type="submit" value="編輯">
    </form>  第二種
    
    重新導向
    <button onclick="location.href='edit.php?id=<?=$user['id'];?>'">編輯</button>  第三種
    -->
</div>
</body>
</html>