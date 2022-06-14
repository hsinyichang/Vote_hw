<?php
session_start();
date_default_timezone_set('Asian/Taipei');

function pdo(){
    $dsn="mysql:host=localhost;character=utf8;dbname=vote";
    return new PDO($dsn,'root','');
}   


?>