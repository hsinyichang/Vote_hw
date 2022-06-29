<?php
include_once "./api/base.php";

$subject=find("subjects",$_GET['id']);
$opts=all('options',['subject_id'=>$_GET['id']]);

/* dd($subject);
dd($opts); */
?>
<h1><?=$subject['subject'];?></h1>
<form action="./api/vote.php" method="post">
<?php
foreach($opts as $opt){
?>
    <div class="vote-item">
        <?php
         if($subject['multiple']==0){//抓到id值 判斷是單/複選 帶入checkbox 還是radio
        ?>
            <input type="radio" name="opt" value="<?=$opt['id'];?>">
        <?php
        }else{
        ?>
            <input type="checkbox" name="opt[]" value="<?=$opt['id'];?>">
        <?php
        }
        ?>
        <?=$opt['option'];?> <!--帶入選項名稱-->
    </div>

<?php
}
?>

<input type="submit" value="投票去">
<input type="reset" value="重置">
<input type="button" value="放棄" onclick="location.href='index.php'">
</form>