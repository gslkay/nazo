<!--ファイルアップロード-->
<?php
	require_once 'File_prosses.php';
	$a = new cFile();

	$count = count($_FILES['upfile']['name']);

	for($i = 0; $i < $count; $i++){

		$name = htmlspecialchars(@$_FILES['upfile']['name'][$i]);
		$uploadfile = "../file/" . date('Ymd_H-i-s')."_" . $i .".". $a->file_check($name, 1);

		if($a->file_check($name, 0)){
			//アップロード処理
			if(move_uploaded_file(@$_FILES['upfile']['tmp_name'][$i], $uploadfile)){
				print("<h1>success</h1><br>");
			}
			//アップロード失敗
			else{
				print("<h1>false0</h1><br>");
			}
		}
		//アップロードできないファイル
		else{
			print("<h1>false1</h1><br>");
		}
	}
?>
