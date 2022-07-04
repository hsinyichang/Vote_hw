
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.one{

    /* border: solid 1px gray; */
    margin: 0 auto;
    width: 80%;
    padding-top: 10px;
    margin-bottom: 10px;
}
.two{
    text-align: center;
    margin-bottom: 10px;
}
.three{
    display: flex;
    
}
.cont{
    width: calc(100% / 3);
    border: 1px solid black;
    margin-left: 10px;
}
.poptitle{
    text-align: center;
}


</style>


<body>
<?php
include_once "./api/base.php";
$pdo=pdo();
$order="ORDER BY `total` DESC ";
$limit="LIMIT 3";
$popular=all('subjects',$order.$limit);

$order2="ORDER BY `start` DESC ";
$recent=all('subjects',$order2.$limit);
// dd($popular);
?>

<div class="one">
    <div class="two">熱門主題</div>
    
        <div class="three">
            <?php
            foreach($popular as $pop){
                $subject=$pop['subject'];//主題
                $total=$pop['total'];//投票人數
                $start=$pop['start'];//開始
                $end=$pop['end'];//結束
                // $today=strtotime("now");
            
            ?>
            <div class="cont">
                <div class="poptitle"><?=$subject;?></div>
            <ul>
                <li>投票人數：<?=$total;?>人</li>
                <li>開始時間：<?=$start;?></li>
                <li>結束時間：<?=$end;?></li>
            </ul>
            </div>
            
            <?php
            }
            ?>
        </div>
    
</div>

<div class="one">
    <div class="two">近期投票</div>
    
        <div class="three">
            <?php
            foreach($recent as $re){
                $subject=$re['subject'];//主題
                $total=$re['total'];//投票人數
                $start=$re['start'];//開始
                $end=$re['end'];//結束
                // $today=strtotime("now");
            
            ?>
            <div class="cont">
                <div class="poptitle"><?=$subject;?></div>
            <ul>
                <li>投票人數：<?=$total;?>人</li>
                <li>開始時間：<?=$start;?></li>
                <li>結束時間：<?=$end;?></li>
            </ul>
            </div>
            
            <?php
            }
            ?>
        </div>
    
</div>




</body>
</html>