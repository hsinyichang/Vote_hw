<form action="./api/add_vote.php" method="post">
<div><label for="types">選擇分類：</label>
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
    </div>

    <div>
        <label for="subject">投票主題：</label>
        <input type="text" name="subject" id="subject">
        
    </div>
    <div id="selector">
        <input type="radio" name="multiple" value="0" checked>
        <label>單選</label>
        <input type="radio" name="multiple" value="1" >
        <label>複選</label>
    </div>
    <div id="options">
        <div>
            <label>選項:</label><input type="text" name="option[]"><input type="button" value="新增選項" id="addvote">
        </div>
    </div>
    <input type="submit" value="新增">

</form>
<script>
    $('#addvote').click(function(){
                //jq
                const div1=$('#options'); 
                const addv=$('<div><label>選項:</label><input type="text" name="option[]"></div>');//建立 p元素+text jq node
                div1.append(addv);//把節點放進來(子層)
            });
    
</script>