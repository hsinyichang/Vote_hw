<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <style>
        .reg-h1{
            text-align: center;
            padding-top: 30px;
            font-size: 30px;
            color: #8501F5;
            text-shadow: 2px 2px 3px #E1B8F5;
            font-weight:bolder;
            font-size: 2.5rem;
        }
        .reg-table{
            width: 500px;
            margin: 0 auto;
            font-size: 20px;
        }
        .reg-table td{
            padding-top: 15px;
            
        }
        .reg-table td>input{
            text-align: center;
            padding: 0.3rem 0;
            color: #B95BC9;
            width: 395px;
            height: 38px;
            font-size: 18px;
            border-radius: 10px;
            border: 1px solid #eee;
            box-shadow: 1px 1px 8px rgb(243, 208, 237);
            color: #B95BC9;
            text-align: center;
        }
        .reg-td1{
            width: 100px;
            font-weight: bolder;
        }
        .reg-td2{
            width: 400px;
        }
        .reg-divbtn button{
            width: 68px;
            height:28px;
            background-color:pink;
            border-radius: 10px;
            border: 1px solid pink;
            box-shadow: 5px 5px 6px #F4DDFC;
            color: white;
            font-size: 16px;
            margin-left: 20px;
            position: relative;
            left: 156px;
            font-weight:bolder;
        }
        .reg-divbtn{
            width: 500px;
            margin: 20px auto;
        }
        .reg-divbtn button:hover{
            cursor: pointer;
    background-color: #FFA6E0;
        }
        

    </style>
</head>
<body>
    <h1 class="reg-h1">會員註冊</h1>
<form action="?do=store_member" method="post">
    <table class="reg-table">
        <tr>
            <td class="reg-td1">帳號</td>
            <td class="reg-td2"><input type="text" name="acc" id="" required></td>
        </tr>
        <tr>
            <td class="reg-td1">密碼</td>
            <td><input type="password" name="pw" id="" required pattern="[a-zA-Z0-9]{6,}" title="請輸入至少6位數密碼"></td>
        </tr>
        <tr>
            <td class="reg-td1">姓名</td>
            <td><input type="text" name="name" id="" required></td>
        </tr>
        <tr>
            <td class="reg-td1">生日</td>
            <td><input type="date" name="birthday" id="" required></td>
        </tr>
        <tr>
            <td class="reg-td1">性別</td>
            <td>男<input style="width: 40px;border-radius:40px" type="radio" name="gender" value="1" required>
            女<input style="width: 40px;" type="radio" name="gender" value="0" required></td>
        </tr>
        <tr>
            <td class="reg-td1">教育程度</td>
            <td><input type="text" name="education" id="" placeholder="國小/國中/高中/大學/碩士" required></td>
        </tr>
        <tr>
            <td class="reg-td1">密碼提示</td>
            <td><input type="text" name="passnote" id="" required></td>
        </tr>
        <tr>
            <td class="reg-td1">email</td>
            <td><input type="email" name="email" id="" required></td>
        </tr>
    </table>
    <div class="reg-divbtn">
        <button type="submit" value="註冊">註冊</button><button type="reset" value="重置">清除</button>
    </div>
    <br><br><br><br><br>
</form>
</body>
</html>