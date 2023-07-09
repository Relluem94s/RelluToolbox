<input
placeholder="Input"
type="text"
class="form-control"
id="original_string"
oninput="$('#reverse_string')[0].value = $('#original_string')[0].value.split('').reverse().join('');">
<input
placeholder="Output"
type="text"
class="form-control"
id="reverse_string"
disabled>
