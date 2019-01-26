<?php
require_once "../php/Common.php";
$db = new Common();
$result = null;
$sql = "select * from user_info";


$data = $db->db_sql($sql);

var_dump(arr_change($data));

function arr_change($arr){
    $cnt = 0;
    $clm = null;
    foreach($arr as $column  => $_){
        $clm = array_push($column);
    }
    $result = $clm;
    
    return $result;
}

?>
