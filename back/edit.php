<?php
$id=$_GET['id'];
$subj=find('subjects',$id);
$opts=all('options',['subject_id'=>$id]);
/* dd($subj);
dd($opts); */
?>

<form action="../api/edit_vote.php" method="post">
    <table>
        <tr>
            <td>
                <label for="types">選擇分類：</label>
            </td>
            <td>
                <select name="types" id="types">
                <?php
                    $types=all("types");
                    foreach($types as $type){
                        $selected=($subj['type_id']==$type['id'])?'selected':'';
                        echo "<option value='{$type['id']}' $selected>";
                        echo $type['name'];
                        echo "</option>";
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="subject">投票主題：</label>
            </td>
            <td>
                <input type="text" name="subject" id="subject" value="<?=$subj['subject'];?>">
                <input type="hidden" name="subject_id" value="<?=$subj['id'];?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">單/複選：</label>
            </td>
            <td>
            <input type="radio" name="multiple" value="0" <?=($subj['multiple']==0)?'checked':'';?>>
            <label>單選</label>
            <input type="radio" name="multiple" value="1" <?=($subj['multiple']==1)?'checked':'';?>>
            <label>複選</label>
            </td>
        </tr>
        <tr>
            <td>開始時間：</td>
            <td><input type="date" name="start" value="<?=date('Y-m-d',strtotime($subj['start']))?>"></td>
        </tr>
        <tr>
            <td>結束時間：</td>
            <td><input type="date" name="end" value="<?=date('Y-m-d',strtotime($subj['end']))?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="button" value="新增選項" id="addvote" required></td>
        </tr>
        <!-- 使用表格群組tbody -->
        <tbody id="options">
            <?php 
            foreach($opts as $opt){
            ?>
            <tr>
                <td>
                    <label>選項:</label>
                </td>
                <td>
                <input type="text" required name="option[<?=$opt['id'];?>]" value="<?=$opt['option'];?>">
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    
    <input type="submit" value="修改完成">
    
</form>
    
    <script>
        // 動態新增欄位id編號預設值
        let trId = 1;

        // 動態新增欄位
        $("#addvote").click(function () {
            $("#options").append('<tr id="tr'+trId+'"><td><label>選項:</label></td><td><input type="text" name="option[]" required><button type="button" onclick="delbtn(' + trId + ')">刪除</button></td></tr>');
            trId++;
        });
        
        // 動態刪除欄位
        function delbtn(id) {
            $("#tr" + id).remove();
        }    
        
    </script>