<nav>
        <div><a href="back.php"><i class="fa-solid fa-bars"></i>投票列表</a></div>
        <div><a href="?do=add_vote"><i class="fa-solid fa-plus"></i>新增投票</a></div>
        <div><a href="?do=admin_type"><i class="fa-solid fa-database"></i>分類管理</a></div>
        <?php if(isset($_SESSION['admin'])){
        ?>
            <div><a href="../backlogin/logout.php"><i class="fa-solid fa-circle-user"></i>登出</a></div>
        <?php
        }else{
        ?>
        <div><a href="../backlogin/login.php"><i class="fa-solid fa-circle-user"></i>登入</a></div>
    <?php
    }
    ?>

        </nav>