<h1 style="text-align: center;
    margin:0 auto 10px auto;
    border-radius: 20px;
    width: 200px;
    animation:slideInDown;
    animation-duration: 0.8s;
    color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;
    padding-top:2rem;
    font-weight: bolder;">新增投票</h1>
<form action="./api/add_vote.php" method="post">
    <table class="add-vote">
        <tr>
            <td class="add-vote-td">
                <label for="types">選擇分類：</label>
            </td>
            <td style="width: 350px;">
                <select name="types" id="types" style="width: 100px; height:25px">
                <?php
                    $types=all("types");
                    foreach($types as $type){
                    echo "<option value='{$type['id']}'>";
                    echo $type['name'];
                    echo "</option>";
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="add-vote-td">
                <label for="subject">投票主題：</label>
            </td>
            <td>
                <input type="text" name="subject" id="subject" required placeholder="輸入投票主題">
            </td>
        </tr>
        <tr>
            <td class="add-vote-td">
                <label for="">單/複選：</label>
            </td>
            <td style="color: #B95BC9;">
                <input type="radio" name="multiple" value="0" checked >
                <label>單選</label>
                <input type="radio" name="multiple" value="1" >
                <label>複選</label>
            </td>
        </tr>
        <tr>
            <td class="add-vote-td">顯示前台：</td>
            <td class="edit-td2"><input type="radio" name="sh" value="1" checked>是<input type="radio" name="sh" value="0">否</td>
        </tr>
        <tr>
            <td class="add-vote-td">開始時間：</td>
            <td><input type="date" name="start" required></td>
        </tr>
        <tr>
            <td class="add-vote-td">結束時間：</td>
            <td><input type="date" name="end" required></td>
        </tr>
        <!-- 使用表格群組tbody -->
        <tbody id="options">
            <tr>
                <td class="add-vote-td">
                    <label>選項:</label>
                </td>
                <td>
                    <input type="text" name="option[]"required placeholder="輸入選項">　<input type="button" value="新增選項" id="addvote" >
                </td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <div class="add-input">
    <input type="submit" value="完成新增">
    
    </div><br><br><br><br><br>
</form>
    
    <script>
        // 動態新增欄位id編號預設值
        let trId = 1;

        // 動態新增欄位
        $("#addvote").click(function () {
            $("#options").append('<tr id="tr'+trId+'"><td class="add-vote-td"><label>選項:</label></td><td><input type="text" name="option[]" required placeholder="輸入選項">　<button class="delbut" type="button" onclick="delbtn(' + trId + ')">刪除</button></td></tr>');
            trId++;
        });
        
        // 動態刪除欄位
        function delbtn(id) {
            $("#tr" + id).remove();
        }    
        
    </script>