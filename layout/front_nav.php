<nav>
        <div><a href="index.php"><i class="fa-solid fa-house"></i>回首頁</a></div>
        <div><a href="?do=vote_list"><i class="fa-solid fa-bars"></i>投票列表</a></div>
        <?php
        // include_once "connect.php";/*放到程式開頭，因裡面有session start */
        if(isset($_SESSION['user'])){/*這裡判斷是否有session為登出或登入 */
        ?>
    <div>
        <a href="#" id="membercenter"><i class="fa-solid fa-circle-user"></i>會員中心</a>
        <div class="dropdown-menu">
            <li><a href="?do=member_center">編輯會員資料</a></li>
            <li><a href="?do=vote_log">查看已投票主題</a></li>
            <li><hr></li>
            <li><a href='?do=logout'><i class="fa-solid fa-circle-user"></i>登出</a></li>
        </div>
        
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
    <div><a href="./back.php"><i class="fa-solid fa-circle-user"></i>後台管理</a></div>
        <?php
        }else{
           
        }
        ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('#membercenter').click(function(){
                $(this).next().toggle();  
                //next 同層的下一個  都在div裡 h1下一個就是ul
                //children() 小孩層 最接近 li
            });
        </script>
        
</nav>