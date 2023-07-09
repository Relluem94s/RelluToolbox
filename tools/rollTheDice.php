<script>

    function rollDice(){
        var num = Math.floor(Math.random() * (7 - 1) + 1);
        $("#dice_output")[0].value = num;
    }

</script>

<div class="input-group">
    <input type="text" class="form-control" disabled id="dice_output">
    <button class="btn btn-warning" onclick="rollDice()">Roll</button>
</div>
