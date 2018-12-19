<?php
require_once "./../php/Common.php";
$db = new Common();

$sql = "select * from \"RuiInfo\"";
var_dump($db->db_sql($sql));

?>
