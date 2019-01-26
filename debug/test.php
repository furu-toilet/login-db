<?php
require_once "../php/Common.php";
$db = new Common();
$result = null;
$sql = "select * from user_info";


$data = $db->db_sql($sql);


$cnt = 0;
$clm = null;
foreach($data as $column  => $_){
    $clm = array_push($column);
}
$result = $clm;


echo $result;
var_dump($data);
    
?>
