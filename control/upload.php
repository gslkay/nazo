<!--�t�@�C���A�b�v���[�h-->
<?php
	require_once 'File_prosses.php';
	$a = new cFile;

	$count = count($_FILES['upfile']['name']);

	for($i = 0; $i < $count; $i++){

		$name = htmlspecialchars(@$_FILES['upfile']['name'][$i]);
		$uploadfile = "../file/" . date('Ymd_H-i-s')."_" . $i .".". $a->file_check($name, 1);

		if($a->file_check($name, 0)){
			//�A�b�v���[�h����
			if(move_uploaded_file(@$_FILES['upfile']['tmp_name'][$i], $uploadfile)){
				print("<h1>success</h1><br>");
			}
			//�A�b�v���[�h���s
			else{
				print("<h1>false0</h1><br>");
			}
		}
		//�A�b�v���[�h�ł��Ȃ��t�@�C��
		else{
			print("<h1>false1</h1><br>");
		}
	}
?>