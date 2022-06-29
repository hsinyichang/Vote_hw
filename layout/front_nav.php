<nav>
        <div><a href="index.php"><i class="fa-solid fa-house"></i>回首頁</a></div>
        <div><a href="index.php"><i class="fa-solid fa-bars"></i>投票列表</a></div>
        <?php
        // include_once "connect.php";/*放到程式開頭，因裡面有session start */
        if(isset($_SESSION['user'])){/*這裡判斷是否有session為登出或登入 */
        ?>
    <div><a href="../login/member_center.php"><i class="fa-solid fa-circle-user"></i>會員中心</a><a href="../login/logout.php"><i class="fa-solid fa-circle-user"></i>登出</a></div>
        <?php
        }else{
        ?>
    <div><a href="../login/login.php"><i class="fa-solid fa-circle-user"></i>登入</a></div>
        <?php    
        }
        ?>

        <?php
        // include_once "connect.php";/*放到程式開頭，因裡面有session start */
        if(!isset($_SESSION['user'])){/*這裡判斷是否有session為登出或登入 */
        ?>
    <div><a href="../backlogin/login.php"><i class="fa-solid fa-circle-user"></i>後台管理</a></div>
        <?php
        }else{
           
        }
        ?>
        
    </nav>