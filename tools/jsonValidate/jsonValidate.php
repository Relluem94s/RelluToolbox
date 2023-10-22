<script src="tools/jsonValidate/jsonValidate.js"></script>

<input
    placeholder="Input"
    type="text"
    class="form-control"
    id="inputJson"
    oninput="$('#error_json_area')[0].value = valiateJson($('#inputJson')[0].value)"
>

<br>
<textarea
    placeholder="Output"
    type="text"
    class="form-control"
    id="error_json_area"
    rows="10"
    disabled>
</textarea>