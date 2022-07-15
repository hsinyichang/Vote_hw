<?php
$subject=find("subjects",$_GET['id']);//找到當前投票主題的id
$opts=all("options",['subject_id'=>$_GET['id']]);
$pdo=pdo();
// ---------登入執行(避免重複投票)-----------
if (isset($_SESSION['user'])) {//如果有登入的話就執行這行
    $datauser=['acc' => $_SESSION['user']];
    $user=find('users',$datauser);
    $userid=$user['id'];
    $log= find('logs',['user_id' => $userid, 'subject_id' => $_GET['id']]);
}
// ---------登入執行-----------
?>
<div style="width:700px;margin:auto">
    <h1 style="padding-top: 20px;color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;font-weight: bolder;" class="text-center"><?=$subject['subject'];?></h1>
    <div style="color: lightgrey;">投票人數:<?=$subject['total'];?>人</div>
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
                <div class="progress-bar" role="progressbar" style="width:<?=$result . "%";?>"
                    aria-valuenow="<?=$result;?>" aria-valuemin="0" aria-valuemax="100"><?=$result . "%";?></div>
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
                    if(!empty($log)){//有投過票
        ?>
    <div style="width: 170px;" class="but">您已投票過囉!</div>
    <?php
                    }else{//沒有投過票
        ?>
    <div class="votediv">
        <button class="btn btn-info" onclick="location.href='?do=vote&id=<?=$_GET['id'];?>'">我要投票</button>
    </div>
    <?php    
                    }
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