<?php

include_once "./api/base.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票管理中心</title>
    <!--使用拆分css檔案的方式來區分共用的css設定及前後台不同的css-->
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/back.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<style>
    h1{
    text-align: center;
    margin:0 auto 10px auto;
    border-radius: 20px;
    width: 200px;
    animation:slideInDown;
    animation-duration: 0.8s;
    color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;
    padding-top:2rem;
    }
</style>
</head>

<body>
<div id="header">
    <?php 
    include "./layout/back_nav.php";
    ?>
</div>
    <div id="container">
    <?php
    include "./layout/slider.php";
if(isset($_GET['do'])){//根據網址有沒有帶do這個參數來決定要include那個外部檔案
    $file="./back/".$_GET['do'].".php";// 按下button 觸發onclick事件 帶入query string
}                                    // 有GET到do這個參數↓
    if(isset($file) && file_exists($file)){//先檢查是否有file此變數且此檔案是否存在
        include $file;// 則include 變數file這個檔案，直接把此檔案放進來這個頁面
    }else{
        if(!isset($_SESSION['admin'])){
            include "./back/login.php";
        }else{

$p="";
if(isset($_GET['p'])){
    $p="&p={$_GET['p']}";
}
$querystr="";
if(isset($_GET['order'])){
    $querystr="&order={$_GET['order']}&type={$_GET['type']}";
}

$queryfilter="";
if(isset($_GET['filter'])){  //分類
    $queryfilter="&filter={$_GET['filter']}";
}


?>
<div>
    <h1 class="h1">後台管理</h1>
    <div class="type">
        <label for="types">分類：</label>
        <select name="types" class="pretty-select" id="types" onchange="location.href=`?do=vote_list&filter=${this.value}&p=1<?=$querystr;?>`">
            <option value="0">全部</option>
        <?php
            $types=all("types");
            foreach($types as $type){
                $selected=(isset($_GET['filter']) && $_GET['filter']==$type['id'])?'selected':'';
                echo "<option value='{$type['id']}' $selected>";
                echo $type['name'];
                echo "</option>";
            }
            ?>
        </select>
    </div>
        <ul class='list'>
            <li class='list-header'>
                <div>投票主題</div>
                <?php
                if(isset($_GET['type']) && $_GET['type']=='asc'){
                ?>
                <div><a href="?do=vote_list&order=multiple&type=desc<?=$p;?><?=$queryfilter;?>">單/複選題 <i class="fa-solid fa-arrow-right-arrow-left"></i></a></div>
                <?php
                }else{
                ?>
                <div><a href="?do=vote_list&order=multiple&type=asc<?=$p;?><?=$queryfilter;?>">單/複選題 <i class="fa-solid fa-arrow-right-arrow-left"></i></a></div>
                <?php
                }
                ?>
                <?php
                if(isset($_GET['type']) && $_GET['type']=='asc'){
                ?>
                <div><a href="?do=vote_list&order=end&type=desc<?=$p;?><?=$queryfilter;?>">投票期間 <i class="fa-solid fa-arrow-right-arrow-left"></i></a></div>
                <?php
                }else{
                ?>
                <div><a href="?do=vote_list&order=end&type=asc<?=$p;?><?=$queryfilter;?>">投票期間 <i class="fa-solid fa-arrow-right-arrow-left"></i></a></div>   
                <?php
                }
                ?>
                <?php
                if(isset($_GET['type']) && $_GET['type']=='asc'){
                ?>
                    <div><a href="?do=vote_list&order=remain&type=desc<?=$p;?><?=$queryfilter;?>">剩餘天數 <i class="fa-solid fa-arrow-right-arrow-left"></i></a></div> 
                <?php 
                }else{
                ?>
                    <div><a href="?do=vote_list&order=remain&type=asc<?=$p;?><?=$queryfilter;?>">剩餘天數 <i class="fa-solid fa-arrow-right-arrow-left"></i></a></div>
                <?php
                    }
                ?>
                <?php
                if(isset($_GET['type']) && $_GET['type']=='asc'){
                ?>
                <div><a href='?do=vote_list&order=total&type=desc<?=$p;?><?=$queryfilter;?>'>投票人數 <i class="fa-solid fa-arrow-right-arrow-left"></i></a></div>
                <?php
                }else{
                ?>
                <div><a href='?do=vote_list&order=total&type=asc<?=$p;?><?=$queryfilter;?>'>投票人數 <i class="fa-solid fa-arrow-right-arrow-left"></i></a></div>
                <?php
                }
                ?>
                <div>前台顯示</a></div>
            </li>
        <?php
            //偵測是否需要排序
            $orderStr='';
            if(isset($_GET['order'])){
                $_SESSION['order']['col']=$_GET['order'];
                $_SESSION['order']['type']=$_GET['type'];

                if($_GET['order']=='remain'){
                    $orderStr=" ORDER BY DATEDIFF(`end`,now()) {$_SESSION['order']['type']}";
                }else{
                    $orderStr=" ORDER BY `{$_SESSION['order']['col']}` {$_SESSION['order']['type']}";
                }
                

            }
            //使用all()函式來取得資料表subjects中的所有資料，請參考base.php中的函式all($table,...$arg)

            /**建立分頁所需的變數群
             * 
             * 
             * 
             */

            $filter=[];
            if(isset($_GET['filter'])){
                if(!$_GET['filter']==0){
                    $filter=['type_id'=>$_GET['filter']];
                }
            }

            $total=math('subjects','count','id',$filter);
            $div=5;
            $pages=ceil($total/$div);
            $now=isset($_GET['p'])?$_GET['p']:1;
            $start=($now-1)*$div;
            $page_rows=" limit $start,$div";


            $subjects=all('subjects',$filter,$orderStr . $page_rows);

            //使用迴圈將每一筆資料的內容顯示在畫面上
            foreach($subjects as $subject){
              if(isset($_SESSION['admin'])){
                echo "<a href='?do=edit&id={$subject['id']}'>";
              }
                echo "<li class='list-items'>";
                echo "<div>{$subject['subject']}</div>";
                if($subject['multiple']==0){
                    echo "<div class='text-center'>單選題</div>";
                }else{
                    echo "<div class='text-center'>複選題</div>";
                }
                echo "<div class='text-center'>";
                echo $subject['start']. " ~ ".$subject['end'];
                echo "</div>";
                echo "<div class='text-center'>";
                    $today=strtotime(date("Y-m-d"));
                    $end=strtotime($subject['end']);
                    $start=strtotime($subject['start']);
                    if($start-$today>0){
                        echo "投票尚未開始";
                    }else{
                    if(($end-$today)>=0){
                        $remain=ceil(($end-$today)/(60*60*24));
                    if($end==$today){
                      echo "今天午夜截止";
                    }else{
                    echo "倒數".$remain."天結束";}
                    }else{
                        echo "<span style='color:#45484A'>投票已結束</span>";
                    }
                }
                echo "</div>";
                echo "<div class='text-center'>{$subject['total']}</div>";
                echo "<div class='text-center'>";
                        if($subject['sh']==1){
                            echo '顯示';
                        }else{
                            echo '不顯示';
                        }
                echo "</div>";
                echo "</li>";
                if(isset($_SESSION['admin'])){
                echo "</a>";}
            }

        ?>
        </ul>
        <div class="text-center">
        <?php
        if($pages > 1){
            for($i=1;$i<=$pages;$i++){
    
                echo "<div><a href='?do=vote_list&p={$i}{$querystr}{$queryfilter}'>&nbsp;";
                echo $i;
                echo "&nbsp;</a></div>";
            }
        }
        
        ?>
        <br><br><br><br><br><br><br><br><br>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.list-items').odd().css('color','#E87AFA');
        $('.list-items').even().css('color','#F78872');
    </script>

<?php
}
    }
?>

</div>
<div>
    <?php include "./layout/footer.php";?>
</div> 
</body>
</html>