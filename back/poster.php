<div style="height:340px;">
    <h3 class='ct'>預告片清單</h3>
</div>
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