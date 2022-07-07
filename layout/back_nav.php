<nav>
        <?php
        if(isset($_SESSION['admin'])){ //有登入才顯示
        ?>
        <div><a href="back.php"><i class="fa-solid fa-house"></i>回首頁</a></div>
        <div><a href="?do=add_vote"><i class="fa-solid fa-plus"></i>新增投票</a></div>
        <div><a href="?do=admin_type"><i class="fa-solid fa-database"></i>分類管理</a></div>
        <?php
        }
        ?>
        
        <?php 
        if(isset($_SESSION['admin'])){
        ?>
            <div><a href="?do=logout"><i class="fa-solid fa-circle-user"></i>登出</a></div>
        <?php
        }else{//沒登入狀態
        ?>
        <div><a href="?do=login"><i class="fa-solid fa-circle-user"></i>登入</a></div>
    <?php
    }
    ?>
    <div><a href="./index.php"><i class="fa-solid fa-circle-user"></i>前台首頁</a></div>  <!--沒登入狀態-->

</nav>