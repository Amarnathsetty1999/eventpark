<?php
session_start();
$cnt=0;
foreach($_SESSION as $key=>$value)
{
	if($key=="status") continue;
	$cnt++;
}
echo $cnt;
//session_destroy();
?>