<?php 
//DB定義
const DB = "";
const DB_ID = "";
const DB_PW = "";
const DB_NAME = "";

//PDOでデータベース接続
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gs_db;charset=utf8','root','');//root = databaseに接続する際のid pass・最後のクゥオーテーション内はxxampの場合無視
}catch (PDOException $e) {
    exit( 'DbConnectError:' . $e->getMessage());
}

// 実行したいSQL文（最新順番3つ取得）
$sql = 'SELECT * FROM gs_an_table ORDER BY puttime';

//MySQLで実行したいSQLセット。プリペアーステートメントで後から値は入れる
$stmt = $pdo->prepare($sql);
$flag = $stmt->execute();

if($flag==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{//以下sqlの実行が成功した場合。


?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/sanitize.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<table>
	<tbody>
		<tr>
			<th>id</th>
			<th>書籍名</th>
			<th>URL</th>
			<th>コメント</th>
			<th>日時</th>
		</tr>
		<?php
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		?>
		<tr>
			<td><?php echo $result['id'];?></td>
			<td><?php echo $result['bookname'];?></td>
			<td><a href="<?php echo $result['bookurl'];?>" target="_blank">
					<?php echo $result['bookurl'];?>
				</a>
			</td>
			<td><?php echo $result['detail'];?></td>
			<td><?php echo $result['puttime'];?></td>
		</tr>
		<?php } ?>
	</tbody>
	</table>
	
</body>
</html>

<?php 
}
?>