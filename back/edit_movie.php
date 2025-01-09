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
<form action="./api/add_movie.php" method="post" enctype="multpart/form-data">

<div style="width:70%;margin:auto;display:flex;">
    <div style="width:15%">影片資料</div>
    <div style="width:85%">
        <div class="form">
            <div>片名</div>：
            <div><input type="text" name="name" id=""></div>
        </div>
        <div class="form">
            <div>分級</div>：
            <div>
                <select name="level" id="">
                    <option value="1">普通級</option>
                    <option value="2">保護級</option>
                    <option value="3">輔導級</option>
                    <option value="4">限制級</option>
                </select>
            </div>
        </div>
        <div class="form">
            <div>片長</div>：
            <div>
                 <input type="number" name="length" id="">
            </div>
        </div>
        <div class="form">
            <div>上映日期</div>：
            <div>
                <select name="year" id="">
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>年
                <select name="month" id="">
                    <?php
                    for($i=1;$i<=12;$i++){
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>月
                <select name="day" id="">
                <?php
                    for($i=1;$i<=31;$i++){
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>日
            </div>
        </div>
        <div class="form">
            <div>發行商</div>：
            <div><input type="text" name="publish" id=""></div>
        </div>
        <div class="form">
            <div>導演</div>：
            <div><input type="text" name="director" id=""></div>
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
        <textarea name="intro" id="" style="width:99%"></textarea>
    </div>
</div>
<div class="ct">
    <input type="submit" value="編輯">
    <input type="reset" value="重置">
</div>
</form>