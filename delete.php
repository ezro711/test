<?php
if( !isset($_GET['id']) || empty($_GET['id']) )
{
	echo '����';
	echo '<a href="list.php">�^��C��</a>';
	exit;
}
try {
	$db = new PDO('mysql:host=localhost;dbname=test1001;charset=utf8'
		,'ezro711','0014', array( 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		) );
}catch(PDOException $err) {
	echo "ERROR:";
	echo $err->getMessage();  //�u��@�ɤ��o�˰�
	echo '<a href="list.php">�^��C��</a>';
	exit;
}
$stmt = $db->prepare('delete from moneybook where m_id=?');
$stmt->execute([$_GET['id']]);
header('Location: list.php',TRUE,303);  //�S�g,TRUE,333�]�i�H�A���O..