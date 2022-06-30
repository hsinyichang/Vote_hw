<?php
include_once "base.php";

$table=$_GET['table'];
$id=$_GET['id'];
if($table=='types'){
    del($table,$id);
}else{
    del($table,$id);
}

to("../back.php");
?>