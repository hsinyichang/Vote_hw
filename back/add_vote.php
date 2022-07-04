<form action="" method="post">
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
                    echo "<option value='{$type['id']}'>";
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
                <input type="text" name="subject" id="subject">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">單/複選：</label>
            </td>
            <td>
                <input type="radio" name="multiple" value="0" checked>
                <label>單選</label>
                <input type="radio" name="multiple" value="1" >
                <label>複選</label>
            </td>
        </tr>
        <tr>
            <td>開始時間：</td>
            <td><input type="date" name="start"></td>
        </tr>
        <tr>
            <td>結束時間：</td>
            <td><input type="date" name="end"></td>
        </tr>
        <!-- 使用表格群組tbody -->
        <tbody id="options">
            <tr>
                <td>
                    <label>選項:</label>
                </td>
                <td>
                    <input type="text" name="option[]"><input type="button" value="新增選項" id="addvote">
                </td>
            </tr>
        </tbody>
    </table>
    
    <input type="submit" value="新增">
    
    </form>
    
    <script>
        // 動態新增欄位id編號預設值
        let trId = 1;

        // 動態新增欄位
        $("#addvote").click(function () {
            $("#options").append('<tr id="tr'+trId+'"><td><label>選項:</label></td><td><input type="text" name="option[]"><button type="button" onclick="delbtn(' + trId + ')">刪除</button></td></tr>');
            trId++;
        });
        
        // 動態刪除欄位
        function delbtn(id) {
            $("#tr" + id).remove();
        }    
        
    </script>