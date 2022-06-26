<?php
//紀錄投票結果
include_once "base.php";
$user=find('users',['acc'=>$_SESSION['user']]);//設變數user=先找到users資料表裡面的登入者(session)帳號
if (isset($_POST['opt'])) {
    if (is_array($_POST['opt'])) {
        foreach ($_POST['opt'] as $key => $opt) {
            $option = find("options", $opt);
            $option['total']++;
            save("options", $option);
            if ($key == 0) {
                $subject = find("subjects", $option['subject_id']);
                $subject['total']++;
                save("subjects", $subject);
            }
            $log = ['user_id' => (isset($_SESSION['user'])) ? $user['id'] : 0,//若有session 則為該帳號的id
                'subject_id' => $subject['id'],
                'option_id' => $option['id']];
            save("logs", $log);
        }

    } else {

        $option = find("options", $_POST['opt']);
        $option['total']++;
        save("options", $option);
        $subject = find("subjects", $option['subject_id']);
        $subject['total']++;
        save("subjects", $subject);
        $log = ['user_id' => (isset($_SESSION['user'])) ? $user['id'] : 0,
            'subject_id' => $subject['id'],
            'option_id' => $option['id']];
        save("logs", $log);
    }
}
to("../index.php?do=vote_result&id={$option['subject_id']}");