<div class="vlog">
<?php
$pdo=pdo();

$sql="SELECT * FROM `users` where acc='{$_SESSION['user']}'";
$uid=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);//抓到使用者的id
    $u = $uid['id'];
    $log = "SELECT `subjects` . * , `logs` . `user_id` FROM `subjects`,`logs` WHERE `subjects` . `id` = `logs` . `subject_id` && `logs` . `user_id` = $u GROUP BY `id`";//列出使用者投票紀錄
    $loguser=$pdo->query($log)->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($loguser as $val){//列出使用者投票紀錄
?>
    <div class="vlogdiv">
        <table class="vlogtable">
            <tr>
                <td>
                    <?=$val['subject'];?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php $today=strtotime(date("Y-m-d"));
                    $end=strtotime($val['end']);
                    $start=strtotime($val['start']);
                    if($start-$today>0){
                        echo "投票尚未開始";
                    }else{
                    if(($end-$today)>=0){
                        $remain=ceil(($end-$today)/(60*60*24));
                    if($end==$today){
                      echo "今天午夜截止";
                    }else{
                    echo "倒數".$remain."天結束";}
                    }else{
                        echo "<span style='color:grey'>投票已結束</span>";
                    }
                }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                共<?=$val['total'];?>人投票
                
                </td>
            </tr>
        </table>
        <br><br>
        <div style="float: right;">
            <a href="?do=vote_result1&id=<?=$val['id']?>">詳細內容</a>
        </div>
    </div>
<?php       
    }
?>
</div>