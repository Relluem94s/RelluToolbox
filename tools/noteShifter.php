<?php


$notes = array("C","C#","D","D#","E","F","F#","G","G#","A","A#","B");

$tuning = array("E", "A", "D", "G", "B", "E");



for($i = 0; $i < sizeof($tuning); $i++){

    $notes_select = '<select class="form-control" id="note_input_' . $i . '" oninput="shift(' . $i . ')">';

    for($o = 0; $o < sizeof($notes); $o++){
        $isSelected = "";
        if($tuning[$i] == $notes[$o]){
            $isSelected = " selected";
        }
    
        $notes_select .= '<option' . $isSelected . '>'.$notes[$o].'</option>';
    }
    
    $notes_select .= '</select>';
    $shift_select = '<input class="form-control"
    id="note_shift_' . $i . '"
    min="-24"
    max="24"
    type="number"
    value="0"
    oninput="shift(' . $i . ')">';
    $shift_out = '<input
    class="form-control"
    type="text"
    id="note_output_' . $i . '"
    disabled value="">';



    echo '<div class="input-group">' . $notes_select . $shift_select . $shift_out . '</div>';


}


?>

<table class="table table-striped table-hover table-bordered mt-5">
    <tr>
        <th colspan="7" class="text-center">Tunings</th>
    </tr>
    <tr>
        <th>Standard</th>
        <td>E</td>
        <td>A</td>
        <td>D</td>
        <td>G</td>
        <td>B</td>
        <td>E</td>
    </tr>
    <tr>
        <th>Drop D</th>
        <td>D</td>
        <td>A</td>
        <td>D</td>
        <td>G</td>
        <td>B</td>
        <td>E</td>
    </tr>
    <tr>
        <th>C# Standard</th>
        <td>C#</td>
        <td>F#</td>
        <td>B</td>
        <td>E</td>
        <td>G#</td>
        <td>C#</td>
    </tr>
</table>


<script>

function shift(val){

if (val === undefined) {
    val = 2;
  } 
  

  var notes = ["C","C#","D","D#","E","F","F#","G","G#","A","A#","B"];



  var note = $('#note_input_' + val)[0].value;
  var note_offset = notes.indexOf(note);
  var shift = parseInt($('#note_shift_' + val)[0].value) + note_offset;
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
 
  $('#note_output_' + val)[0].value = notes[shifting];
}

</script>
