<?php include_once "db.php";

$today=date("Y-m-d");
$ondate=date("Y-m-d",strtotime("-2 days"));
$rows=$Movie->all(['sh'=>1]," AND ondate BETWEEN '$ondate' AND '$today' order by rank");
foreach($rows as $row){
    echo "<option value='{$row['id']}'>";
    echo $row['name'];
    echo "</otion>";
}
