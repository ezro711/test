<!DOCTYPE html>
<html lang="zh_Hang">
<head>
<meta charset="utf-8">
<title>列表</title>
</head>
<body>

<?php
if( !isset($_GET['id']) || empty($_GET['id']) )
{
	echo '不對';
	echo '<a href="list.php">回到列表</a>';
	exit;
}

//連接資料庫
try {
	$db = new PDO('mysql:host=localhost;dbname=test1001;charset=utf8'
		,'ezro711','0014', array( 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		) );
}catch(PDOException $err) {
	echo "ERROR:";
	echo $err->getMessage();
	echo '<a href="list.php">回到列表</a>';
	exit;
}
	
//查詢
//等同 $stmt = $db->query('select * form moneybook');
$stmt = $db->prepare('select * from moneybook where m_id = ?');
$stmt->execute([$_GET['id']]);
	
	
//檢查結果
$row = $stmt->fetch();
if( !$row ){
	echo '資料不存在';
	echo '<a href="list.php">回到列表</a>';
	exit;	
}
?>

<form method="POST" action="update.php">
	<input type="hidden" name="id" value="<?php echo $row['m_id']; ?>">
	請輸入商品 : <input type="text" name="prod" value="<?php echo $row['name']; ?>">
	請輸入價錢 : <input type="text" name="price" value="<?php echo $row['cost']; ?>"><br>
	<input type="submit"><a href = "list.php">取消</a>
</form>

</body>
</html>