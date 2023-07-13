<textarea
placeholder="Input"
type="text"
class="form-control"
id="original_pretty_json"
rows="10"
oninput="$('#mini_json_string')[0].value = JSON.stringify(JSON.parse($('#original_pretty_json')[0].value));">
</textarea>
<input
placeholder="Output"
type="text"
class="form-control"
id="mini_json_string"
disabled>
