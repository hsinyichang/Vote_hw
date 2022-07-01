<?php
$subject=find("subjects",$_GET['id']);
$opts=all("options",['subject_id'=>$_GET['id']]);
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
            $rate=$opt['total']/$total;
        ?>
        <tr>
            <td><?=$opt['option'];?></td>
            <td><?=$opt['total'];?></td>
            <td>
                <div style="display:inline-block;height:24px;background:skyblue;width:<?=300*$rate;?>px;"></div>
                <?=($rate*100) . "%";?>
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
    if(isset($_SESSION['user'])){
    
    if($start-$today>0){
    //尚未開始就不要顯示按鈕給使用者投票
    }else{
    if(($end-$today)>0){
    ?>
        <button class="btn btn-info" onclick="location.href='?do=vote&id=<?=$_GET['id'];?>'">我要投票</button>
    <?php
    }else{
    //投票已結束也不要顯示按鈕
    }
    }
    ?>
    <?php
    }else{
    ?>
    若要投票記得登入
    <?php    
    }
    ?>
</div>

