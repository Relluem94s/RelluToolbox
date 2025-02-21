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

function rollDice20() {
    let num = Math.floor(Math.random() * (21 - 1) + 1);
    $("#dice20_output")[0].value = num;
}


function rollDice100() {
    let num = Math.floor(Math.random() * (101 - 1) + 1);
    $("#dice100_output")[0].value = num;
}