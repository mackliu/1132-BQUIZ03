<?php include_once "db.php";

sort($_POST['seats']);
$_POST['no']=date("Ymd") . sprintf("%04d",$Order->max('id')+1);
$_POST['movie']=$_POST['name'];
$_POST['qt']=count($_POST['seats']);
$_POST['seats']=serialize($_POST['seats']);
unset($_POST['id'],$_POST['name']);

dd($_POST);
$Order->save($_POST);