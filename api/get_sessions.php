<?php include_once "db.php";

$movie=$Movie->find($_GET['movie']);
$date=$_GET['date'];


$sess=[
    '1'=>"14:00~16:00",
    '2'=>"16:00~18:00",
    '3'=>"18:00~20:00",
    '4'=>"20:00~22:00",
    '5'=>"22:00~24:00"
];
$now=date("G")-13;

$start=($now>0)?ceil($now/2)+1:1;

$seats=20;

for($i=$start;$i<=5;$i++){
    $booked=$Order->sum('qt',[
        'movie'=>$movie['name'],
        'date'=>$date,
        'session'=>$sess[$i]
    ]);
    $seats=20-$booked;
    echo "<option value='{$sess[$i]}'>";
    echo "  {$sess[$i]} 剩餘座位 $seats";
    echo "</option>";
}