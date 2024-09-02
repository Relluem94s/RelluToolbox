<script>

    function generateColor(){
        var color = "#" + Math.random().toString(16).slice(2, 8);
        $("#color_pick")[0].value = color;
        getInfo();
    }

    function getInfo(){
        var color =  $("#color_pick")[0].value;
        $("#hex")[0].value = color;
        $("#rgb")[0].value =  formatHexToRgb(color);
        $("#cmyk")[0].value =  formatHexToCmyk(color);
        $("#hsv")[0].value = formatHexToHsv(color);
        $("#hsl")[0].value = formatHexToHsl(color);
    }

    function hexToRgb(hex) {
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ?
        {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    }

    function formatHexToRgb(hex){
        var rgb = hexToRgb(hex)
        return rgb.r + ", " + rgb.g + ", " + rgb.b
    }

    function hexToCmyk(hex){
        var rgb = hexToRgb(hex);

        var r = rgb.r / 255;
        var g = rgb.g / 255;
        var b = rgb.b / 255;

        var k = 1 - Math.max(r, g, b);
        var c = (1 - r - k) / (1 - k) || 0;
        var m = (1 - g - k) / (1 - k) || 0;
        var y = (1 - b - k) / (1 - k) || 0;

        return {
            c: c,
            m: m,
            y: y,
            k: k
        };
    }


    function hexToHsv(hex){
        var rgb = hexToRgb(hex);
        var r = rgb.r / 255, g = rgb.g / 255, b = rgb.b / 255;

        var max = Math.max(r, g, b), min = Math.min(r, g, b);
        var delta = max - min;

        var h, s, v = max;

        if (max === min) {
            h = 0; // achromatic
        } else {
            switch (max) {
                case r: h = ((g - b) / delta + (g < b ? 6 : 0)) * 60; break;
                case g: h = ((b - r) / delta + 2) * 60; break;
                case b: h = ((r - g) / delta + 4) * 60; break;
            }
        }

        s = max === 0 ? 0 : delta / max;

        return {
            h: h,
            s: s,
            v: v
        };
    }

    function formatHexToHsv(hex){
        var hsv = hexToHsv(hex);
        return hsv.h.toFixed(1) + ", " +
               (hsv.s * 100).toFixed(1) + "%, " +
               (hsv.v * 100).toFixed(1) + "%";
    }

    function formatHexToCmyk(hex){
        var cmyk = hexToCmyk(hex)
        return (cmyk.c * 100).toFixed(1) + "%, " +
               (cmyk.m * 100).toFixed(1) + "%, " +
               (cmyk.y * 100).toFixed(1) + "%, " +
               (cmyk.k * 100).toFixed(1) + "%";
    }

    function hexToHsl(hex){
        var rgb = hexToRgb(hex);
        var r = rgb.r / 255, g = rgb.g / 255, b = rgb.b / 255;

        var max = Math.max(r, g, b), min = Math.min(r, g, b);
        var delta = max - min;

        var h, s, l = (max + min) / 2;

        if (max === min) {
            h = s = 0;
        } else {
            s = l > 0.5 ? delta / (2 - max - min) : delta / (max + min);
            switch (max) {
                case r: h = ((g - b) / delta + (g < b ? 6 : 0)) * 60; break;
                case g: h = ((b - r) / delta + 2) * 60; break;
                case b: h = ((r - g) / delta + 4) * 60; break;
            }
        }

        return {
            h: h,
            s: s,
            l: l
        };
    }

    function formatHexToHsl(hex){
        var hsl = hexToHsl(hex);
        return hsl.h.toFixed(1) + ", " +
               (hsl.s * 100).toFixed(1) + "%, " +
               (hsl.l * 100).toFixed(1) + "%";
    }


</script>

<div class="input-group">
    <input type="color" class="form-control" onchange="getInfo()" id="color_pick">
    <button class="btn btn-warning" onclick="generateColor()">Generate</button>
</div>

<div class="input-group">
    <input type="text" class="form-control" disabled value="Hex">
    <input type="text" class="form-control" disabled id="hex">
</div>

<div class="input-group">
    <input type="text" class="form-control" disabled value="RGB">
    <input type="text" class="form-control" disabled id="rgb">
</div>

<div class="input-group">
    <input type="text" class="form-control" disabled value="CMYK">
    <input type="text" class="form-control" disabled id="cmyk">
</div>

<div class="input-group">
    <input type="text" class="form-control" disabled value="HSV">
    <input type="text" class="form-control" disabled id="hsv">
</div>

<div class="input-group">
    <input type="text" class="form-control" disabled value="HSL">
    <input type="text" class="form-control" disabled id="hsl">
</div>