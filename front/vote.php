<?php
include_once "./api/base.php";

$subject=find("subjects",$_GET['id']);
$opts=all('options',['subject_id'=>$_GET['id']]);

/* dd($subject);
dd($opts); */
?>
<div class="vote-item">
    <h1 style="padding-top: 20px;
        color: #8501F5;
        text-shadow: 2px 2px 3px #e1b8f5;
        text-align:center"><?=$subject['subject'];?>
    </h1>
    <div class="vote-form">
        <form action="./api/vote.php" method="post">
            <?php
            foreach($opts as $opt){
            ?>
            <div class="vote-items">
                <?php
                if($subject['multiple']==0){//抓到id值 判斷是單/複選 帶入checkbox 還是radio
                ?>
                <input type="radio" name="opt" value="<?=$opt['id'];?>" required>
                <?php
                }else{
                ?>
                <input type="checkbox" name="opt[]" value="<?=$opt['id'];?>">
                <?php
                }
                ?>
                <?=$opt['option'];?>
                <!--帶入選項名稱-->
            </div>

            <?php
        }
        ?>
            <div class="votedone">
                <input type="submit" value="投票">
                <input type="button" value="放棄" onclick="location.href='index.php'">
            </div>
        </form>
    </div>
    <br><br><br><br><br>
</div>