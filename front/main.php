<style>
.poster-block *{
    margin:0;
    padding:0;
    font-size:12px;
    box-sizing:border-box;
}
.poster-block{
    width:420px;
    height:400px;
}
.lists{
    width:210px;
    height:280px;
    margin:auto;
    position:relative;
}
.controls{
    width:100%;
    height:100px;
    margin:10px auto;
    display:flex;
    align-items:center;
    justify-content:space-around;
}
.poster{
    position:absolute;
    display:none;
    text-align: center;
}
.poster img{
    display:block;
    width:210px;
    height:250px;
}
.poster span{
    font-size:18px;
}
.left ,.right{
    width:0;
    border-top:15px solid transparent;
    border-bottom:15px solid transparent;
}
.left{
    border-right:25px solid #eee;
    border-left:0;
}
.right{
    border-left:25px solid #eee;
    border-right:0;
}
.icons{
    width:320px;
    display:flex;
    overflow:hidden;
    position: relative;
}
.icon{
    width:80px;
    height:100px;
    flex-shrink:0;
    text-align: center;
    position: relative;
}
.icon img{
    width:70px;
    height:80px;
}
.icon div{
    font-size:12px;
}
</style>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster-block">
            <div class="lists">
                <?php 
                    $posters=$Poster->all(['sh'=>1]," order by rank");
                    foreach($posters as $idx => $poster):
                ?>
                <div class="poster" data-ani="<?=$poster['ani'];?>">
                    <img src="./upload/<?=$poster['img'];?>" alt="">
                    <span><?=$poster['name'];?></span>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
            <div class="controls">
                <div class='left'></div>
                <div class='icons'>
                    <?php 
                        foreach($posters as $idx => $poster):
                    ?>
                    <div class="icon">
                        <img src="./upload/<?=$poster['img'];?>">
                        <div><?=$poster['name'];?></div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class='right'></div>
            </div>
        </div>
    </div>
</div>

<script>
$(".poster").eq(0).show();

let slider=setInterval(() => {
    sliders();
}, 2500);


function sliders(next=-1){
    let now=$(".poster:visible").index();
    if(next==-1){
        next=($(".poster").length==now+1)?0:now+1;
    }
    let ani=$(".poster").eq(next).data('ani');
    console.log(now,next,ani)
    //console.log(now,next)

    switch(ani){
        case 1:
            //淡入淡出
            $(".poster").eq(now).fadeOut(1000,function(){
                $(".poster").eq(next).fadeIn(1000);
            });
        break;
        case 2:
            //縮放
            $(".poster").eq(now).hide(1000,function(){
                $(".poster").eq(next).show(1000);
            });
        break;
        case 3:
        //滑入滑出
            $(".poster").eq(now).slideUp(1000,function(){
                $(".poster").eq(next).slideDown(1000);
            });
            
        break;
    }
    
}
let total=$(".icon").length;
let p=0;
$(".left,.right").on("click",function(){
    if($(this).hasClass('left')){
        /* if(p-1>=0){
            p--;
        } */
        p=(p-1>=0)?p-1:0;
    }else{
        /* if(p+1<=total-4){
            p++;
        } */
        p=(p+1<=total-4)?p+1:total-4;
    }

    $(".icon").animate({right:p*80}); 
})

$(".icons").hover(
    function(){
        clearInterval(slider);
    },
    function(){
        slider=setInterval(() => {
            sliders();
        }, 2500);
    }
)

$(".icon").on("click",function(){
    let next=$(this).index();
    sliders(next);
})
</script>



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
                    <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情簡介</button>
                    <button onclick="location.href='?do=order&id=<?=$row['id'];?>'">線上訂票</button>
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