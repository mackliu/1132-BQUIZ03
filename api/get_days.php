<?php include_once "db.php";
$id=$_GET['movie'];
$row=$Movie->find($id);
$ondate=strtotime($row['ondate']);
$today=strtotime(date("Y-m-d"));

if(date("G")>=22){

    $passDay=floor(($today-$ondate)/(60*60*24))+1;
}else{
    $passDay=floor(($today-$ondate)/(60*60*24));
}

if($passDay>=3){
    echo "<option value='#'>本電影只上映至今日</option>";
    exit();
}
for($i=$passDay;$i<3;$i++){
    $date=date("Y-m-d",strtotime("+$i days",$ondate));
    echo "<option value='$date'>";
    echo $date;
    echo "</option>";
}