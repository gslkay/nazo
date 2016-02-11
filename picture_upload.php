<?php
	$count = count($_FILES['upfile']['name']);
	for($i = 0; $i < $count; $i++){
		$name = htmlspecialchars(@$_FILES['upfile']['name'][$i]);
		$uploadfile = "C:/nginx/html/uptest/picture/" . date('Ymd_H-i-s')."_" . $i .".". file_ext($name);

		if(file_check($name)){
			if(move_uploaded_file(@$_FILES['upfile']['tmp_name'][$i], $uploadfile)){
				print("<h1>success0</h1><br>");
			}
			else{
				print("<h1>false</h1><br>");
			}
		}
		else{
			print("<h1>false</h1><br>");
		}
			print(file_ext($name).'<br>');
			print("<h2>success1</h2><br>");
			print($_FILES['upfile']['tmp_name'][$i]."<br><br>");
	}

	function file_check($file){
		static $file_list = array('jpg', 'png');
		$path = pathinfo($file);
		$ext = strtolower($path['extension']);
		if(in_array($ext, $file_list)){
			return true;
		}
		else{
			return false;
		}
	}
	function file_ext($file){
		static $file_name = array('jpg', 'png');
		$path = pathinfo($file);
		$ext = strtolower($path['extension']);
		if(in_array($ext, $file_name)){
			return $ext;
		}
		else{
			return $ext;
		}
	}
		
?>
