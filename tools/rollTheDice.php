<script>
function rollDice() {
  const dice = [...document.querySelectorAll(".die-list")];
  dice.forEach(die => {
    toggleClasses(die);
    die.dataset.roll = getRandomNumber(1, 6);
    $("#dice_output")[0].value = die.dataset.roll;
  });
}

function toggleClasses(die) {
  die.classList.toggle("odd-roll");
  die.classList.toggle("even-roll");
}

function getRandomNumber(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

document.getElementById("roll-button").addEventListener("click", rollDice);

</script>
<link rel="stylesheet" href="RelluBash-Script-Collection\SjinDice.css">
<div class="input-group">
    <div class="dice">
      <ol class="die-list even-roll" data-roll="1" id="die-1">
        <li class="face-side" data-side="1">
          <span class="eye"></span>
        </li>
        <li class="face-side" data-side="2">
          <span class="eye"></span>
          <span class="eye"></span>
        </li>
        <li class="face-side" data-side="3">
          <span class="eye"></span>
          <span class="eye"></span>
          <span class="eye"></span>
        </li>
        <li class="face-side" data-side="4">
          <span class="eye"></span>
          <span class="eye"></span>
          <span class="eye"></span>
          <span class="eye"></span>
        </li>
        <li class="face-side" data-side="5">
          <span class="eye"></span>
          <span class="eye"></span>
          <span class="eye"></span>
          <span class="eye"></span>
          <span class="eye"></span>
        </li>
        <li class="face-side" data-side="6">
          <span class="eye"></span>
          <span class="eye"></span>
          <span class="eye"></span>
          <span class="eye"></span>
          <span class="eye"></span>
          <span class="eye"></span>
        </li>
      </ol>
    <input type="text" class="form-control" disabled id="dice_output">
    <button class="btn btn-warning" type="button" id="roll-button">Roll Dice</button>
</div>
