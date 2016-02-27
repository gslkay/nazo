<!--ファイル操作-->
<?php
//ファイルチェッククラス
class cFile{
    /*----------------------------------------------------------*
    |ファイルチェック関数                                               |
    |   第一引数にファイル名、第二引数に返す値のフラグ                       |
    |   「$num = 0」のときリストと比較してアップできるなら「true」、できないなら「false」 |
    |   「$num = 1」のときアップロードできるファイルの拡張子を返す                |
    *-----------------------------------------------------------*/
    function file_check($file, $num){
        static $file_list = array('jpg', 'png', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xlsx', 'xls', 'txt');
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
}

//ファイルダウンロードクラス
class dFile{
    //ファイルダウンロードメソッド
    function download($file){
        if(isset($file) == ''){
            print("error");
        }
        else{
            try{
                header('Content-Type: application/force-download');
                header('Content-Length: '. filesize($file));
                header('Content-disposition: attachment; filename="' .$file .'"');
                ob_end_clean();
                readfile($file, FILE_BINARY);
            }
            catch(Exception $e){
                print("<h1>error</h1>");
            }
        }
    }
}
?>