<?php
if( !isset($_POST['id'])
	|| !isset($_POST['prod']) || !isset($_POST['price'])
	|| empty($_POST['price']) 
	|| empty($_POST['prod']) )
{
	echo '不對';
	echo '<a href="list.php">回到列表</a>';
	exit;
}

//資料庫連線
try {
	$db = new PDO('mysql:host=localhost;dbname=test1001;charset=utf8'
		,'ezro711','0014', array( 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		) );
}catch(PDOException $err) {
	echo "ERROR:";
	echo $err->getMessage();  //真實世界不這樣做
	echo '<a href="list.php">回到列表</a>';
	exit;
}
//查詢
$stmt = $db->prepare('update moneybook set name=?,cost=? where m_id = ?');
$stmt->execute([$_POST['prod'],$_POST['price'],$_POST['id']]);
	
//善後
header('Location: list.php',TRUE,303); 