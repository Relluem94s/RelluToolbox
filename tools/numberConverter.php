<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-3">
        <div class="col">
            <fieldset class="fieldset-card">
                <legend class="fieldset-legend">Decimal</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input type="number" class="form-control" id="input_dec" placeholder="94">
                        <button onclick="convertDec()" class="btn btn-success">Calculate</button>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Outputs:</label>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="output_hex_dec" placeholder="Hex Output"
                                disabled>
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="output_bin_dec" placeholder="Binary Output"
                                disabled>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="output_oct_dec" placeholder="Octal Output"
                                disabled>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card">
                <legend class="fieldset-legend">Hexadecimal</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input type="text" class="form-control" id="input_hex" placeholder="5E">
                        <button onclick="convertHex()" class="btn btn-success">Calculate</button>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Outputs:</label>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="output_dec_hex" placeholder="Decimal Output"
                                disabled>
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="output_bin_hex" placeholder="Binary Output"
                                disabled>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="output_oct_hex" placeholder="Octal Output"
                                disabled>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card">
                <legend class="fieldset-legend">Binary</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input type="text" class="form-control" id="input_bin" placeholder="1011110">
                        <button onclick="convertBin()" class="btn btn-success">Calculate</button>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Outputs:</label>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="output_dec_bin" placeholder="Decimal Output"
                                disabled>
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="output_hex_bin" placeholder="Hex Output"
                                disabled>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="output_oct_bin" placeholder="Octal Output"
                                disabled>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card">
                <legend class="fieldset-legend">Octal</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input type="text" class="form-control" id="input_oct" placeholder="136">
                        <button onclick="convertOct()" class="btn btn-success">Calculate</button>
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Outputs:</label>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="output_dec_oct" placeholder="Decimal Output"
                                disabled>
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="output_hex_oct" placeholder="Hex Output"
                                disabled>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="output_bin_oct" placeholder="Binary Output"
                                disabled>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>


<div class="col">
            <fieldset class="fieldset-card">
                <legend class="fieldset-legend">Decimal to Roman</legend>
                <div class="mb-2">
                    <div class="input-group">
                    <input placeholder="Input" type="number" class="form-control" id="original_dec3_string" oninput="$('#output_roman_string')[0].value=toRoman(parseInt($('#original_dec3_string')[0].value));">
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Outputs:</label>
                        <div class="input-group mb-1">
                        <input placeholder="Output" class="form-control" type="text" id="output_roman_string" disabled>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>

<div class="col">
            <fieldset class="fieldset-card">
                <legend class="fieldset-legend">Roman to Decimal</legend>
                <div class="mb-2">
                    <div class="input-group">
                    <input placeholder="Input" type="text" class="form-control" id="original_roman_string" oninput="$('#output_dec_from_roman_string')[0].value=fromRoman($('#original_roman_string')[0].value);">
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Outputs:</label>
                        <div class="input-group mb-1">
                        <input placeholder="Output" class="form-control" type="text" id="output_dec_from_roman_string" disabled>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<script>
    function convertDec() {
        const input = document.getElementById('input_dec').value.trim();
        if (!input || isNaN(input)) {
            clearOutputs(['output_hex_dec', 'output_bin_dec', 'output_oct_dec']);
            return;
        }
        const dec = parseInt(input);
        document.getElementById('output_hex_dec').value = dec.toString(16).toUpperCase();
        document.getElementById('output_bin_dec').value = dec.toString(2);
        document.getElementById('output_oct_dec').value = dec.toString(8);
    }

    function convertHex() {
        const input = document.getElementById('input_hex').value.trim().toUpperCase();
        if (!input || isNaN(parseInt(input, 16))) {
            clearOutputs(['output_dec_hex', 'output_bin_hex', 'output_oct_hex']);
            return;
        }
        const dec = parseInt(input, 16);
        document.getElementById('output_dec_hex').value = dec;
        document.getElementById('output_bin_hex').value = dec.toString(2);
        document.getElementById('output_oct_hex').value = dec.toString(8);
    }

    function convertBin() {
        const input = document.getElementById('input_bin').value.trim();
        if (!input || isNaN(parseInt(input, 2))) {
            clearOutputs(['output_dec_bin', 'output_hex_bin', 'output_oct_bin']);
            return;
        }
        const dec = parseInt(input, 2);
        document.getElementById('output_dec_bin').value = dec;
        document.getElementById('output_hex_bin').value = dec.toString(16).toUpperCase();
        document.getElementById('output_oct_bin').value = dec.toString(8);
    }

    function convertOct() {
        const input = document.getElementById('input_oct').value.trim();
        if (!input || isNaN(parseInt(input, 8))) {
            clearOutputs(['output_dec_oct', 'output_hex_oct', 'output_bin_oct']);
            return;
        }
        const dec = parseInt(input, 8);
        document.getElementById('output_dec_oct').value = dec;
        document.getElementById('output_hex_oct').value = dec.toString(16).toUpperCase();
        document.getElementById('output_bin_oct').value = dec.toString(2);
    }

    function clearOutputs(outputIds) {
        outputIds.forEach(id => document.getElementById(id).value = '');
    }
</script>
