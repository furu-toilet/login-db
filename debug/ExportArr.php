<?php
require_once "../php/Common.php";
$db = new Common();

isset($_POST['excute']){
    $_POST['result'] = $db->db_sql($_POST['sql']);
}

?>

function h($str){                   //HTMLに文字列出力
	return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

<html lang="ja">
<head>
    <title>dump creater</title>
    <meta charset="UTF-8">
</head>
<body>
    <h3>SQL</h3>
    <form method="post" name="sql_input">
        <input type="textarea" id="sql" name="sql">
        <input type="button" id="excute">
    </form>
    
    <div name="result" id="result"></div>

</body>
</html>
