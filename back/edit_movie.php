<style>
.form{
    width:95%;
    margin:auto;
    display:flex;
}
.form div:nth-child(1){
    width:15%;
    padding:5px;
    text-align-last:justify;
}
.form div:nth-child(2){
    width:85%;
    padding:5px;
}
</style>
<?php 

$row=$Movie->find($_GET['id']);

list($year,$month,$day)=explode("-",$row['ondate']);

?>
<form action="./api/save_movie.php" method="post" enctype="multipart/form-data">

<div style="width:70%;margin:auto;display:flex;">
    <div style="width:15%">影片資料</div>
    <div style="width:85%">
        <div class="form">
            <div>片名</div>：
            <div><input type="text" name="name" value="<?=$row['name'];?>"></div>
        </div>
        <div class="form">
            <div>分級</div>：
            <div>
                <select name="level" id="">
                    <option value="1" <?=($row['level']==1)?'selected':'';?>>普通級</option>
                    <option value="2" <?=($row['level']==2)?'selected':'';?>>輔導級</option>
                    <option value="3" <?=($row['level']==3)?'selected':'';?>>保護級</option>
                    <option value="4" <?=($row['level']==4)?'selected':'';?>>限制級</option>
                </select>
            </div>
        </div>
        <div class="form">
            <div>片長</div>：
            <div>
                 <input type="number" name="length" value="<?=$row['length'];?>">
            </div>
        </div>
        <div class="form">
            <div>上映日期</div>：
            <div>
                <select name="year" id="">
                    <option value="2025" <?=($year==2025)?'selected':'';?>>2025</option>
                    <option value="2026" <?=($year==2026)?'selected':'';?>>2026</option>
                </select>年
                <select name="month" id="">
                    <?php
                    for($i=1;$i<=12;$i++){
                        $selected=($i==$month)?"selected":"";
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>月
                <select name="day" id="">
                <?php
                    for($i=1;$i<=31;$i++){
                        $selected=($i==$day)?"selected":"";
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>日
            </div>
        </div>
        <div class="form">
            <div>發行商</div>：
            <div><input type="text" name="publish" value="<?=$row['publish'];?>"></div>
        </div>
        <div class="form">
            <div>導演</div>：
            <div><input type="text" name="director" value="<?=$row['director'];?>"></div>
        </div>
        <div class="form">
            <div>預告影片</div>：
            <div><input type="file" name="trailer" id=""></div>
        </div>
        <div class="form">
            <div>電影海報</div>：
            <div><input type="file" name="poster" id=""></div>
        </div>
    </div>
</div>
<div style="display:flex;width:70%;margin:auto;">
    <div style="width:15%;">劇情簡介</div>
    <div style="width:85%">
        <textarea name="intro" id="" style="width:99%"><?=$row['intro'];?></textarea>
    </div>
</div>
<div class="ct">
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <input type="submit" value="編輯">
    <input type="reset" value="重置">
</div>
</form>