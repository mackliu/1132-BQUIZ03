<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>


<div style="height:425px; overflow:auto;" id="movieList">



</div>

<script>
getMovies();

function getMovies() {
    $("#movieList").load("./back/movie_list.php", function() {
        /* $(".movie-item").on("click",function(){
            console.log($(this).position(),$(this).offset());
        }) */

        $(".sw").on("click", function() {
            let id = $(this).data('id');
            let sw = $(this).data('sw');
            let item=$(this).parents(".movie-item");

            $.post("./api/sw.php", {table: 'Movie',id,sw}, () => {
                //getMovies();
                switch($(this).data('type')){
                    case "up":
                        let prev=$(item).prev();
                        $(prev).animate({top:$(prev).height()+19},1000)
                        $(item).animate({top:(-1)*($(item).height()+19)},1000,function(){
                            $(prev).before($(item));
                            $(item).css("top",0);
                            $(prev).css("top",0);
                        })

                        break;
                    case "down":
                        let next=$(item).next();

                        $(next).animate({top:(-1)*($(next).height()+19)},1000)
                        $(item).animate({top:$(item).height()+19},1000,function(){
                            $(next).after($(item));
                            $(item).css("top",0)
                            $(next).css("top",0);
                            
                        })
                        break;
                }
            })
        })

        $(".show").on("click", function() {
            let id = $(this).data('id');
            $.post("./api/show.php", {id}, () => {
                //getMovies();
                switch($(this).text()){
                    case "顯示":
                        $(this).text("隱藏");
                        break;
                    case "隱藏":
                        $(this).text("顯示");
                        break;
                }
            })
        })

        $(".del").on("click", function() {
            let id = $(this).data('id');
            $movie=$(this).parents(".movie-item");
            //console.log($($movie).html());
            $.post("./api/del.php", { table: 'Movie', id}, () => {
                //getMovies();
                $($movie).remove();
            })
        })
    });
}
</script>