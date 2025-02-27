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
                getMovies();
            })
        })

        $(".del").on("click", function() {
            let id = $(this).data('id');
            $.post("./api/del.php", { table: 'Movie', id}, () => {
                getMovies();
            })
        })
    });
}
</script>