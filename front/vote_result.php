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
            header("location:?do=vote_result1&id={$subject['id']}");
        }
    }
}
// ---------登入執行-----------
?>
<h1 class="text-center"><?=$subject['subject'];?></h1>
<div style="width:600px;margin:auto">
    <div>總投票數:<?=$subject['total'];?></div>
    <table class="result-table">
        <tr>
            <td>選項</td>
            <td>投票數</td>
            <td>比例</td>
        </tr>
        <?php 
        foreach($opts as $opt){
            $total=($subject['total']==0)?1:$subject['total'];
            $rate= $opt['total']/$total;
            $result=floor($rate*10000)/10000*100;
        ?>
        <tr>
            <td><?=$opt['option'];?></td>
            <td><?=$opt['total'];?></td>
            <td style="width: 420px;">
                <div style="display:inline-block;height:24px;background:skyblue;width:<?=400*$rate;?>px;"></div>
                <?=$result . "%";?>
            </td>
        </tr>
        <?php 

        }
        ?>
    </table>

    <?php
    $today=strtotime("now");
    $end=strtotime($subject['end']);
    $start=strtotime($subject['start']);
    
    if($start-$today>0){//尚未開始就不要顯示按鈕給使用者投票
    ?>
    尚未開始
    <?php    
    }else{//開始投票
        if(isset($_SESSION['user'])){//有登入
            if(($end-$today)>0){//還沒結束
    ?>
        <button class="btn btn-info" onclick="location.href='?do=vote&id=<?=$_GET['id'];?>'">我要投票</button>
    <?php    
            }else{//結束
                ?>
                投票結束
                <?php
            }
        }else{//沒登入
            ?>
            請登入投票
            <?php
        }
    }
    ?>
    
</div>

