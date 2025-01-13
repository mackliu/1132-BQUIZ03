<style>
    .order-form{
        width:500px;
        margin:20px auto;
        padding:20px;
        border:1px solid #999;
        background:#eee;
    }
    .order-form td:nth-child(1){
        width:100px;
        text-align:center;
    }
    .order-form td:nth-child(2){
        text-align:left;
        width:300px;
    }
    .order-form td{
        border:1px solid #ccc;
    }
    .order-form tr:nth-child(even){
        background:#999;
    }
</style>
<div id="order">
<h3 class='ct'>線上訂票</h3>
<form action="#">
<table class="order-form">
    <tr>
        <td>電影：</td>
        <td><select name="movie" id="movie"></select></td>
    </tr>
    <tr>
        <td>日期：</td>
        <td><select name="date" id="date"></select></td>
    </tr>
    <tr>
        <td>場次：</td>
        <td><select name="session" id="session"></select></td>
    </tr>
    <tr>
        <td colspan='2' class='ct'>
            <input type="button" value="確定" onclick="booking()">
            <input type="reset" value="重置">     
        </td>
    </tr>
</table>
</form>
</div>
<div id="booking" style="display:none">


</div>

<script>
getMovies();
let id=new URLSearchParams(location.href).get('id');
//console.log(id);
let movie={};
$("#movie").on("change",function(){
    getDays();
})

$("#date").on("change",function(){
    getSessions();
})

function getMovies(){
    $.get("api/get_movies.php",function(movies){
        //console.log(movies);
        $("#movie").html(movies);

        if(parseInt(id)>0){
            $(`#movie option[value='${id}']`).prop('selected',true);
        }

        getDays();
    })
}

function getDays(){
    $.get("api/get_days.php",{movie:$("#movie").val()},function(days){
        $("#date").html(days);
        getSessions();
    })
}

function getSessions(){
    $.get("api/get_sessions.php",{movie:$("#movie").val(),date:$("#date").val()},function(sessions){
        $("#session").html(sessions);
    })

}

function booking(){
    movie={id:$("#movie").val(),
           name:$("#movie option:selected").text(),
           date:$("#date").val(),
           session:$("#session").val()
    }

    $("#booking").html(`${movie.id},${movie.date},${movie.name},<button  onclick="$('#order,#booking').toggle()">上一步</button>`)

    $("#booking,#order").toggle();

}

</script>