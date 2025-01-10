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
            <input type="button" value="確定">
            <input type="reset" value="重置">     
        </td>
    </tr>
</table>
</form>