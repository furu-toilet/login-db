<?php
/*
※コードについて
###現在の###トイレの状態をセットするPHPファイルです。     ###空室###
URLを開くと自動で状態がセットされます。
※注意
Common.phpとこのファイルは同一ディレクトリに保存してください。
*/
require_once "Common.php";      //～～おまじない～～
$db = new Common();             //

$sql = 'UPDATE "ToiletTerminal" SET"Status" =  ';      //DBManagerからSQL文が決まったらここに入力！

if($status !== 0){   //在室ならDBを操作しない（誤作動の可能性を考慮）
    $sql = "UPDATE "ToiletTerminal" SET"Status" =  0";      //DBManagerからSQL文が決まったらここに入力！
    $db->db_sql($sql);    //状態のセット実行
}

$db->db_close();
?>
