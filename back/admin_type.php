<?php

include_once "./api/base.php";
?>
<form action="../api/add_type.php" method="post">
    <div>
        <label for="name">新增分類:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <input class="btn btn-primary" type="submit" value="送出">
    </div>
</form>
<div>
    <table id="table">
        <tr id="list-header">
            <td>分類名稱</td>
            <td>操作</td>
        </tr>
        <?php
        $types=all('types');
        foreach($types as $type){
            echo "<tr class='list-items'>";
            echo "<td>{$type['name']}</td>";
            echo "<td class='text-center'>";//操作區
                echo "<a class='del' href='?do=deltype&id={$type['id']}'>刪除</a>";
                echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>