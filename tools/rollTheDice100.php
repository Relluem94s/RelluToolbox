<script>

    function rollDice100(){
        var num = Math.floor(Math.random() * (101 - 1) + 1);
        $("#dice100_output")[0].value = num;
    }

</script>

<div class="input-group">
    <input type="text" class="form-control" disabled id="dice100_output">
    <button class="btn btn-warning" onclick="rollDice100()">Roll</button>
</div>
