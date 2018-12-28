<?php
$result = null;
$msg = null;
$sql = $_POST['sql'];

header('Content-type: text/plain; charset= UTF-8');

if(isset($_POST['sql_submit'])){    //実行ボタン後の処理
	require "./php/Common.php";
	$db = new Common();
	$sql = $_POST['sql'];
	$result = $db->db_sql($sql);   //SQL実行（戻り値あり）
	
	
	$db->db_close();          //接続切断
}

function h($str){                   //HTMLに文字列出力
	//return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
	echo $str;
}



if(!empty($sql)){           //SQL実行した場合       
          echo "実行SQL：" . $sql;
	  <br>
    if($db->db_msg() == null){       //エラー時の表示を制御
	    echo "正常終了"; <br>
            <table>
            <tr>
        foreach($result[0] as $key => $_){
            <th> echo $key; </th>
        }
            </tr>
        foreach($result as $values){
            <tr>
                foreach($values as $value):
                    <td> echo $value; </td>
                }
            </tr>
        }
            </table>

    }else{  //エラーメッセージ	  
          echo $db->db_msg();	     
    }   //else end
          
}  
?>
