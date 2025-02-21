<link rel="stylesheet" href="./shared/assets/css/SjinDice.css">
<script src="./shared/assets/js/numberGenerator.js"></script>

<div class="container">
  <div class="row row-cols-1">

    <div class="col">
      <fieldset class="fieldset-card-small">
        <legend class="fieldset-legend">
          <i class="fa-solid fa-dice"></i>
          Roll the Dice</legend>
        <div class="mb-2">
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
            </div>
          </div>
          <div class="mt-2">
            <input type="text" class="form-control" disabled id="dice_output">
          </div>
          <div class="mt-2">
            <button class="btn btn-warning" type="button" id="roll-button">Roll</button>
          </div>
        </div>
      </fieldset>
    </div>

    <div class="col">
      <fieldset class="fieldset-card-small">
        <legend class="fieldset-legend">
          <i class="fa-solid fa-dice-d20"></i>
          Roll the Dice 20</legend>
        <div class="mb-2">
          <div class="input-group">
            <input type="text" class="form-control" disabled id="dice20_output">
          </div>
          <div class="mt-2">
            <button class="btn btn-warning" onclick="rollDice20()">Roll</button>
          </div>
        </div>
      </fieldset>
    </div>

    <div class="col">
      <fieldset class="fieldset-card-small">
        <legend class="fieldset-legend">
          <i class="fa-solid fa-shuffle"></i>
          Roll the Dice 100</legend>
        <div class="mb-2">
          <div class="input-group">
            <input type="text" class="form-control" disabled id="dice100_output">

          </div>
          <div class="mt-2">
            <button class="btn btn-warning" onclick="rollDice100()">Roll</button>
          </div>
        </div>
      </fieldset>
    </div>
  </div>
</div>
