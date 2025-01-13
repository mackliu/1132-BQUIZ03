<?php include_once "db.php";

$movie=$_Movie->find($_GET['movie']);
$date=$_GET['date'];


$sess=[
    '1'=>"14:00~16:00",
    '2'=>"16:00~18:00",
    '3'=>"18:00~20:00",
    '4'=>"20:00~22:00",
    '5'=>"22:00~24:00"
];
$now=date("G");


for($i=0;$i<=5;$i++){

    echo "<option value=''>";
    echo "      剩餘座位 ";
    echo "</option>";
}