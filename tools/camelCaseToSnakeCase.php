<input
placeholder="Input"
type="text"
class="form-control"
id="orig_camCa_str"
oninput="$('#snk_str')[0].value =
$('#orig_camCa_str')[0].value.replace( /([A-Z])/g, ' $1' ).split(' ').join('_').toLowerCase();">
<input
placeholder="Output"
type="text"
class="form-control"
id="snk_str"
disabled>
