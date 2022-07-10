
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票首頁</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<style>
.one{
    /* border: solid 1px gray; */
    margin: 0 auto;
    width: 110vh;
    padding-top: 10px;
    margin-bottom: 30px;
}
.two{
    text-align: center;
    margin:0 auto 10px auto;
    border-radius: 20px;
    width: 150px;
    animation:slideInDown;
    animation-duration: 0.8s;
    color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;
}
.three{
    display: flex;
    justify-content: space-evenly;
}
.cont:hover{
    transform: scale(1.05,1.05);
    box-shadow: 0 0 10px #F4DDFC;
}
.cont{
    width: 278px;
    height: 135px;
    border: 1px solid #FEEBFA;
    background-color:rgba(249 , 199, 238, 0.4);
    /* margin-left: 65px; */
    box-shadow: 5px 5px 6px #F4DDFC;
    padding: 5px 10px 0 10px;
    border-radius: 30px;
    transition: 0.5s;
    animation:slideInDown;
    animation-duration: 0.8s;
}
.poptitle{
    text-align: center;
    font-weight: bolder;
    text-shadow: 1px 1px 1px gray;
    font-size: 18px;
}
button{
    /* position: relative;
    left: 40%; */
    width: 62px;
    height:22px;
    background-color:pink;
    border-radius: 10px;
    border: 1px solid pink;
    box-shadow: 5px 5px 6px #F4DDFC;
    color: white;
    font-size: 14px;
}
button:hover{
    cursor: pointer;
    background-color: #FFA6E0;
}
.button{
    padding-top: 7px;
    display: flex;
    justify-content: space-evenly;
}
.ulcont{
    padding-left: 40px;
}
#p{
    animation: heartBeat;
    animation-duration: 1s;
    animation-iteration-count: infinite ;
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
    <div class="two"><h1>熱門主題</h1></div>
    
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
            <ul class="ulcont">
                <li>投票人數：<?=$total;?>人</li>
                <li>開始時間：<?=$start;?></li>
                <li>結束時間：<?=$end;?></li>
            </ul>
            <div class="button">
                <!-- <button type="button">我要投票</button> -->
                <a href="?do=vote_result&id=<?=$pop['id'];?>"><button type="button">投票結果</button></a>
            </div>
            
        </div>
            
            <?php
            }
            ?>
        </div>
</div>

<div class="one">
    <div class="two"><h1>近期投票</h1></div>
    
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
            <ul class="ulcont">
                <li>投票人數：<?=$total;?>人</li>
                <li>開始時間：<?=$start;?></li>
                <li>結束時間：<?=$end;?></li>
            </ul>
                <div class="button">
                <a href="?do=vote_result&id=<?=$re['id'];?>"><button type="button">投票結果</button></a>
                </div>
            </div>
            
            <?php
            }
            ?>
        </div>
    
</div>

<a href="?do=vote_list" style="text-decoration: none; color:blueviolet;"><button id="p" style="text-align: center;width:65px;position: relative;left: 48%;">MORE...</button></a>


</body>
</html>