<?php


$note = "";
$shift = 0;
$notes_show = array("C","C#","D","D#","E","F","F#","G","G#","A","A#","B");



$notes_select = '<select id="note_input" name="note">';

for($i = 0; $i < sizeof($notes_show); $i++){
  $notes_select .= '<option>'.$notes_show[$i].'</option>';
}

$notes_select .= '</select>';




$shift_select = '<input id="note_shift" name="shift" min="-23" max="23" type="number" value="'.$shift.'">';

$shift_out = '<input type="text" id="note_output" disabled value="">';

$shift_submit = '<input type="button" onclick="shift()" value="Berechne">';


echo $notes_select . "&nbsp;" . $shift_select . "&nbsp;" . $shift_out . "&nbsp;" . $shift_submit;

?>

<script>

function shift(){
  

var notes_show = ["C","C#","D","D#","E","F","F#","G","G#","A","A#","B"];
var notes = ["C","C#","D","D#","E","F","F#","G","G#","A","A#","B","C","C#","D","D#","E","F","F#","G","G#","A","A#","B"];

var isNegative = false;

var note = $('#note_input')[0].value;
var shift = $('#note_shift')[0].value;
  
console.log(note);
console.log(shift);

  if(shift < 0){
    notes_show = notes_show.reverse();
    notes = notes.reverse();
    shift = Math.abs(shift);
    isNegative = true;
  }
  
  for(var i = 0; i < notes.length; i++){
    if(notes[0] != note){
      var temp = notes.shift();
      notes = temp;
      
      temp = notes_show.shift();
      notes_show = temp;
    }
  }


if(isNegative == true){
  shift = -1 * Math.abs(shift); //TODO has to be fixed (negative undefined)
}


$('#note_output')[0].value = notes[shift];


console.log($('#note_output')[0].value);
console.log(shift);


}

</script>