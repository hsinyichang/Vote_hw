<?php
$subject=find("subjects",$_GET['id']);
$opts=all("options",['subject_id'=>$_GET['id']]);
// 此頁面為已投票過的導入畫面
?>
<div style="width:700px;margin:auto">
    <h1 style="padding-top: 20px;color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;" class="text-center"><?=$subject['subject'];?></h1>
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
            <div class="lithree">
                <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:<?=$result . "%";?>" aria-valuenow="<?=$result;?>" aria-valuemin="0" aria-valuemax="100"><?=$result . "%";?></div>
                </div>
            </div>
        </li>
        <?php
        }
        ?>
    </li>
    <div style="width: 170px;" class="but">您已投票過囉!</div>
</div>

