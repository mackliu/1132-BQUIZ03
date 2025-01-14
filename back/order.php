<h1 class='ct'>訂單清單</h1>
<div>
    快速刪除：
    <input type="radio" name="type"  value='date' checked>依日期
    <input type="text" name="date" id="date">
    
    <input type="radio" name="type" value="movie">依電影
    <select name="movie" id="movie">
        <?php
            $movies=q("select movie from orders group by `movie`");
            foreach($movies as $movie){
                echo "<option value='{$movie['movie']}'>";
                echo $movie['movie'];
                echo "</option>";
            }
        ?>
    </select>
    <button onclick="qdel()">刪除</button>
</div>
<style>
    .header{
        display:flex;
        background:#ccc;
        padding:5px 0;
    }
    .header div{
        width:14.2%;
        text-align:center;
    }
</style>
<div class='header'>
    <div>訂單編號</div>
    <div>電影名稱</div>
    <div>日期</div>
    <div>場次時間</div>
    <div>訂購數量</div>
    <div>訂購位置</div>
    <div>操作</div>
</div>
<div style="height:300px;overflow:auto">
    <?php 
    $orders=$Order->all(" order by no desc");
    foreach($orders as $order):

    ?>
    <div style="display:flex;align-items:center">
        <div style="text-align:center;width:14.2%"><?=$order['no'];?></div>
        <div style="text-align:center;width:14.2%"><?=$order['movie'];?></div>
        <div style="text-align:center;width:14.2%"><?=$order['date'];?></div>
        <div style="text-align:center;width:14.2%"><?=$order['session'];?></div>
        <div style="text-align:center;width:14.2%"><?=$order['qt'];?></div>
        <div style="text-align:center;width:14.2%">
            <?php
            $seats=unserialize($order['seats']) ;
            foreach($seats as $seat){
                echo floor($seat/5)+1 ."排".($seat%5+1)."號<br>";
            }
            ?>
        </div>
        <div style="text-align:center;width:14.2%">
            <button  onclick="del(<?=$order['id'];?>)">刪除</button>
        </div>
    </div>
    <hr>
    <?php endforeach; ?>
</div>

<script>
function del(id){
    if(confirm("確定要刪除此訂單嗎?")){
        $.post("api/del.php",{table:'Order',id},function(){
            location.reload();
        })
    }
}

function qdel(){
    let type=$("input[name='type']:checked").val();
    let data="";
    switch(type){
        case "date":
            data=$("#date").val();
        break;
        case "movie":
            data=$("#movie").val();
        break;
    }

    if(confirm("確定要刪除所有符合條件的訂單嗎?")){
        $.post("api/qdel.php",{type,data},function(){
            location.reload();
        })
    }

}
</script>