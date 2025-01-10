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
    <style>
    .movie-item {
        width: 49%;
        height: 150px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 0.25%;
        display: flex;
        flex-wrap: wrap;
        padding: 3px;
        box-sizing: border-box;
        font-size:14px;
        align-content:center;
    }
    </style>
    <div class="rb tab" style="width:95%;">
        <div style="display:flex;flex-wrap:wrap">
            <?php
            foreach($rows as $row):
            ?>
            <div class='movie-item'>
                <div style="width:65px;">
                    <a href="?do=intro&id=<?=$row['id'];?>">
                        <img src="./upload/<?=$row['poster'];?>" style="width:60px;height:80px;">
                    </a>
                </div>
                <div style="width:calc(100% - 65px);">
                    <div style="font-size:18px;"><?=$row['name'];?></div>
                    <div>分級:
                        <img src="./icon/03C0<?=$row['level'];?>.png" style="width:20px;vertical-align:middle">
                        <?=$Movie::$level[$row['level']];?></div>
                    <div>上映日期:<?=$row['ondate'];?></div>
                </div>
                <div style="width:100%;" class="ct">
                    <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情簡介</button><button>線上訂票</button>
                </div>
            </div>
            <?php
            endforeach;
            ?>
        </div>
        <div class="ct a"> 
            <?php 

                if(($now-1)>0){
                    echo "<a href='?p=".($now-1)."' > < </a>";
                }

                for($i=1;$i<=$pages;$i++){
                    $fontsize=($i==$now)?'24px':'18px';
                    echo "<a href='?p=$i' style='font-size:$fontsize'>$i</a>";
                }

                if(($now+1)<=$pages){
                    echo "<a href='?p=".($now+1)."' > > </a>";
                }


            ?>


        </div>
    </div>
</div>