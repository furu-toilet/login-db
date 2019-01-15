<?php
/*
GetWeeklyTime.phpについて
1日ごとのトイレ使用時間を戻り値として返すphp
グラフでの仕様なので戻り値は「print」関数にて返す。
※形式はjson
※配列

ex）[
    ['日','回数'],
    [8:00,  2],
    [9:00,  5]    
    ]

*/

require_once "Common.php";      //～～おまじない～～
$db = new Common();             //
$result = array();
array_push($result,array("日付","使用時間"));

for($i=6;$i>-1;$i--)
{
	array_push($result,array(date(j,strtotime("-".$i."day")),0));	//日付と0を配列に加える。
}

$count = 6;

foreach($result as $a)
{
	$sql = "SELECT EXTRACT (Day FROM \"Date\"),sum(\"UsedTime\")
            FROM \"RuiInfo\"
            WHERE \"Date\" = CURRENT_Date - ".($count+1). 
        	"GROUP BY \"Date\";";
	$arr = $db->db_sql($sql);    //連想配列を取得   値は値は　日付(str型)と使用時間（int型）
	
	if($arr[0][0] == date(j,strtotime("-".($count+1)."day")))//使用データがあった場合、対応する日付の部分にデータを格納する
	 {
		$a[8-$count]=$arr[0];
	 }
	
	$count--;
}

$db->db_close();

//echo json_encode($result);

echo $result;


?>
