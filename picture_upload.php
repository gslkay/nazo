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
