<?php
$p="";
if(isset($_GET['p'])){
    $p="&p={$_GET['p']}";
}
$querystr="";
if(isset($_GET['order'])){
    $querystr="&order={$_GET['order']}&type={$_GET['type']}";
}

$queryfilter="";
if(isset($_GET['filter'])){  //分類
    $queryfilter="&filter={$_GET['filter']}";
}


?>
    <div class="type">
        <label for="types">分類：</label>
        <select name="types" class="pretty-select" id="types" onchange="location.href=`?do=vote_list&filter=${this.value}&p=1<?=$querystr;?>`">
            <option value="0">全部</option>
        <?php
            $types=all("types");
            foreach($types as $type){
                $selected=(isset($_GET['filter']) && $_GET['filter']==$type['id'])?'selected':'';
                echo "<option value='{$type['id']}' $selected>";
                echo $type['name'];
                echo "</option>";
            }
            ?>
        </select>
    </div>
<div>
        <ul class='list'>
            <li class='list-header'>
                <div>投票主題</div>
                <?php
                if(isset($_GET['type']) && $_GET['type']=='asc'){
                ?>
                <div><a href="?do=vote_list&order=multiple&type=desc<?=$p;?><?=$queryfilter;?>">單/複選題</a></div>
                <?php
                }else{
                ?>
                <div><a href="?do=vote_list&order=multiple&type=asc<?=$p;?><?=$queryfilter;?>">單/複選題</a></div>
                <?php
                }
                ?>
                <?php
                if(isset($_GET['type']) && $_GET['type']=='asc'){
                ?>
                <div><a href="?do=vote_list&order=end&type=desc<?=$p;?><?=$queryfilter;?>">投票期間</a></div>
                <?php
                }else{
                ?>
                <div><a href="?do=vote_list&order=end&type=asc<?=$p;?><?=$queryfilter;?>">投票期間</a></div>   
                <?php
                }
                ?>
                <?php
                if(isset($_GET['type']) && $_GET['type']=='asc'){
                ?>
                    <div><a href="?do=vote_list&order=remain&type=desc<?=$p;?><?=$queryfilter;?>">剩餘天數</a></div> 
                <?php 
                }else{
                ?>
                    <div><a href="?do=vote_list&order=remain&type=asc<?=$p;?><?=$queryfilter;?>">剩餘天數</a></div>
                <?php
                    }
                ?>
                <?php
                if(isset($_GET['type']) && $_GET['type']=='asc'){
                ?>
                <div><a href='?do=vote_list&order=total&type=desc<?=$p;?><?=$queryfilter;?>'>投票人數</a></div>
                <?php
                }else{
                ?>
                <div><a href='?do=vote_list&order=total&type=asc<?=$p;?><?=$queryfilter;?>'>投票人數</a></div>
                <?php
                }
                ?>
                
            </li>
        <?php
            //偵測是否需要排序
            $orderStr='';
            if(isset($_GET['order'])){
                $_SESSION['order']['col']=$_GET['order'];
                $_SESSION['order']['type']=$_GET['type'];

                if($_GET['order']=='remain'){
                    $orderStr=" ORDER BY DATEDIFF(`end`,now()) {$_SESSION['order']['type']}";
                }else{
                    $orderStr=" ORDER BY `{$_SESSION['order']['col']}` {$_SESSION['order']['type']}";
                }
                

            }
            //使用all()函式來取得資料表subjects中的所有資料，請參考base.php中的函式all($table,...$arg)

            /**建立分頁所需的變數群
             * 
             * 
             * 
             */

            $filter=[];
            if(isset($_GET['filter'])){
                if(!$_GET['filter']==0){
                    $filter=['type_id'=>$_GET['filter']];
                }
            }

            $total=math('subjects','count','id',$filter);
            $div=5;
            $pages=ceil($total/$div);
            $now=isset($_GET['p'])?$_GET['p']:1;
            $start=($now-1)*$div;
            $page_rows=" limit $start,$div";


            $subjects=all('subjects',$filter,$orderStr . $page_rows);

            //使用迴圈將每一筆資料的內容顯示在畫面上
            foreach($subjects as $subject){
                echo "<a href='?do=vote_result&id={$subject['id']}'>";
                echo "<li class='list-items'>";
                echo "<div>{$subject['subject']}</div>";
                if($subject['multiple']==0){
                    echo "<div class='text-center'>單選題</div>";
                }else{
                    echo "<div class='text-center'>複選題</div>";
                }
                echo "<div class='text-center'>";
                echo $subject['start']. " ~ ".$subject['end'];
                echo "</div>";
                echo "<div class='text-center'>";
                    $today=strtotime("now");
                    $end=strtotime($subject['end']);
                    $start=strtotime($subject['start']);
                    if($start-$today>0){
                        echo "投票尚未開始";
                    }else{
                    if(($end-$today)>0){
                        $remain=ceil(($end-$today)/(60*60*24));
                        echo "倒數".$remain."天結束";
                    }else{
                        echo "<span style='color:grey'>投票已結束</span>";
                    }
                }
                echo "</div>";
                echo "<div class='text-center'>{$subject['total']}</div>";
                echo "</li>";
                echo "</a>";
            }

        ?>
        </ul>
        <div class="text-center">
        <?php
        if($pages > 1){
            for($i=1;$i<=$pages;$i++){
    
                echo "<div><a href='?do=vote_list&p={$i}{$querystr}{$queryfilter}'>&nbsp;";
                echo $i;
                echo "&nbsp;</a></div>";
            }
        }
        
        ?>
        </div>
    </div>