﻿<?php

if( !isset($_GET['a']) || !isset($_GET['b'])
	|| !is_numeric($_GET['a']) 
	|| !is_numeric($_GET['b']) ){
	echo"參數不正確";
	exit;
}



if ( !isset($_GET['a']) || !isset($_GET['b']) ){
	echo "需要兩個完整的值";
	exit;
}
if ( !is_numeric($_GET['a']) || !is_numeric($_GET['b']) ){
	echo "需要兩個數值";
	exit;
}

$x = $_GET['a'];
$y = $_GET['b'];

$z = $x+$y;

echo $z;

