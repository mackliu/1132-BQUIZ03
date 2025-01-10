<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
            <ul class="lists">
            </ul>
            <ul class="controls">
            </ul>
        </div>
    </div>
</div>
<div class="half">
    <h1>院線片清單</h1>
    <?php 
    $today=date("Y-m-d");
    $ondate=date("Y-m-d",strtotime("-2 days"));

    $all=$Movie->count(['sh'=>1]," AND ondate BETWEEN '$ondate' AND '$today'");
    $div=4;
    $pages=ceil($all/$div);
    $now=$_GET['p']??1; 
    $start=($now-1)*$div;

    $rows=$Movie->all(['sh'=>1]," AND ondate BETWEEN '$ondate' AND '$today' order by rank limit $start,$div");

    ?>
    <div class="rb tab" style="width:95%;">
        <div>
            
        </div>
        <div class="ct"> </div>
    </div>
</div>


