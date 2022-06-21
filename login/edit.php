<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯會員資料</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            background: #43C6AC;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #F8FFAE, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #F8FFAE, #43C6AC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .div{
            font-family: '華康粗圓體';
            margin: auto;
            padding: 10px;
            width: 380px;
            background-color:rgb(250 240 158 / 50%);
            height: 500px;
            border-radius: 24px;
            box-shadow: 2px 2px 10px rgb(0 0 0 / 50%), inset 1px 1px 2px rgb(255 255 255 / 50%);
            
        }

    </style>

</head>
<body>
    <div class="div">
    <h1>編輯會員資料</h1>
    <?php 
    include_once "connect.php";
    $sql="SELECT * FROM users WHERE id='{$_GET['id']}'";
    $user=$pdo->query($sql)->fetch();
    ?>
<form action="save_member.php" method="post">
    <table>
        <tr>
            <td>帳號</td>
            <td><?=$user['acc'];?></td><!--帳號無法更改-->
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" value="<?=$user['pw'];?>"></td>
        </tr>
        <tr>
            <td>生日</td>
            <td><input type="date" name="birthday" value="<?=$user['birthday'];?>"></td>
        </tr>
        <tr>
            <td>密碼提示</td>
            <td><input type="text" name="passnote" value="<?=$user['passnote'];?>"></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type="email" name="email" value="<?=$user['email'];?>"></td>
        </tr>
    </table>
    <div>
        <input type="hidden" name="id" value="<?=$user['id'];?>">
        <input type="submit" value="送出"><input type="reset" value="重置">
    </div>
</form>
</div>
</body>
</html>