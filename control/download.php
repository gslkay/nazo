<!--ファイルダウンロード-->
<?php
require_once 'File_prosses.php';
$a = new dFile();

//POSTが空のとき「error」を表示
if(isset($_POST['test']) == ''){
	print("<h1>error</h1>");
}
//POSTに値が入っているときダウンロード処理を行う
else{
	try{
		$a->download($_POST['test']);
	}
	catch(Exception $e){
		print("miss");
	}
}
?>
