<link rel="stylesheet" href="./shared/assets/css/calculator.css">
<script>
    function add(str) {
        var element = document.getElementById("val");
        if (element.value.length < 23) {
            element.value = element.value + str;
        }
    }

    function remove() {
        var element = document.getElementById("val");
        if (element.value.length != 0) {
            element.value = element.value.substring(0, element.value.length - 1);
        }
    }

    function calc() {
        if (document.getElementById("val").value != "") {
            if (document.getElementById("val").value == "<3") {
                document.getElementById("erg").value = "Rellu + ??? = " + ('\u2665');
            }
            else if (document.getElementById("val").value == "42") {
                document.getElementById("erg").value = "life, universe & everything";
            }
            else {
                var ergebnis = eval(document.getElementById("val").value);
                document.getElementById("erg").value = ergebnis;
            }
        }
    }

    function swap() {
        var va1 = document.getElementById("val");
        var va2 = document.getElementById("erg");

        var temp = va1.value + "";

        va1.value = va2.value;
        va2.value = temp;

    }

    function mwstf() {
        var x = document.getElementsByClassName("calc_button");
        var i;
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }

        var y = document.getElementsByClassName("mwst_button");
        var a;
        for (a = 0; a < y.length; a++) {
            y[a].style.display = "table-row";
        }
    }

    function calcf() {
        var x = document.getElementsByClassName("mwst_button");
        var i;
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }

        var y = document.getElementsByClassName("calc_button");
        var a;
        for (a = 0; a < y.length; a++) {
            y[a].style.display = "table-row";
        }
    }

    function brutto() {
        if (document.getElementById("val").value != "") {
            var ergebnis = document.getElementById("val").value;
            var brutto = ergebnis;
            document.getElementById("erg").value = Math.round(
                ((ergebnis * (19 / 100)) + (brutto * 1)) * 100
                ) / 100;
        }
    }

    function mwst() {
        if (document.getElementById("val").value != "") {
            var ergebnis = document.getElementById("val").value;
            var brutto = ergebnis;
            ergebnis = ((ergebnis * (19 / 100)))
            document.getElementById("erg").value = Math.round(ergebnis * 100) / 100;
        }
    }

    function netto() {
        if (document.getElementById("val").value != "") {
            var ergebnis = document.getElementById("val").value;
            document.getElementById("erg").value = Math.round((ergebnis / (1 + (19 / 100))) * 100) / 100;
        }
    }

</script>

<form>
    <table class="calc">
    <caption></caption>
        <tr>
            <th colspan="3">
                <input class="calculator" type="text" id="val" value="" disabled></input>
                <br>
                <input class="calculator" type="text" id="erg" value="" disabled></input>
            </th>
        </tr>
        <tr>
            <td><input class="btnf" type="reset" value="C"></input></td>
            <td><input class="btnf" onclick="remove('')" type="button" value="CE"></input></td>
            <td>
                <input class="btns calc_button" onclick="mwstf()" type="button" value="MwSt"></input>
                <input class="btns mwst_button" onclick="calcf()" type="button" value="Calc"></input>
            </td>
        </tr>
        <tr class="mwst_button">
            <td><input class="btno" onclick="brutto()" type="button" value="Brutto"></input></td>
            <td><input class="btno" onclick="netto()" type="button" value="Netto"></input></td>
            <td><input class="btno" onclick="mwst()" type="button" value="MwSt"></input></td>
        </tr>
        <tr class="calc_button">
            <td><input class="btno" onclick="add('<')" type="button" value="<"></input></td>
            <td><input class="btno" onclick="add('>')" type="button" value=">"></input></td>
            <td><input class="btno" onclick="swap()" type="button" value="SWAP"></input></td>
        </tr>
        <tr class="calc_button">
            <td><input class="btno" onclick="add('(')" type="button" value="("></input></td>
            <td><input class="btno" onclick="add(')')" type="button" value=")"></input></td>
            <td><input class="btno" onclick="add('/')" type="button" value="/"></input></td>
        </tr>
        <tr class="calc_button">
            <td><input class="btno" onclick="add('+')" type="button" value="+"></input></td>
            <td><input class="btno" onclick="add('-')" type="button" value="-"></input></td>
            <td><input class="btno" onclick="add('*')" type="button" value="*"></input></td>
        </tr>
        <tr>
            <td><input class="btn" onclick="add('7')" type="button" value="7"></input></td>
            <td><input class="btn" onclick="add('8')" type="button" value="8"></input></td>
            <td><input class="btn" onclick="add('9')" type="button" value="9"></input></td>
        </tr>
        <tr>
            <td><input class="btn" onclick="add('4')" type="button" value="4"></input></td>
            <td><input class="btn" onclick="add('5')" type="button" value="5"></input></td>
            <td><input class="btn" onclick="add('6')" type="button" value="6"></input></td>
        </tr>
        <tr>
            <td><input class="btn" onclick="add('1')" type="button" value="1"></input></td>
            <td><input class="btn" onclick="add('2')" type="button" value="2"></input></td>
            <td><input class="btn" onclick="add('3')" type="button" value="3"></input></td>
        </tr>
        <tr>
            <td><input class="btn" onclick="add('0')" type="button" value="0"></input></td>
            <td><input class="btn" onclick="add('.')" type="button" value=","></input></td>
            <td>
                <input class="btnc calc_button" onclick="calc()" type="button" value="="></input>
                <input class="btno mwst_button" onclick="swap()" type="button" value="SWAP"></input>
            </td>
        </tr>
    </table>
</form>
