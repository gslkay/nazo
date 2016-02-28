<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>★ダウンロード★</title>
	</head>
	<body>
	<form action='control/download.php' method='post'>
		<?php

		require_once 'control/File_prosses.php';
		$a = new cFile();

		$i = 0;

		foreach(glob('file/*') as $file[$i]){
		    if(is_file($file[$i])){
		        if($a->file_check($file[$i], 0)){
		           print("<input type='radio' name='test' value='../". $file[$i] ."'>");
		           print($file[$i] ."<br>");
		           $i++;
		        }
		    }
		}
		//ファイル内が空のとき
		if($i == 0){
			print("<h2>empty</h2>");
		}

		?>
	<input name='submit' type='submit' value='ダウンロード'>
	</body>
</html>
