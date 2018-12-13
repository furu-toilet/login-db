<?php
/*
GetDailyCount.phpについて
1日ごとのトイレ使用回数を戻り値として返すphp
グラフでの仕様なので戻り値は「print」関数にて返す。
※形式はjson
※配列

ex）[
    ['時間','回数'],
    [8:00,  2],
    [9:00,  5]    
    ]

*/

require_once "./Common.php";      //～～おまじない～～
$db = new Common();             //
$result = null;

$sql = "SELECT EXTRACT(HOUR FROM \"StartTime\")  ||':00',COUNT(*)

FROM \"RuiInfo\"

GROUP BY EXTRACT(HOUR FROM \"StartTime\")

ORDER BY EXTRACT(HOUR FROM \"StartTime\")";  //DBManagerからSQL文が決まったらここに入力！



//$sql = "select * from ToiletStatusRui";

$result = $db->db_sql($sql);    //連想配列を取得   値は端末情報、使用状況、最終利用日時（varchar,int,timestamp）

$db->db_close();

//header('Content-type: text/javascript; charset=utf-8');     //~~おまじない~~
echo json_encode( $result );  //json形式で返す

//var_dump($result);







?>
