<style>
.one {
    /* border: solid 1px gray; */
    margin: 0 auto;
    width: 110vh;
    padding-top: 10px;
    margin-bottom: 30px;
}

.two {
    text-align: center;
    margin: 0 auto 10px auto;
    border-radius: 20px;
    width: 270px;
    animation: slideInDown;
    animation-duration: 0.8s;
    color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;
    font-weight: bolder;
    display: flex;
}

.three {
    display: flex;
    justify-content: space-evenly;
}

.cont:hover {
    transform: scale(1.05, 1.05);
    box-shadow: 0 0 10px #F4DDFC;
}

.cont {
    width: 278px;
    height: 150px;
    border: 1px solid #FEEBFA;
    background-color: rgba(249, 199, 238, 0.4);
    /* margin-left: 65px; */
    box-shadow: 5px 5px 6px #F4DDFC;
    padding: 5px 10px 0 10px;
    border-radius: 30px;
    transition: 0.5s;
    animation: slideInDown;
    animation-duration: 0.8s;
}

.poptitle {
    text-align: center;
    font-weight: bolder;
    text-shadow: 1px 1px 1px gray;
    font-size: 20px;
}

.button button:hover {
    cursor: pointer;
    background-color: #FFA6E0;
}

.button {
    padding-top: 7px;
    display: flex;
    justify-content: space-evenly;
}

.button button {
    width: 66px;
    height: 22px;
    background-color: pink;
    border-radius: 10px;
    border: 1px solid pink;
    box-shadow: 5px 5px 6px #F4DDFC;
    color: white;
    font-size: 14px;
}

.ulcont {
    padding-left: 40px;
    padding-top: 10px;
    font-size: 14px;
    margin-bottom: 0;
    paddin
}

#p {
    animation: heartBeat;
    animation-duration: 1s;
    animation-iteration-count: infinite;
    width: 66px;
    height: 22px;
    background-color: pink;
    border-radius: 10px;
    border: 1px solid pink;
    box-shadow: 5px 5px 6px #F4DDFC;
    color: white;
    font-size: 14px;
}
</style>

<body>
    <?php
include_once "./api/base.php";
$pdo=pdo();
$order="ORDER BY `total` DESC ";
$limit="LIMIT 3";
$show=['sh'=>'1'];
$popular=all('subjects',$show,$order.$limit);
$order2="ORDER BY `start` DESC ";
$recent=all('subjects',$show,$order2.$limit);
// dd($popular);
?>

    <div class="one">
        <div class="two"><img src="./img/hot.png" alt="hot" width="66px" height="66px">
            <h1 style="font-weight: bolder;">????????????</h1>
        </div>

        <div class="three">
            <?php
            foreach($popular as $pop){
                $subject=$pop['subject'];//??????
                $total=$pop['total'];//????????????
                $start=$pop['start'];//??????
                $end=$pop['end'];//??????
                // $today=strtotime("now");
            
            ?>
            <div class="cont">
                <div class="poptitle"><?=$subject;?></div>
                <ul class="ulcont">
                    <li>???????????????<?=$total;?>???</li>
                    <li>???????????????<?=$start;?></li>
                    <li>???????????????<?=$end;?></li>
                </ul>
                <div class="button">
                    <!-- <button type="button">????????????</button> -->
                    <a href="?do=vote_result&id=<?=$pop['id'];?>"><button type="button">????????????</button></a>
                </div>

            </div>

            <?php
            }
            ?>
        </div>
    </div>

    <div class="one">
        <div class="two"><img src="./img/recent.png" alt="recent" width="66px" height="66px">
            <h1 style="font-weight: bolder;">????????????</h1>
        </div>

        <div class="three">
            <?php
            foreach($recent as $re){
                $subject=$re['subject'];//??????
                $total=$re['total'];//????????????
                $start=$re['start'];//??????
                $end=$re['end'];//??????
                // $today=strtotime("now");
            
            ?>
            <div class="cont">
                <div class="poptitle"><?=$subject;?></div>
                <ul class="ulcont">
                    <li>???????????????<?=$total;?>???</li>
                    <li>???????????????<?=$start;?></li>
                    <li>???????????????<?=$end;?></li>
                </ul>
                <div class="button">
                    <a href="?do=vote_result&id=<?=$re['id'];?>"><button type="button">????????????</button></a>
                </div>
            </div>

            <?php
            }
            ?>
        </div>

    </div>
    <div style="height: 50px;">
        <a href="?do=vote_list" style="text-decoration: none; color:blueviolet;"><button id="p"
                style="text-align: center;width:65px;position: relative;left: 48%;top:66%">MORE...</button></a>
    </div>
    <br><br><br><br>
</body>