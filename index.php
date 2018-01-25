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
	<link rel="stylesheet" href="css/style_index.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">	</head>
<body>
<div class="wrapper">
	<table>
		<tbody>
			<tr>
				<th class="w1">link</th>
				<th class="w2">書籍名</th>
				<!-- <th class="w3">URL</th> -->
				<th class="w4">コメント</th>
				<th class="w5">日時</th>
			</tr>
			<?php
				while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><a href="<?php echo $result['bookurl'];?>" target="_blank">
					<i class="fa fa-external-link" aria-hidden="true"></i></a>
				</td>
				<td><?php echo $result['bookname'];?></td>
				<td><?php echo $result['detail'];?></td>
				<td><?php echo $result['puttime'];?></td>
				
				
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
	
</body>
</html>

<?php 
}
?>