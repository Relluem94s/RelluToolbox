<script>

    function generateColor(){
        var color = "#" + Math.random().toString(16).slice(2, 8);
        $("#color")[0].value = color;
        $("#color_display")[0].style = "background-color:" + color + " ;";
    }

</script>

<div class="input-group">
    <input type="text" class="form-control" disabled id="color">
    <input type="text" class="form-control" disabled id="color_display">
    <button class="btn btn-warning" onclick="generateColor()">Generate</button>
</div>
