<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            background: #43C6AC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #F8FFAE, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #F8FFAE, #43C6AC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        div{
            font-family: '華康粗圓體';
            margin: auto;
            padding: 10px;
            width: 380px;
            background-color:rgb(250 240 158 / 50%);
            height: 500px;
            border-radius: 24px;
            box-shadow: 2px 2px 10px rgb(0 0 0 / 50%), inset 1px 1px 2px rgb(255 255 255 / 50%);
            
        }
        nav{
            text-align: right;
            padding-bottom: 25px;
        }
        h1{
            text-align: center;
        }
        .remove{
            color:#eee;
        }
        .remove:hover{
            color:red;
        }
    </style>
</head>
<body>
    <div>
    <nav><a href="../index.php">回首頁</a>&nbsp;&nbsp;<a href="logout.php">登出</a></nav>
    <h1>會員中心</h1>
    <?php
    include "connect.php";//session_start()已寫在裡面了
    ?>

    <p style="text-align:center;">歡迎<?=$_SESSION['user'];?>,祝你有美好的一天</p>

    <?php
    $sql="SELECT * FROM `users` where acc='{$_SESSION['user']}'";
    $user=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    echo '<hr>';
    echo 'ID:'.$user['id'].'<br>';
    echo '帳號:'.$user['acc'].'<br>';
    echo '密碼:******<br>';
    echo '姓名:'.$user['name'].'<br>';
    echo '生日:'.$user['birthday'].'<br>';
    if($user['gender']==0){
        echo '性別:女'.'<br>';
    }else{
        echo '性別:男'.'<br>';
    }
    echo '地址:'.$user['addr'].'<br>';
    echo '教育程度:'.$user['education'].'<br>';
    echo '註冊時間:'.$user['reg_date'].'<br>';
    echo '密碼提示:'.$user['passnote'].'<br>';
    echo 'E-mail:'.$user['email'].'<br>';
    ?>
    <button><a href="edit.php?id=<?=$user['id'];?>">編輯</a></button>

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