<div class="input-group mb-4">
    <input class="form-control" id="stopTimerValue" type="number" min="1" max="120">
    <button class="btn btn-primary" onclick="startStopTimer()">Start</button>
</div>


<p id="displayStopTime"></p>

<script>

    var ctxClass = window.audioContext ||window.AudioContext || window.AudioContext || window.webkitAudioContext
    var ctx = new ctxClass();

    var beep = (function () {
    
        return function (finishedCallback) {

            duration = 500;

            type = 1

            if (typeof finishedCallback != "function") {
                finishedCallback = function () {};
            }

            var osc = ctx.createOscillator();
            var gainNode = ctx.createGain();

            gainNode.connect(ctx.destination);

            gainNode.gain.value = 1;

            osc.connect(gainNode);

            osc.type = "square";

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


    function startStopTimer(){
        var countDownDate = new Date();
        var offset = parseInt($('#stopTimerValue')[0].value);

        if(offset < 1){
            document.getElementById("displayStopTime").innerHTML = "Invalid Number";
            return;
        }

        countDownDate.setMinutes(countDownDate.getMinutes() + offset);

        var x = setInterval(function() {
            var now = new Date().getTime();
                
            var distance = countDownDate - now;
                
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
            document.getElementById("displayStopTime").innerHTML = hours + "h "
            + minutes + "m " + seconds + "s ";
                
            if (distance < 0) {
                clearInterval(x);
                beep();
                document.getElementById("displayStopTime").innerHTML = "Expired";
            }
        }, 1000);


    }
</script>
