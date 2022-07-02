<?php

include_once "./api/base.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票管理中心</title>
    <!--使用拆分css檔案的方式來區分共用的css設定及前後台不同的css-->
    <link rel="stylesheet" href="./css/basic.css">
    <link rel="stylesheet" href="./css/back.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div id="header">
    <?php include "./layout/slider.php";
          include "./layout/back_nav.php";
    ?>
</div>
<div id="container">
<?php
if(isset($_SESSION['admin'])){

if(isset($_GET['do'])){//根據網址有沒有帶do這個參數來決定要include那個外部檔案
    $file="./back/".$_GET['do'].".php";// 按下button 觸發onclick事件 帶入query string
}                                    // 有GET到do這個參數↓
    if(isset($file) && file_exists($file)){//先檢查是否有file此變數且此檔案是否存在
        include $file;// 則include 變數file這個檔案，直接把此檔案放進來這個頁面
    }else{
?>
    <!-- <button class="btn btn-primary" onclick="location.href='?do=add_vote'">新增投票</button>
                                        設定onclick 事件  讓網址後面產生query string(do 為變數) -->
    <div>
        <table class="table">
        <tr class="list-header">
            <td>投票主題：</td>
            <td id="id1">單/複選題：</td>
            <td>投票期間：</td>
            <td>剩餘天數：</td>
            <td id="id2">投票人數：</td>
            <td>操作：</td>
        </tr>
        <?php
            //使用all()函式來取得資料表subjects中的所有資料，請參考base.php中的函式all($table,...$arg)
            $subjects=all('subjects');

            //使用迴圈將每一筆資料的內容顯示在畫面上
            foreach($subjects as $subject){//使用迴圈印內容
                echo "<tr class='list-items'>";
                echo "<td>{$subject['subject']}</td>";//只取得欄位
    
                if($subject['multiple']==0){
                  echo "<td class='text-center'>單選題</td>";
                }else{
                  echo "<td class='text-center'>複選題</td>";
                }
    
                echo "<td class='text-center'>";//投票開始與結束時間
                echo $subject['start']. "~" .$subject['end'];
                echo "</td>";
    
                echo "<td class='text-center'>";//投票剩餘天數
                  $today=strtotime("now");
                  $end=strtotime($subject['end']);
                  $start=strtotime($subject['start']);
                  if($start-$today>0){
                    echo "投票尚未開始";
                }else{
                  if(($end-$today)>0){//如果投票還在進行
                    $remain=floor(($end-$today)/(60*60*24));
                    echo "倒數".$remain."天結束";
                  }else{//如果投票已經截止
                    echo "<span style='color:grey;'>投票已截止</span>";
                  }
                  }
                echo "</td>";
    
                echo "<td class='text-center'>{$subject['total']}</td>";//投票總人數
    
                echo "<td class='text-center'>";//操作區
                echo "<a class='edit' href='?do=edit&id={$subject['id']}'>編輯</a>";
                echo "<a class='del' href='?do=del&id={$subject['id']}'>刪除</a>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
        </table>

    </div>

<?php
}
?>
<?php
}else{
    if(isset($_GET['do'])){//根據網址有沒有帶do這個參數來決定要include那個外部檔案
        $file="./back/".$_GET['do'].".php";// 按下button 觸發onclick事件 帶入query string
    }                                    // 有GET到do這個參數↓
        if(isset($file) && file_exists($file)){//先檢查是否有file此變數且此檔案是否存在
            include $file;// 則include 變數file這個檔案，直接把此檔案放進來這個頁面
        }else{
}
}
?>
</div>
<div>
    <?php include "./layout/footer.php";?>
</div> 
</body>
</html>