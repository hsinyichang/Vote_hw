    <style>
        .forgot-h1{
            text-align: center;
            padding-top: 30px;
            font-size: 30px;
            color: #8501F5;
            text-shadow: 2px 2px 3px #E1B8F5;
            font-weight:bolder;
            font-size: 2.5rem;
        }
        .forgot-div{
            width: 500px;
            height: 250px;
            margin: 0 auto;
            font-size: 20px;
            text-align: center;
        }
        .forgot-div p{
            padding-top: 30px;
            font-weight: bolder;
        }
        .forgot-div input{
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
        .forgot-div button{
            width: 68px;
            height:28px;
            background-color:pink;
            border-radius: 10px;
            border: 1px solid pink;
            box-shadow: 5px 5px 6px #F4DDFC;
            color: white;
            font-size: 16px;
            font-weight:bolder;
            position: relative;
            top: 10%;
        }
    </style>
<body>
    <h1 class="forgot-h1">尋回密碼</h1>
    <form action="?do=chk_acc" method="post">
        <div class="forgot-div">
        <p>請輸入你要找回密碼的帳號:</p>
        <input type="text" name='acc' required><br>
        <button type="submit" value="確定">確定</button>
        </div>
    </form>
</body>
