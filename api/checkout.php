<?php include_once "db.php";

sort($_POST['seats']);
$_POST['no']=date("Ymd") . sprintf("%04d",$Order->max('id')+1);
$_POST['movie']=$_POST['name'];
$_POST['qt']=count($_POST['seats']);
$_POST['seats']=serialize($_POST['seats']);
unset($_POST['id'],$_POST['name']);

//dd($_POST);
$Order->save($_POST);

?>
<style>
.result{
    width:450px;
    margin:20px auto;
    padding:20px;
    background:#ccc;
    
}   
.result td{
    padding:5px;
    border:1px solid #999;

}
.result tr:nth-child(odd){
    background:#999;
} 
</style>
<table class="result">
    <tr>
        <td colspan=2>感謝您的訂購，您的訂單編號：<?=$_POST['no'];?></td>
    </tr>
    <tr>
        <td>電影名稱：</td>
        <td><?=$_POST['movie'];?></td>
    </tr>
    <tr>
        <td>日期：</td>
        <td><?=$_POST['date'];?></td>
    </tr>
    <tr>
        <td>場次時間：</td>
        <td><?=$_POST['session'];?></td>
    </tr>
    <tr>
        <td colspan='2'>
            座位:<br>
        <?php 
            $seats=unserialize($_POST['seats']);
            foreach($seats as $seat){
                echo floor($seat/5)+1 ."排".($seat%5+1)."號<br>";
            }
            echo "共".$_POST['qt']."張票";
        ?>
        </td>

    </tr>
    <tr>
        <td colspan='2' class='ct'>
            <button onclick="location.href='index.php'">確認</button>
        </td>
    </tr>
</table>