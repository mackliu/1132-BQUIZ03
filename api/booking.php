<style>
#info{
    width:540px;
    height:370px;
    margin:auto;
}
#movieInfo{
    width:540px;
    height:100px;
    margin:auto;
    background:#ccc;
    padding:10px 100px;
}
</style>
<?php  include_once "db.php";?>

<div id="info"></div>
<div id="movieInfo">
    <div>您選擇的電影是：<?=$_GET['name'];?></div>
    <div>您選擇的時刻是：<?=$_GET['date']."&nbsp;&nbsp;".$_GET['session'];?></div>
    <div>您已經<span id='tickets'></span>勾選張票，最多可以購買四張票</div>
    <div class='ct'>
        <button onclick="$('#booking,#order').toggle()">上一步</button>
        <button onclick="checkout()">訂購</button>
    </div>

</div>