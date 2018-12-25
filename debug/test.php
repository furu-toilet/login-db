<?php
require_once "./../php/Common.php";
$db = new Common();

$sql = "select \"Status\" from \"ToiletTerminal\"";


$result = $db->db_sql($sql);    //ダンプファイルを表示

if(count($result) == 1)       //1レコードを想定しているのでそれ以外は排除
 {           
  $arr = $result[0];               //二次元配列から配列を取り出し、一次元配列にする。
  $status = $arr['Status'];        //使用状況（int）の値を取り出す。
 }

echo json_encode( $status );
?>
