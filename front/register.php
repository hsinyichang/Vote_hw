<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
</head>
<body>
    <h1>會員註冊</h1>
<form action="?do=store_member" method="post">
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id=""></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id=""></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td>生日</td>
            <td><input type="date" name="birthday" id=""></td>
        </tr>
        <tr>
            <td>性別</td>
            <td>男<input type="radio" name="gender" value="1">
            女<input type="radio" name="gender" value="0"></td>
        </tr>
        <tr>
            <td>地址</td>
            <td><input type="text" name="addr" id=""></td>
        </tr>
        <tr>
            <td>教育程度</td>
            <td><input type="text" name="education" id="" placeholder="國小/國中/高中/大學/碩士"></td>
        </tr>
        <tr>
            <td>註冊時間</td>
            <td><input type="date" name="reg_date" id="" ></td>
        </tr>
        <tr>
            <td>密碼提示</td>
            <td><input type="text" name="passnote" id=""></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type="email" name="email" id=""></td>
        </tr>
    </table>
    <div>
        <input type="submit" value="註冊"><input type="reset" value="重置">
    </div>
</form>
</body>
</html>