<?php
$subject=find("subjects",$_GET['id']);
$opts=all("options",['subject_id'=>$_GET['id']]);
// 此頁面為已投票過的導入畫面
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
    <div style="width: 120px; border:1px solid pink;">您已投票過囉!</div>
</div>

