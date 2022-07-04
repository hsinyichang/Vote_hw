<nav>
        <div><a href="index.php"><i class="fa-solid fa-house"></i>回首頁</a></div>
        <div><a href="?do=vote_list"><i class="fa-solid fa-bars"></i>投票列表</a></div>
        <?php
        // include_once "connect.php";/*放到程式開頭，因裡面有session start */
        if(isset($_SESSION['user'])){/*這裡判斷是否有session為登出或登入 */
        ?>
    <div><a href='?do=member_center'><i class="fa-solid fa-circle-user"></i>會員中心</a>
         <a href='?do=logout'><i class="fa-solid fa-circle-user"></i>登出</a>
    </div>
        <?php
        }else{
        ?>
    <div><a href='?do=login'><i class="fa-solid fa-circle-user"></i>登入</a></div>
        <?php    
        }
        ?>

        <?php
        // include_once "connect.php";/*放到程式開頭，因裡面有session start */
        if(!isset($_SESSION['user'])){/*這裡判斷是否有session為登出或登入 */
        ?>
    <div><a href="../back.php"><i class="fa-solid fa-circle-user"></i>後台管理</a></div>
        <?php
        }else{
           
        }
        ?>
        
</nav>