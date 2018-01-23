<?php 
//フォームのデータ受け取り
    $title = $_POST["title"];
    $detail = $_POST["detail"];


//DB定義
const DB = "";
const DB_ID = "root";
const DB_PW = "root";
const DB_NAME = "";

//PDOでデータベース接続
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gsblog_db;charset=utf8','root','');//root = databaseに接続する際のid pass・最後のクゥオーテーション内はxxampの場合無視
}catch (PDOException $e) {
    exit( 'DbConnectError:' . $e->getMessage());
}

// 実行したいSQL文
$sql = 'INSERT INTO gsblog_table(id,title,detail,posttime) VALUES(null,:title,:detail,sysdate())'; //実行ボタンを押す手前
    //VALUESの中は直接書きたい内容を書くことはしない

//MySQLで実行したいSQLセット。プリペアーステートメントで後から値は入れる
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title',$title,PDO::PARAM_STR);
$stmt->bindValue(':detail',$detail,PDO::PARAM_STR);
    //実行ボタンを押す手前

//実際に実行(mySQLで実行ボタンを押した状態)
$flag = $stmt->execute();

//実行完了した場合はentry.phpにリダイレクト
//失敗した場合はエラーメッセージ表示
if($flag==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    header('Location: entry.php');
	exit();
}

?>