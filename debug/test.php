<?php

$result = array();        //グラフへ渡す結果が格納される。
$title  = ["時間帯","使用回数","時間-分"];    //データ名称を配列に格納する。

require_once "../php/Common.php";
$db  = new Common();
$sql = " SELECT EXTRACT (HOUR FROM "StartTime") ||':00' as 時間帯,COUNT(*) 使用回数 ,sum("UsedTime")時間 
FROM "RuiInfo" 
WHERE CAST("StartTime" as DATE) = '2018-12-27' 
GROUP BY EXTRACT(HOUR FROM "StartTime") 
ORDER BY EXTRACT(HOUR FROM "StartTime");";

    $day = $db->db_sql($sql);
    
    array_push($result,$title);//データ名称を格納する

    for($i=0;$i<24;$i++)      //0:00～23:00までのデータを格納する。
    {
        for($j=0;$j<count($day);$j++)    //$dayのデータの数だけfor文を回す
        {
            if($day[$j][0] == $i.":00")    //$dayの時間帯を参照し、対応する部分にデータを格納する
            {
                array_push($result,[$day[$j][0],$day[$j][1],$day[$j][2]]);
                break;        //データを格納した場合、ループを抜ける
            }
            else if($j==count($day)-1)    //対応するデータがなかった場合、時間帯と0,0を格納する
            {
                array_push($result,[$i.":00",0,0]);
            }
        }
    }

   var_dump($result);

?>
