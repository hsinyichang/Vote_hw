<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.css"
        integrity="sha512-CJ5goVzT/8VLx0FE2KJwDxA7C6gVMkIGKDx31a84D7P4V3lOVJlGUhC2mEqmMHOFotYv4O0nqAOD0sEzsaLMBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.js"
        integrity="sha512-Kyb4n9EVHqUml4QZsvtNk6NDNGO3+Ta1757DSJqpxe7uJlHX1dgpQ6Sk77OGoYA4zl7QXcOK1AlWf8P61lSLfQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
<?php

include_once "./api/base.php";
?>
<h1 style="text-align: center;
    margin:0 auto 10px auto;
    border-radius: 20px;
    width: 200px;
    animation:slideInDown;
    animation-duration: 0.8s;
    color: #8501F5;
    text-shadow: 2px 2px 3px #E1B8F5;
    padding-top:2rem;
    font-weight: bolder;">分類管理</h1>
<div>
    <table id="table">
        <tr id="list-header">
            <td>分類名稱</td>
            <td>操作</td>
        </tr>
        <form action="./api/add_type.php" method="post">
        <tr id="list-add">
            <td id="list-add-td"><input type="text" name="name" id="name" title="分類名稱" required placeholder="輸入分類名稱"></td>
            <td><button class="btn btn-primary" style="height: 35px;" type="submit">送出</button></td>
        </tr>
        </form>
        <?php
        $types=all('types');
        foreach($types as $type){
            echo "<tr id='list-items'>";
            echo "<td>{$type['name']}</td>";
            echo "<td class='text-center'>";//操作區
            ?> 
            <a class="del" href="javascript:
            swal.fire({
            title:'確定要刪除<br>【<?=$type['name']?>】分類?',
            icon:'warning',
            text:'刪除就回不去了~~',
            showCancelButton: true,
            confirmButtonText: '刪除',
            cancelButtonText: '取消',
            }).then((result)=>{
                if(result.isConfirmed){
                window.location.href='./api/deltype.php?table=types&id=<?=$type['id'];?>';
                }else if(result.dismiss === Swal.DismissReason.cancel){
                    
                }
            });">刪除</a>
            <?php
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>