<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.css"
        integrity="sha512-CJ5goVzT/8VLx0FE2KJwDxA7C6gVMkIGKDx31a84D7P4V3lOVJlGUhC2mEqmMHOFotYv4O0nqAOD0sEzsaLMBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.js"
        integrity="sha512-Kyb4n9EVHqUml4QZsvtNk6NDNGO3+Ta1757DSJqpxe7uJlHX1dgpQ6Sk77OGoYA4zl7QXcOK1AlWf8P61lSLfQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <style>
        h1{
        text-align: center;
    margin:0 auto 10px auto;
    border-radius: 20px;
    width: 200px;
    animation:slideInDown;
    animation-duration: 0.8s;
    color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;
    padding-top:2rem;
    font-weight: bolder;
        }
    </style>
<?php
$id=$_GET['id'];
$subj=find('subjects',$id);
$opts=all('options',['subject_id'=>$id]);
/* dd($subj);
dd($opts); */
?>
<div>
    <h1>編輯投票</h1>
<form action="./api/edit_vote.php" method="post">
    <table class="edit-table">
        <tr>
            <td class="edit-td1">
                <label for="types">選擇分類：</label>
            </td>
            <td class="edit-td2">
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
            <td class="edit-td1">
                <label for="subject">投票主題：</label>
            </td>
            <td class="edit-td2">
                <input type="text" name="subject" id="subject" value="<?=$subj['subject'];?>">
                <input type="hidden" name="subject_id" value="<?=$subj['id'];?>">
            </td>
        </tr>
        <tr>
            <td class="edit-td1">
                <label for="">單/複選：</label>
            </td>
            <td class="edit-td2">
            <input type="radio" name="multiple" value="0" <?=($subj['multiple']==0)?'checked':'';?>>
            <label>單選</label>
            <input type="radio" name="multiple" value="1" <?=($subj['multiple']==1)?'checked':'';?>>
            <label>複選</label>
            </td>
        </tr>
        <tr>
            <td class="edit-td1">開始時間：</td>
            <td class="edit-td2"><input type="date" name="start" value="<?=date('Y-m-d',strtotime($subj['start']))?>"></td>
        </tr>
        <tr>
            <td class="edit-td1">結束時間：</td>
            <td class="edit-td2"><input type="date" name="end" value="<?=date('Y-m-d',strtotime($subj['end']))?>"></td>
        </tr>
        <tr>
            <td class="edit-td1">顯示前台</td>
            <td class="edit-td2"><input type="radio" name="sh" value="1" <?=($subj['sh']==1)?'checked':'';?>>是<input type="radio" name="sh" value="0" <?=($subj['sh']==0)?'checked':'';?>>否</td>
        </tr>
        <tr>
            <td></td>
            <td class="edit-td2" style="text-align: center;"><input type="button" value="新增選項" id="addvote" required></td>
        </tr>
        <!-- 使用表格群組tbody -->
        <tbody id="options">
            <?php 
            foreach($opts as $opt){
            ?>
            <tr>
                <td class="edit-td1">
                    <label>選項:</label>
                </td>
                <td class="edit-td2">
                <input type="text" required name="option[<?=$opt['id'];?>]" value="<?=$opt['option'];?>">
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    <div class="inputdone">
    <input id="inputdone" type="submit" value="修改完成"> 
    </div>
    <br>
</form>
<div class="deldiv">
<a class="del" href="javascript:
            swal.fire({
            title:'確定要刪除<br>【<?=$subj['subject']?>】 ?',
            icon:'warning',
            text:'刪除就回不去了~~',
            showCancelButton: true,
            confirmButtonText: '刪除',
            cancelButtonText: '取消',
            }).then((result)=>{
                if(result.isConfirmed){
                window.location.href='./api/del.php?table=subjects&id=<?=$_GET['id'];?>';
                }else if(result.dismiss === Swal.DismissReason.cancel){
                    
                }
            });">刪除投票</a></div>
            <br><br><br><br>
    <script>
        // 動態新增欄位id編號預設值
        let trId = 1;

        // 動態新增欄位
        $("#addvote").click(function () {
            $("#options").append('<tr id="tr'+trId+'"><td class="edit-td1"><label>選項:</label></td><td class="edit-td2"><input type="text" name="option[]" required><button class="editbut" type="button" onclick="delbtn(' + trId + ')">刪除</button></td></tr>');
            trId++;
        });
        
        // 動態刪除欄位
        function delbtn(id) {
            $("#tr" + id).remove();
        }    
        
    </script>
</div>