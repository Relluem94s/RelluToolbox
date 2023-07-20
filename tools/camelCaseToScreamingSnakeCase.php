<input
placeholder="Input"
type="text"
class="form-control"
id="original_camelCase_string"
oninput="$('#screaming_snake_string')[0].value =
$('#original_camelCase_string')[0].value.replace( /([A-Z])/g, ' $1' ).split(' ').join('_').toUpperCase();">
<input
placeholder="Output"
type="text"
class="form-control"
id="screaming_snake_string"
disabled>
