<script>

    function rollDice(){
        var num = Math.floor(Math.random() * (7 - 1) + 1);
        $("#dice_output")[0].value = num;
    }

</script>
<input type="text" disabled id="dice_output">
<button class="btn btn-warning" onclick="rollDice()">Roll</button>