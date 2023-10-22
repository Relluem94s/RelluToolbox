<input
placeholder="Input"
type="text"
class="form-control"
id="original_json_string"
oninput="$('#pretty_json_string')[0].value = JSON.stringify(JSON.parse($('#original_json_string')[0].value), null, 2);">
<br>
<textarea
placeholder="Output"
type="text"
class="form-control"
id="pretty_json_string"
rows="10"
disabled>
</textarea>
