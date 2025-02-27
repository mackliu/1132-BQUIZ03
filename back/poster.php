<div style="height:340px;">
    <h3 class='ct'>預告片清單</h3>
<div style="display:flex; justify-content:space-between;text-align:center
">
    <div style="width:25%">預告片海報</div>
    <div style="width:25%">預告片片名</div>
    <div style="width:25%">預告片排序</div>
    <div style="width:24%">操作</div>
</div>

<form action="./api/edit_poster.php" method="post">
<div style="overflow:auto;height:210px;" id="postList">
</div>
</form>
</div>



<script>
getPosters();

function getPosters(){
/*     $.get("./back/poster_list.php",function(res){
        $("#postList").html(res);
    }) */

   $("#postList").load("./back/poster_list.php",function(){
    $(".sw").on("click",function(){
        let id=$(this).data('id');
        let sw=$(this).data('sw');
        $.post("./api/sw.php",{table:'Poster',id,sw},()=>{
            getPosters();
        })
})
   });
}



</script>

<hr>
<div style="height:170px;">
<h3 class='ct'>新增預告片海報</h3>
<form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>預告片海報：</td>
            <td><input type="file" name="img" id=""></td>
            <td>預告片片名：</td>
            <td><input type="text" name="name" id=""></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>


</div>