<?php
require_once "../php/Common.php";
$db = new Common();

header('Content-type: text/plain; charset= UTF-8');

if(isset($_POST['sql'])){
    $sql = $_POST['sql'];
    $str = "\nAJAX REQUEST SUCCESS\nSQL:".$sql."\n";
    
    $dump = "\n".var_dump($db->db_sql($sql));
    $result = nl2br($str);
    echo $result;
    echo $dump;
}else{
    echo 'FAIL TO AJAX REQUEST';
}


?>
