<?php
/*
GetDailyTime.phpについて
1日ごとのトイレ使用時間を戻り値として返すphp
グラフでの仕様なので戻り値は「print」関数にて返す。
※形式はjson
*/

require_once "Common.php";      //～～おまじない～～
$db = new Common();             //
$result = array();
$timezone  = 24; //グラフのメモリを何時まで表示するか決める。


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

$sql = "
SELECT EXTRACT (HOUR FROM \"StartTime\")  ||':00',sum(\"UsedTime\")
FROM \"RuiInfo\"
WHERE CAST(\"StartTime\" as DATE) = CAST(CURRENT_TimeStamp + '9 hours'  as DATE)
GROUP BY EXTRACT(HOUR FROM \"StartTime\")
ORDER BY EXTRACT(HOUR FROM \"StartTime\") 
";      //DBManagerからSQL文が決まったらここに入力！

$daysum = $db->db_sql($sql);    //連想配列を取得   値は時間帯(Str型),利用時間(int型)

array_push($result,array("時間帯","使用回数"));

for($i=0;$i<24;$i++)
{
    array_push($result,[$i.":00",0]);
}

$icount = 0;
foreach($result as $i)      //0:00～23:00までのデータを格納する。
{    
     $jcount = 0;    //foreach文を何回実行したかをカウントする。
    foreach($daysum as list($a,$b))    //$dayのデータの数だけforeach文を回す
    {
        if($a == ($icount - 1).":00")    //$dayの時間帯を参照し、対応する部分にデータを格納する
        {                
            $result[$icount]=[$a,$b];
            break;        //データを格納した場合、ループを抜ける
        }            
        $jcount++;
    }
    $icount++;
} 

echo json_encode( $result );

?>
