<style>
#info{
    width:540px;
    height:370px;
    margin:auto;
}
#movieInfo{
    width:540px;
    height:120px;
    margin:auto;
    background:#ccc;
    padding:10px 100px;
}

#info{
    background-image:url("icon/03D04.png");
    background-position:center;
    background-repeat:no-repeat;
    padding:19px 110px 14px 110px;
    display:flex;
    flex-wrap:wrap;
}
.seat{
    width:64px;
    height:85px;
    text-align: center;
    padding:2px;
    position:relative;
}
.null{
    background:url("icon/03D02.png") center no-repeat;
}
.booked{
    background:url("icon/03D03.png") center no-repeat;
}

.chk{
    position:absolute;
    right:2px;
    bottom:2px;
}
</style>
<?php  include_once "db.php";?>

<div id="info">
    <?php 
        for($i=0;$i<20;$i++){
            echo "<div class='seat null'>";
            echo  floor($i/5)+1 ."排".($i%5+1)."號";
            echo "<input type='checkbox' class='chk' value='$i'>";
            echo "</div>";
        }
    ?>

</div>
<div id="movieInfo">
    <div>您選擇的電影是：<?=$_GET['name'];?></div>
    <div>您選擇的時刻是：<?=$_GET['date']."&nbsp;&nbsp;".$_GET['session'];?></div>
    <div>您已經勾選<span id='tickets'></span>張票，最多可以購買四張票</div>
    <div class='ct'>
        <button onclick="$('#booking,#order').toggle()">上一步</button>
        <button onclick="checkout()">訂購</button>
    </div>

</div>
<script>
let seats=new Array();
//let num={1:'一',2:'二',3:'三',4:'四'};

$(".chk").on("change",function(){
    if($(this).prop('checked')){
        if(seats.length>3){
            alert("最多只能選四張票");
            $(this).prop('checked',false)
        }else{
            seats.push($(this).val())
        }
    }else{
        seats.splice(seats.indexOf($(this).val()),1)
    }
    $("#tickets").text(seats.length)
    //$("#tickets").text(num[seats.length])
    //console.log(seats)

})

function checkout(){
    movie.seats=seats;
    //console.log(movie)
    $.post("api/checkout.php",movie,function(res){
        //console.log(res)
        $("#mm").html(res);
    })
}

</script>