<?php
if( !isset($_POST['id'])
	|| !isset($_POST['prod']) || !isset($_POST['price'])
	|| empty($_POST['price']) 
	|| empty($_POST['prod']) )
{
	echo '����';
	echo '<a href="list.php">�^��C��</a>';
	exit;
}

//��Ʈw�s�u
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
//�d��
$stmt = $db->prepare('update moneybook set name=?,cost=? where m_id = ?');
$stmt->execute([$_POST['prod'],$_POST['price'],$_POST['id']]);
	
//����
header('Location: list.php',TRUE,303); 