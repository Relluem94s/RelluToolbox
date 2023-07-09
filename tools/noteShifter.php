<?php


$notes = array("C","C#","D","D#","E","F","F#","G","G#","A","A#","B");



$notes_select = '<select class="form-control" id="note_input" oninput="shift()">';

for($i = 0; $i < sizeof($notes); $i++){
  $notes_select .= '<option>'.$notes[$i].'</option>';
}

$notes_select .= '</select>';
$shift_select = '<input class="form-control"
id="note_shift"
min="-24"
max="24"
type="number"
value="0"
oninput="shift()">';
$shift_out = '<input
class="form-control"
type="text"
id="note_output"
disabled value="">';



echo '<div class="input-group">' . $notes_select . $shift_select . $shift_out . '</div>';

?>

<script>

function shift(){
  

  var notes = ["C","C#","D","D#","E","F","F#","G","G#","A","A#","B"];



  var note = $('#note_input')[0].value;
  var note_offset = notes.indexOf(note);
  var shift = parseInt($('#note_shift')[0].value) + note_offset;
  var shifting = 0;

  if(shift < 0){
    if(shift < -12){
      shifting = 12*2 + shift;
    }
    else{
      shifting = 12 + shift;
    }
  }
  else{
    if(shift >= 24){
      shifting = shift - 12*2;
    }
    else if(shift >= 12){
      shifting = shift-12;
    }
    else{
      shifting = shift;
    }
    
  }
 
  $('#note_output')[0].value = notes[shifting];
}

</script>
