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

require_once "Common.php";      //～～おまじない～～
$db = new Common();             //
$result = null;


/*グラフ用データの土台を作成する    

ex）[
    ['時間','利用時間'],
    [0:00,  0],
    [1:00,  0] 
         ・
         ・
         ・
    [23:00, 0]
*/

$time = array();
$count = array();
$usedtime = array();

for($i=0;$i<24;$i++)
{
    $time[$i] = $i.":00";
    $count[$i] = 0;
    $usedtime[$i] = 0;
}

$daycount = array($time, $count);

//今日の
$sql = "
SELECT EXTRACT (HOUR FROM \"StartTime\")  ||':00',COUNT(*)
FROM \"RuiInfo\"
WHERE CAST(\"StartTime\" as DATE) = CAST(CURRENT_TimeStamp + '9 hours'  as DATE)
GROUP BY EXTRACT(HOUR FROM \"StartTime\")
ORDER BY EXTRACT(HOUR FROM \"StartTime\");
";      //DBManagerからSQL文が決まったらここに入力！
$result = $db->db_sql($sql);    //連想配列を取得   値は端末情報、使用状況、最終利用日時（varchar,int,timestamp）

//使用された時間帯の使用回数を更新する
for ($i=0;$i<(count($result,1)-count($result))/count($result);$i ++)
{
 for ($j=0;$j<count($time);$j++)
  {
  if($result[0][$i] == $daycount[0][$j])
     {
     $daycount[1][$j]=$result[1][$i];
     }
  }
}


$db->db_close();

//header('Content-type: text/javascript; charset=utf-8');     //~~おまじない~~
//print $_GET['jsoncallback']."(".json_encode( $daycount ).")";  //json形式で返す

var_dump($daycount);







?>
