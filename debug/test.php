<?php
require_once "../php/Common.php";
$db = new Common();
$result = null;
header('Content-type: text/plain; charset= UTF-8');
//if(isset($_POST['sql'])){
    //$sql = $_POST['sql'];
    $sql = "select * from user_info";
    $str = "\n\n\nAJAX REQUEST SUCCESS\nSQL:".$sql."\n";
    
    $data = $db->db_sql($sql);
    
    if($data == null){
        $dump = "該当データなし";
    }else {
        //$dump = "\n".var_dump($data);
        //$dump = var_dump($data);
    }
    //$result = nl2br($str);
    //echo $result;
    //echo arr_change($data);
    var_dump(arr_change($data));
//}else{
    //echo 'FAIL TO AJAX REQUEST';
//}

function arr_change($arr){
    $result = null;
    $cnt = 0;
    $clm = null;
    foreach($arr as $column){
        $clm = array_push($column[0]);
    }
    $result = $clm;
    
    return $result;
}

?>
