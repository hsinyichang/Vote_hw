
    <style>
        
        body{
            font-family: '華康粗圓體';
        }
        p{
            padding-top:74px ;
            text-align:center;
            font-size: 2.5rem;
            
            
        }
        .login{
            
            margin: auto;
            width:380px;
            height: 350px;
        }
        table{
            background-color:rgba(249 , 199, 238, 0.4);
            margin:auto;
            width:380px;
            height: 300px;
            border-radius: 24px;
            box-shadow: 5px 5px 6px #F4DDFC;
            font-size: 23px;
            border: 1px solid white;
        }
        input{
            width: 254px;
            height: 40px;
            border: 1px solid gray;
            border-radius: 12px;
            font-size: 20px;
            color: #43C6AC;
            padding-left: 10px;
        }
        input::-webkit-input-placeholder {
        color: #b9b9b9;    /* 更改placeholder的字體顏色  */
        font-size:22px;    /* 更改placeholder的字體大小  */
        text-align: left;
        }
        table td{
            padding:1rem;
            
        }
        .td1{
            width: 30%;
            text-align: right;
        }
        .td2{
           padding-top: 35px;
            height: 80px;
            
        }
        .td3{
            text-align: center;
            font-size: 15px;
        }

        
        .btns{
            margin-top: 20px;
            text-align: center;
            
        }
        table button{
            width: 100px;
            font-size: 28px;
            background-color: pink;
            border: 1px solid white;
            box-shadow: 2px 2px 2px #E9C8FD;
            border-radius: 20px;
            cursor: pointer;
            color: white;
        }
        table button:hover{
            background-color: #FFA6E0
        }
        .fa-regular{
        animation:fadeIn;
        animation-duration: 0.7s;
        animation-iteration-count: infinite;
        }
        .fa-eye{
            margin-left: -32px;
        }
    </style>
<body>
    <div class="login">
        <p><i class="fa-regular fa-bell" style="color:orange ;"></i>&nbsp;<span style="font-weight: bolder;text-align: center;
    color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;">管理者登入</span></p>
    <?php

if(isset($_GET['error'])) {
    echo "<h2 style='color:red;text-align:center'>{$_GET['error']}</h2>";
}
    ?>
    <form action='./back/chk_login.php' method="post">
        <table>
            <tr>        
                <td class="td2">
            　　<input type="text" name="acc" id="acc" placeholder="帳號" required title="請填寫帳號">
                </td>
            </tr>
            <tr>
                <td class="td2">
            　　<input type="password" name="pw" id="iconpw" placeholder="密碼" required title="請填寫密碼"><i class="fa fa-eye" id=togglepassword></i>
                </td>
            </tr>
            <tr>
                <td class="td3"></td>
                
            </tr>
            <tr>
                <td class='btns'><button type="submit">登入</button>
            </td>
            </tr>
        </table>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        //小圖示顯示密碼
        //抓小圖示id
        const togglepassword=document.querySelector("#togglepassword");
        //抓輸入密碼id
        const pw=document.querySelector("#iconpw");
        //監聽事件
        togglepassword.addEventListener('click',function(){
            //判斷password 還是text
            const type=pw.getAttribute('type')==='password'?'text':'password';
            //設定
            pw.setAttribute('type',type);
            this.classList.toggle('fa-eye-slash');
            
        });

        $('#acc').focus(function(){
            $('#acc').css("background","#FDFBE6");
        });
        $('#acc').blur(function(){
            $('#acc').css("background","");
        });
        $('#iconpw').focus(function(){
            $('#iconpw').css("background","#FDF7E6");
        });
        $('#iconpw').blur(function(){
            $('#iconpw').css("background","");
        });

    </script>
</div>
</body>