
<?php include_once "../api/db.php";?>

<?php
$rows=$Poster->all(" order by rank");
foreach($rows as $idx => $row):
    $prev=($idx!=0)?$rows[$idx-1]['id']:$row['id'];
    $next=($idx!=(count($rows)-1))?$rows[$idx+1]['id']:$row['id'];
?>
<div style="display:flex; justify-content:space-between;text-align:center
">
    <div style="width:25%">
        <img src="./upload/<?=$row['img'];?>" style="width:65px;">
    </div>
    <div style="width:25%">
        <input type="text" name="name[]" value="<?=$row['name'];?>">
        </div>
    <div style="width:25%">
        <?php if($row['id']!=$prev):?>
        <input type="button" value="往上" class='sw' data-id="<?=$row['id'];?>" data-sw="<?=$prev;?>">
        <?php endif;?>
        <?php if($row['id']!=$next):?>
        <input type="button" value="往下" class='sw' data-id="<?=$row['id'];?>" data-sw="<?=$next;?>">
        <?php endif;?>
    </div>
    <div style="width:24%">
        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>顯示
        <input type="checkbox" name="del[]" value="<?=$row['id'];?>" >刪除
        <select name="ani[]" id="" >
            <option value="1"  <?=($row['ani']==1)?"selected":"";?>>淡入淡出</option>
            <option value="2"  <?=($row['ani']==2)?"selected":"";?>>縮放</option>
            <option value="3"  <?=($row['ani']==3)?"selected":"";?>>滑入滑出</option>
        </select>
    </div>
    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
</div>
<hr>
<?php 
endforeach;
?>

<div class="ct">
    <input type="submit" value="編輯確定"><input type="reset" value="重置">
</div>
