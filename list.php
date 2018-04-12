<!DOCTYPE html>
<html lang="zh_Hang">
<head>
<meta charset="utf-8">
<title>列表</title>
</head>
<body>

<a href = "add_form.html">新增</a>

<?php
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
	exit;
}

//查詢
//等同 $stmt = $db->query('select * form moneybook');
$stmt = $db->prepare('select * from moneybook');
$stmt->execute();

echo '<table border=1>';
while($row = $stmt->fetch()){
	echo '<tr>';
	//echo '<td>'.$row['m_id'].'</td>';
	echo '<td>'.$row['name'].'</td>';
	echo '<td>'.$row['cost'].'</td>';
	echo '<td>';
	echo '<a href="edit.php?id='.$row['m_id'].'">修改</a> | ';
	echo '<a href="delete.php?id='.$row['m_id'].'">刪除</a>';
	echo '</td>';
	echo '</tr>';
}

echo '</table>';

?>

</body>
</html>