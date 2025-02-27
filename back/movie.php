<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>


<div style="height:425px; overflow:auto;" id="movieList">



</div>

<script>
getMovies();

function getMovies() {
    $("#movieList").load("./back/movie_list.php", function() {
        $(".sw").on("click", function() {
            let id = $(this).data('id');
            let sw = $(this).data('sw');
            $.post("./api/sw.php", {table: 'Movie',id,sw}, () => {
                getMovies();
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