<style>
    input.calculator {
        background-color: aaa;
        text-align: right;
        border: 0px groove #333;
    }

    input.calculator:hover {
        background-color: #777;
    }

    input.calculator:disabled {
        background-color: #ccc;
    }

    input.i_w {
        background-color: fff;
        border: 0px groove #333;
    }

    input.i_w:hover {
        background-color: #eee;
    }

    input.i_save {
        width: 87%;
        text-align: left;
        background-color: #333;
        color: #fff;
        border: 1px groove #333;
        border-radius: 15px;
        text-shadow: 0px 0px 10px #ddd;
    }

    input.i_delete {
        font-size: 9px;
        width: 30px;
        height: 30px;
        text-align: center;
        background-color: #333;
        color: #fff;
        border: 1px groove #333;
        border-radius: 15px;
        text-shadow: 0px 0px 10px #ddd;
    }

    input.i_undelete {
        font-size: 9px;
        width: 30px;
        height: 30px;
        text-align: center;
        background-color: #333;
        color: #fff;
        border: 1px groove #333;
        border-radius: 15px;
        text-shadow: 0px 0px 10px #ddd;
    }

    input.btn {
        width: 56px;
        text-align: center;
        background-color: #333;
        color: #fff;
        border: 1px groove #333;
        border-radius: 15px;
        text-shadow: 0px 0px 10px #ddd;
    }

    input.btnd {
        width: 56px;
        text-align: center;
        background-color: #333;
        color: #fff;
        border: 1px groove #333;
        border-radius: 15px;
        text-shadow: 0px 0px 10px #ddd;
    }

    input.btns {
        width: 56px;
        text-align: center;
        background-color: #d33;
        color: #fff;
        border: 1px groove #d33;
        border-radius: 15px 15px 15px 50px;
        text-shadow: 0px 0px 10px #ddd;
    }

    input.btnf {
        width: 56px;
        text-align: center;
        background-color: #49f;
        color: #fff;
        border: 1px groove #49f;
        border-radius: 15px 15px 50px 50px;
        text-shadow: 0px 0px 10px #ddd;
    }

    input.btno {
        width: 56px;
        text-align: center;
        background-color: #93d;
        color: #fff;
        border: 1px groove #93d;
        border-radius: 50px;
        text-shadow: 0px 0px 10px #ddd;
    }

    input.btnc {
        width: 56px;
        text-align: center;
        background-color: #c40;
        color: #fff;
        border: 1px groove #c40;
        border-radius: 50px 15px 15px 15px;
        text-shadow: 0px 0px 10px #ddd;
    }

    input.btnd:hover {
        background-color: #333;
        border: 1px groove #333;
    }

    input.i_save:hover {
        background-color: #444;
        border: 1px groove #333;
    }

    input.i_delete:hover {
        background-color: #944;
        border: 1px groove #833;
    }

    input.i_undelete:hover {
        background-color: #494;
        border: 1px groove #383;
    }

    input.btn:hover {
        background-color: #444;
        border: 1px groove #333;
    }

    input.btns:hover {
        background-color: #e44;
        border: 1px groove #e44;
    }

    input.btnf:hover {
        background-color: #5af;
        border: 1px groove #49f;
    }

    input.btno:hover {
        background-color: #a4e;
        border: 1px groove #93d;
    }

    input.btnc:hover {
        background-color: #d51;
        border: 1px groove #c40;
    }

    #val {
        width: 100%;
        margin-bottom: 4px;
        border-radius: 10px 10px 0px 0px;
        padding-right: 6px;
    }

    #erg {
        width: 100%;
        border-radius: 0px 0px 10px 10px;
        padding-right: 4px;
    }

    .todo_text {
        display: inline-block;
        padding-left: 5px;
    }

    table.calc {
        padding: 15px;
        margin:5px;
        border: 0px groove #333;
        border-radius: 15px !important;
        background: #999;
    }

    tr.tr_w {
        font-size: 12px;
        color: #000;
        background-color: #fff;
    }

    tr.tr_b {
        font-size: 12px;
        color: #000;
        background-color: #aaa;
    }

    tr.tr_d_0 {
        font-size: 12px;
        color: #111;
        background-color: #ccc;
        opacity: 0.8;
    }

    tr.tr_d_1 {
        font-size: 12px;
        color: #111;
        background-color: #ccc;
        opacity: 0.6;
    }

    tr.tr_d_2 {
        font-size: 12px;
        color: #111;
        background-color: #ccc;
        opacity: 0.4;
    }

    tr.tr_d_3 {
        font-size: 12px;
        color: #111;
        background-color: #ccc;
        opacity: 0.2;
    }

    tr.tr_d_4 {
        font-size: 12px;
        color: #111;
        background-color: #ccc;
        opacity: 0.1;
    }

    tr.tr_d_5 {
        font-size: 12px;
        color: #111;
        background-color: #ccc;
        display: none;
    }

    tr.tr_d_n {
        display: none;
    }

    tr.tr_bht {
        font-size: 12px;
        color: #fff;
        background-color: #333;
    }

    tr.tr_bh {
        font-size: 12px;
        color: #f00;
        background-color: #aaa;
    }

    tr.tr_d_0:hover {
        opacity: 0.9;
        color: #d33;
        text-shadow: 0px 0px 6px #d33;
    }

    tr.tr_d_1:hover {
        opacity: 0.9;
        color: #d33;
        text-shadow: 0px 0px 6px #d33;
    }

    tr.tr_d_2:hover {
        opacity: 0.9;
        color: #d33;
        text-shadow: 0px 0px 6px #d33;
    }

    tr.tr_d_3:hover {
        opacity: 0.9;
        color: #d33;
        text-shadow: 0px 0px 6px #d33;
    }

    tr.tr_d_4:hover {
        opacity: 0.9;
        color: #d33;
        text-shadow: 0px 0px 6px #d33;
    }

    tr.tr_d_5:hover {
        opacity: 0.9;
        color: #d33;
        text-shadow: 0px 0px 6px #d33;
    }

    tr input {
        color: #fff;
    }




    .calc_button {
        display: table-row;
    }

    .mwst_button {
        display: none;
    }
</style>
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
