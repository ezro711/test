<?php
$a=$_GET["x1"];
$b=$_GET["x2"];
if($a+$b){
	echo$a-$b;
}else{
	echo$b-$a;
}