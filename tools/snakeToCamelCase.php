<input
placeholder="Input"
type="text"
class="form-control"
id="orig_snake"
oninput="$('#camel_out')[0].value =
$('#orig_snake')[0].value.toLowerCase().replace(/([-_][a-z])/g, group =>
group.toUpperCase().replace('-', '').replace('_', ''));">
<input
placeholder="Output"
type="text"
class="form-control"
id="camel_out"
disabled>
