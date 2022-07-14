<?php
$subject=find("subjects",$_GET['id']);
$opts=all("options",['subject_id'=>$_GET['id']]);
$pdo=pdo();
$subjectid=$_GET['id'];
// ---------登入執行(避免重複投票)-----------
if (isset($_SESSION['user'])) {//如果有登入的話就執行這行
$sql="SELECT * FROM `users` where acc='{$_SESSION['user']}'";
$uid=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);//抓到使用者的id
    $u = $uid['id'];

$log = "SELECT `subjects` . * , `logs` . `user_id` 
    FROM `subjects`,`logs` 
    WHERE `subjects` . `id` = `logs` . `subject_id` && `logs` . `user_id` = $u ";
    //列出使用者投票紀錄

    $loguser=$pdo->query($log)->fetchAll(PDO::FETCH_ASSOC);
    foreach($loguser as $val){//列出使用者投票紀錄
        if($val['id']==$_GET['id']){//如果該主題id=當前頁面id，則為已投過票
            ?>
            <script>
            location:"?do=vote_result1&id={$subject['id']}"
            </script>
            <?php
        }
    }
}
// ---------登入執行-----------
?>
<div style="width:700px;margin:auto">
    <h1 style="padding-top: 20px;color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;font-weight: bolder;" class="text-center"><?=$subject['subject'];?></h1>
    <!-- <div>總投票數:<?=$subject['total'];?></div> -->
    <li class="result-table-header">
        
            <div class="lione">選項</div>
            <div class="litwo">投票數</div>
            <div class="lithree">比例</div>
        
        <?php 
        foreach($opts as $opt){
            $total=($subject['total']==0)?1:$subject['total'];
            $rate= $opt['total']/$total;
            $result=floor($rate*10000)/10000*100;
        ?>
            <li class="result-table">
            <div class="lione"><?=$opt['option'];?></div>
            <div class="litwo"><?=$opt['total'];?>　票</div>
            <div class="lithree" style="width: 400px;">
                <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:<?=$result . "%";?>" aria-valuenow="<?=$result;?>" aria-valuemin="0" aria-valuemax="100"><?=$result . "%";?></div>
                </div>
            </div>
            </li>
        <?php        
        }
        ?>
    
    </li>
    <?php
    $today=strtotime(date("Y-m-d"));
    $end=strtotime($subject['end']);
    $start=strtotime($subject['start']);
    
    if($start-$today>0){//尚未開始就不要顯示按鈕給使用者投票
    ?>
    <div style="width: 110px;" class="but">尚未開始</div>
    <?php    
    }else{//開始投票
        if(isset($_SESSION['user'])){//有登入
            if(($end-$today)>=0){//還沒結束
    ?>
    <div class="votediv">
        <button class="btn btn-info" onclick="location.href='?do=vote&id=<?=$_GET['id'];?>'">我要投票</button>
    </div>
    <?php    
            }else{//結束
                ?>
                <div style="width: 110px;" class="but">投票結束</div>
                <?php
            }
        }else{//沒登入
            ?>
            <div style="width: 110px;" class="but">請登入投票</div>
            <?php
        }
    }
    ?>
    
</div>
<br><br><br><br>

