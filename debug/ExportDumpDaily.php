<?php
require_once "./../php/Common.php";
$db = new Common();

$sql = "select \"Status\" from \"ToiletTerminal\"";

var_dump($db->db_sql($sql));    //ダンプファイルを表示

?>
