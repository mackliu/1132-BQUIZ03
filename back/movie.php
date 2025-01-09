<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>


<div style="height:425px; overflow:auto;">

<?php 
$rows=$Movie->all(" order by rank");
foreach($rows as $row):

?>
<div style="display:flex;">
    <div style="width:10%;">
        <img src="./upload/<?=$row['poster'];?>" style="width:80px;height:100px;">
    </div>
    <div style="width:10%;">
        分級: <img src="./icon/03C0<?=$row['level'];?>.png" alt="">
    </div>
    <div style="width:80%;">
        <div style="display:flex;text-align:center;justify-content:space-between;">
            <div>片名:<?=$row['name'];?></div>
            <div>片長:<?=$row['length'];?></div>
            <div>上映時間:<?=$row['ondate'];?></div>
        </div>
        <div>
            <button data-id="<?=$row['id'];?>">隱藏</button>
            <button data-id="<?=$row['id'];?>">往上</button>
            <button data-id="<?=$row['id'];?>">往下</button>
            <button onclick="location.href='?do=edit_movie&id=<?=$row['id'];?>'">編輯電影</button>
            <button class="del" data-id="<?=$row['id'];?>">刪除電影</button>
        </div>
        <div>
            劇情介紹：<?=nl2br($row['intro']);?>
        </div>
    </div>

</div>
<hr>
<?php endforeach; ?>

</div>