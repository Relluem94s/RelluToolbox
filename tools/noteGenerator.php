<?php

$notes = ["C","C#","D","D#","E","F","F#","G","G#","A","A#","B"];
$notes_select = '<select class="form-control" id="note_select">';

for($i = 0; $i < sizeof($notes); $i++){
  $notes_select .= '<option>'.$notes[$i].'</option>';
}

$notes_select .= '</select>';

?>

<div class="container">
    <div class="row row-cols-1">
        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Note Generator</legend>
                <div class="mb-2">
                <div class="input-group">
                    <?php echo $notes_select; ?>
                </div>
                    <div class="mt-2">
                        <button class="btn btn-warning" onclick="playNote()"><i class="fa-solid fa-play"></i></button></div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<script>

    var ctxClass = window.audioContext ||window.AudioContext || window.AudioContext || window.webkitAudioContext
    var ctx = new ctxClass();

    var playNote = (function () {
    
        return function (finishedCallback) {
            let frequency;
            switch($("#note_select")[0].value) {
            case "C":
                frequency = 261.63;
                break;
            case "C#":
                frequency = 277.18;
                break;
            case "D":
                frequency = 293.66;
                break;
            case "D#":
                frequency = 311.138;
                break;
            case "E":
                frequency = 329.63;
                break;
            case "F":
                frequency = 349.23;
                break;
            case "F#":
                frequency = 369.99;
                break;
            case "G":
                frequency = 392.00;
                break;
            case "G#":
                frequency = 415.30;
                break;
            case "A":
                frequency = 440.00;
                break;
            case "A#":
                frequency = 466.16;
                break;
            case "B":
                frequency = 493.88;
                break;
            default:
                frequency = 523.25;
            }


            duration = 500;

            type = 1

            if (typeof finishedCallback != "function") {
                finishedCallback = function () {};
            }

            var osc = ctx.createOscillator();
            var gainNode = ctx.createGain();

            osc.frequency.value = frequency;

            gainNode.connect(ctx.destination);

            gainNode.gain.value = 1;

            osc.connect(gainNode);

            osc.type = "sine";

            osc.connect(ctx.destination);
            if (osc.noteOn) osc.noteOn(0); // old browsers
            if (osc.start) osc.start(); // new browsers

            setTimeout(function () {
                if (osc.noteOff) osc.noteOff(0); // old browsers
                if (osc.stop) osc.stop(); // new browsers
                finishedCallback();
            }, duration);

        };
    })();

    </script>
