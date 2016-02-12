//ファイルアップロード
<?php
	$count = count($_FILES['upfile']['name']);
	for($i = 0; $i < $count; $i++){
		$name = htmlspecialchars(@$_FILES['upfile']['name'][$i]);
		$uploadfile = "C:/nginx/html/uptest/picture/" . date('Ymd_H-i-s')."_" . $i .".". file_check($name, 1);

		if(file_check($name, 0)){
			if(move_uploaded_file(@$_FILES['upfile']['tmp_name'][$i], $uploadfile)){
				print("<h1>success</h1><br>");
			}
			else{
				print("<h1>false</h1><br>");
			}
		}
		else{
			print("<h1>false</h1><br>");
		}
	}
//ファイルチェックメソッド
//第一引数にファイル名、第二引数に返す値のスイッチ
//0の場合～リストと照らし合わせるリスト内にあればtrue,リストになければfalse
//1の場合～拡張子を返す
	function file_check($file, $num){
		static $file_list = array('jpg', 'png');
		$path = pathinfo($file);
		$ext = strtolower($path['extension']);
		if(in_array($ext, $file_list)){
			if($num == 0){
				return true;
			}
			elseif($num == 1){
				return $ext;
			}
		}
		else{
			if($num == 0){
				return false;
			}
			elseif($num == 1){
				return $ext;
			}
		}
	}	
?>
