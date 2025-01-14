<?php include_once "db.php";

$Order->del([$_POST['type']=>$_POST['data']]);
