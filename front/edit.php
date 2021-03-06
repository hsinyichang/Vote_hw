    <style>
* {
    box-sizing: border-box;
}

.div {
    font-family: '華康粗圓體';
    margin: 0 auto;
    padding-top: 10px;
    width: 40%;
}

ul>li {
    display: flex;
}

ul {
    font-size: 20px;
}

.memtitle {
    width: 125px;
    padding: 0.5rem 0;
    font-weight: bolder;
}

.memdata {
    width: 409px;
    text-align: center;
    padding: 0.5rem 0;
    color: #B95BC9;
}

input {
    width: 400px;
    height: 38px;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid #eee;
    box-shadow: 1px 1px 8px rgb(243, 208, 237);
    color: #B95BC9;
    text-align: center;
}

.fa-eye {
    margin-left: -25px;
    margin-top: 9px;
}

.edit-btn button {
    width: 68px;
    height: 28px;
    background-color: pink;
    border-radius: 10px;
    border: 1px solid pink;
    box-shadow: 5px 5px 6px #F4DDFC;
    color: white;
    font-size: 16px;
    margin-left: 20px;
    position: relative;
    left: 40%;
    font-weight: bolder;
}
    </style>

    <body>
        <div class="div">
            <h1 style="text-align: center;margin:0 auto 10px auto;
    border-radius: 20px;
    width: 250px;
    animation:slideInDown;
    animation-duration: 0.8s;
    color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;
    font-weight: bolder;">編輯會員資料</h1>
            <?php 
    include_once "connect.php";
    $sql="SELECT * FROM users WHERE id='{$_GET['id']}'";
    $user=$pdo->query($sql)->fetch();
    ?>
            <form action='./front/save_member.php' method="post">
                <ul>
                    <li>
                        <div class="memtitle">帳號</div>
                        <div class="memdata"><?=$user['acc'];?></div>
                        <!--帳號無法更改-->
                    </li>
                    <li>
                        <div class="memtitle">密碼</div>
                        <div class="memdata" style="display: flex;"><input type="password" name="pw" class="iconpw"
                                value="<?=base64_decode($user['pw']);?>"><i class="fa fa-eye" id=togglepassword></i>
                        </div>
                    </li>
                    <li>
                        <div class="memtitle">姓名</div>
                        <div class="memdata"><input type="text" name="name" value="<?=$user['name'];?>"></div>
                    </li>
                    <li>
                        <div class="memtitle">生日</div>
                        <div class="memdata"><input type="date" name="birthday" value="<?=$user['birthday'];?>"></div>
                    </li>
                    <li>
                        <div class="memtitle">性別</div>
                        <div class="memdata">男<input style="width:40px;" type="radio" name="gender" value="1"
                                <?=($user['gender']==1)?'checked':'';?>>
                            女<input style="width: 40px;" type="radio" name="gender" value="0"
                                <?=($user['gender']==0)?'checked':'';?>></div>
                    </li>
                    <li>
                        <div class="memtitle">教育程度</div>
                        <div class="memdata"><input type="text" name="education" value="<?=$user['education'];?>"></div>
                    </li>
                    <li>
                        <div class="memtitle">密碼提示</div>
                        <div class="memdata"><input type="text" name="passnote" value="<?=$user['passnote'];?>"></div>
                    </li>
                    <li>
                        <div class="memtitle">email</div>
                        <div class="memdata"><input type="email" name="email" value="<?=$user['email'];?>"></div>
                    </li>
                </ul>
                <div class="edit-btn">
                    <input type="hidden" name="id" value="<?=$user['id'];?>">
                    <button type="submit">送出</button>
                </div>
            </form>
            <br><br><br><br>
            <script>
            //小圖示顯示密碼
            //抓小圖示id
            const togglepassword = document.querySelector("#togglepassword");
            //抓輸入密碼id
            const pw = document.querySelector(".iconpw");
            //監聽事件
            togglepassword.addEventListener('click', function() {
                //判斷password 還是text
                const type = pw.getAttribute('type') === 'password' ? 'text' : 'password';
                //設定
                pw.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');

            });
            </script>
        </div>
    </body>