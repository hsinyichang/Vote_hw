<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯會員資料</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
<form action='?do=save_member' method="post">
    <table>
        <tr>
            <td>帳號</td>
            <td><?=$user['acc'];?></td><!--帳號無法更改-->
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" class="iconpw" value="<?=$user['pw'];?>"><i class="fa fa-eye" id=togglepassword></i></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name" value="<?=$user['name'];?>"></td>
        </tr>
        <tr>
            <td>生日</td>
            <td><input type="date" name="birthday" value="<?=$user['birthday'];?>"></td>
        </tr>
        <tr>
        <td>性別</td>
            <td>男<input type="radio" name="gender" value="1" <?=($user['gender']==1)?'checked':'';?>>
            女<input type="radio" name="gender" value="0" <?=($user['gender']==0)?'checked':'';?>></td>
        </tr>
        <tr>
            <td>地址</td>
            <td><input type="text" name="addr" value="<?=$user['addr'];?>"></td>
        </tr>
        <tr>
            <td>教育程度</td>
            <td><input type="text" name="education" value="<?=$user['education'];?>"></td>
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
<script>
        //小圖示顯示密碼
        //抓小圖示id
        const togglepassword=document.querySelector("#togglepassword");
        //抓輸入密碼id
        const pw=document.querySelector(".iconpw");
        //監聽事件
        togglepassword.addEventListener('click',function(){
            //判斷password 還是text
            const type=pw.getAttribute('type')==='password'?'text':'password';
            //設定
            pw.setAttribute('type',type);
            this.classList.toggle('fa-eye-slash');
            
        });
    </script>
</div>
</body>
</html>