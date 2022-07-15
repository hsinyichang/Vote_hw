<style>
* {
    box-sizing: border-box;
}

.button button {
    /* position: relative;
    left: 40%; */
    width: 62px;
    height: 22px;
    background-color: pink;
    border-radius: 10px;
    border: 1px solid pink;
    box-shadow: 5px 5px 6px #F4DDFC;
    color: white;
    font-size: 14px;

}

.button {
    width: 64px;
    margin: 0 auto;
}

.button button:hover {
    cursor: pointer;
    background-color: #FFA6E0;
}

.acctitle {
    text-align: center;
    padding-top: 30px;
    font-size: 2.5rem;
    color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;
    font-weight: bolder;
}
</style>
<?php
$pdo=pdo();

$sql="SELECT * FROM `users` where acc='{$_SESSION['user']}'";
$uid=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);//抓到使用者的id
    $u = $uid['id'];
    $log = "SELECT `subjects` . * , `logs` . `user_id` FROM `subjects`,`logs` WHERE `subjects` . `id` = `logs` . `subject_id` && `logs` . `user_id` = $u GROUP BY `id`";//列出使用者投票紀錄
    $loguser=$pdo->query($log)->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="acctitle">
    <img src="./img/vote.png" alt="vote" width="66px" height="66px">【<?=$uid['name'];?>】 的已投票主題
</div>
<div class="vlog">
    <?php
    foreach($loguser as $val){//列出使用者投票紀錄
?>
    <div class="vlogdiv">
        <table class="vlogtable">
            <tr>
                <th style="padding-top: 5px;">
                    <?=$val['subject'];?>
                </th>
            </tr>
            <tr>
                <td style="margin-top:6px ;">
                    <?php $today=strtotime(date("Y-m-d"));
                    $end=strtotime($val['end']);
                    $start=strtotime($val['start']);
                    if($start-$today>0){
                        echo "投票尚未開始";
                    }else{
                    if(($end-$today)>=0){
                        $remain=ceil(($end-$today)/(60*60*24));
                        if($end==$today){
                        echo "<span style='color:red'>今天午夜截止</span>";
                        }else{
                        echo "<span style='color:#F78872'>倒數".$remain."天結束</span>";
                        }
                    }else{
                        echo "<span style='color:grey'>投票已結束</span>";
                    }
                }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 8px;padding-bottom:8px">
                    <span style="font-size: 16px;">共<?=$val['total'];?>人投票</span>

                </td>
            </tr>
        </table>

        <div class="button">
            <a href="?do=vote_result&id=<?=$val['id']?>"><button type="button">詳細內容</button></a>
        </div>
    </div>
    <?php       
    }
?>
</div>