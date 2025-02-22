<div class="container">
    <div class="row row-cols-1">

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Minify JSON</legend>
                <div class="mb-2">
                    <textarea placeholder="Input" type="text" class="form-control" id="original_pretty_json" rows="10"
                        oninput="$('#mini_json_string')[0].value = JSON.stringify(JSON.parse($('#original_pretty_json')[0].value));">
</textarea>
                    <div class="mt-2">
                        <input placeholder="Output" type="text" class="form-control" id="mini_json_string" disabled>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col">
            <fieldset class="fieldset-card-small">
                <legend class="fieldset-legend">Pretty Print JSON</legend>
                <div class="mb-2">
                    <input placeholder="Input" type="text" class="form-control" id="original_json_string"
                        oninput="$('#pretty_json_string')[0].value = JSON.stringify(JSON.parse($('#original_json_string')[0].value), null, 2);">
                    <div class="mt-2">

                        <textarea placeholder="Output" type="text" class="form-control" id="pretty_json_string"
                            rows="10" disabled>
</textarea>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>