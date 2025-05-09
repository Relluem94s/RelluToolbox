<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-3">

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Reverse</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input placeholder="Normal" type="text" class="form-control" id="original_string"
                            oninput="$('#reverse_string')[0].value = $('#original_string')[0].value.split('').reverse().join('');">

                    </div>
                    <div class="mt-2">
                        <input placeholder="Reversed" type="text" class="form-control" id="reverse_string" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Uppercase</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input placeholder="Normal" type="text" class="form-control" id="original_up_string"
                            oninput="$('#upper_string')[0].value = $('#original_up_string')[0].value.toUpperCase();">
                    </div>
                    <div class="mt-2">
                        <input placeholder="Uppercase" type="text" class="form-control" id="upper_string" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Lowercase</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input placeholder="Normal" type="text" class="form-control" id="original_low_string"
                            oninput="$('#lower_string')[0].value = $('#original_low_string')[0].value.toLowerCase();">
                    </div>
                    <div class="mt-2">
                        <input placeholder="Lowercase" type="text" class="form-control" id="lower_string" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">snake2camelCase</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input placeholder="snake_Case" type="text" class="form-control" id="orig_snake"
                            oninput="$('#camel_out')[0].value = $('#orig_snake')[0].value.toLowerCase().replace(/([-_][a-z])/g, group => group.toUpperCase().replace('-', '').replace('_', ''));">
                    </div>
                    <div class="mt-2">
                        <input placeholder="snakeCase" type="text" class="form-control" id="camel_out" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">camel2SnakeCase</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input placeholder="camelCase" type="text" class="form-control" id="orig_camCa_str"
                            oninput="$('#snk_str')[0].value = $('#orig_camCa_str')[0].value.replace( /([A-Z])/g, ' $1' ).split(' ').join('_').toLowerCase();">

                    </div>
                    <div class="mt-2">
                        <input placeholder="camel_case" type="text" class="form-control" id="snk_str" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">camel2Screaming</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input placeholder="camelCase" type="text" class="form-control" id="original_camelCase_string"
                            oninput="$('#screaming_snake_string')[0].value = $('#original_camelCase_string')[0].value.replace( /([A-Z])/g, ' $1' ).split(' ').join('_').toUpperCase();">

                    </div>
                    <div class="mt-2">
                        <input placeholder="SCREAMING_SNAKE" type="text" class="form-control"
                            id="screaming_snake_string" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Char Count</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input placeholder="Input" type="text" class="form-control" id="orig_char_counter" oninput="$('#out_counter')[0].value =
                            $('#orig_char_counter')[0].value.length;">
                    </div>
                    <div class="mt-2">
                        <input placeholder="Char Count" type="text" class="form-control" id="out_counter" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">ASCII</legend>
                <div class="mb-2">
                    <div class="input-group">
                        <input placeholder="65 or A" type="text" class="form-control" id="asciiInput" oninput="asciiConverter()">
                    </div>
                    <div class="mt-2">
                        <input placeholder="Output" type="text" class="form-control" id="asciiOutput" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

    </div>
</div>
