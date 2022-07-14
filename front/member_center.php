    <style>
        .memberdiv{
            width: 40%;
            margin: 0 auto;
            padding-top: 10px;
        }
        ul>li{
            display: flex;
        }
        ul{
            font-size:20px;
        }
        .memtitle{
            width: 125px;
            padding: 0.5rem 0;
            font-weight: bolder;
        }
        .memdata{
            width: 409px;
            text-align: center;
            padding: 0.5rem 0;
        }
        input{
            width: 400px;
            height: 38px;
            font-size: 18px;
            border-radius: 10px;
            border: 1px solid #eee;
            box-shadow: 1px 1px 8px rgb(243, 208, 237);
            background-color:rgba(241, 227, 239, 0.4);
            color: #B95BC9;
            text-align: center;
        }
        span:hover{
            font-size: 1.3rem;
        }
    </style>

<body>
    <div class="memberdiv">
    
    <h1 style="text-align: center;
    margin:0 auto 10px auto;
    border-radius: 20px;
    width: 200px;
    animation:slideInDown;
    animation-duration: 0.8s;
    color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;
    font-weight: bolder;">會員中心</h1>
    <?php
    include "connect.php";//session_start()已寫在裡面了
    ?>
    <?php
    $sql="SELECT * FROM `users` where acc='{$_SESSION['user']}'";
    $user=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    
    echo '<ul>';
    echo '<li>';
    echo '<div class="memtitle">帳號:</div><div class="memdata"><input type="text" value="'.$user['acc'].'" readonly ></div>';
    echo '</li>';
    echo '<li>';
    echo '<div class="memtitle">密碼:</div><div class="memdata"><input type="text" value="*********" readonly ></div>';
    echo '</li>';
    echo '<li>';
    echo '<div class="memtitle">姓名:</div><div class="memdata"><input type="text" value="'.$user['name'].'" readonly ></div>';
    echo '</li>';
    echo '<li>';
    echo '<div class="memtitle">生日:</div><div class="memdata"><input type="text" value="'.$user['birthday'].'" readonly ></div>';
    echo '<li>';
    if($user['gender']==0){
        echo '<div class="memtitle">性別:</div><div class="memdata"><input type="text" value="女" readonly ></div>';
    }else{
        echo '<div class="memtitle">性別:</div><div class="memdata"><input type="text" value="男" readonly ></div>';
    }
    echo '</li>';
    echo '<li>';
    echo '<div class="memtitle">教育程度:</div><div class="memdata"><input type="text" value="'.$user['education'].'" readonly ></div>';
    echo '</li>';
    echo '<li>';
    echo '<div class="memtitle">密碼提示:</div><div class="memdata"><input type="text" value="'.$user['passnote'].'" readonly ></div>';
    echo '</li>';
    echo '<li>';
    echo '<div class="memtitle">E-mail:</div><div class="memdata"><input type="text" value="'.$user['email'].'" readonly ></div>';
    echo '</li>';
    echo '</ul>';
    ?>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <a class="remove" href="javascript:
            swal.fire({
            title:'確定要刪除帳號?',
            icon:'warning',
            text:'刪除就回不去了~~',
            showCancelButton: true,
            confirmButtonText: '刪除',
            cancelButtonText: '取消',
            }).then((result)=>{
                if(result.isConfirmed){
                window.location.href='?do=remove_acc&id=<?=$user['id'];?>';
                }else if(result.dismiss === Swal.DismissReason.cancel){
                    
                }
            });" style="text-decoration: none;"><span style="color: red;">移除個人資料</span></a>

    <!--
     
    <form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?=$user['id'];?>">
    <input type="submit" value="編輯">
    </form>  第二種
    
    重新導向
    <button onclick="location.href='edit.php?id=<?=$user['id'];?>'">編輯</button>  第三種
    -->
<br><br><br><br><br><br><br><br>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.js"
        integrity="sha512-Kyb4n9EVHqUml4QZsvtNk6NDNGO3+Ta1757DSJqpxe7uJlHX1dgpQ6Sk77OGoYA4zl7QXcOK1AlWf8P61lSLfQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
</body>
