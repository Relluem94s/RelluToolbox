<?php


$note = "";
$shift = 0;
$isNegative = false;
$notes_show = array("C","C#","D","D#","E","F","F#","G","G#","A","A#","B");
$notes = array("C","C#","D","D#","E","F","F#","G","G#","A","A#","B","C","C#","D","D#","E","F","F#","G","G#","A","A#","B");

if(isset($_POST['note']) && isset($_POST['shift'])){
  $note = $_POST['note'];
  $shift = $_POST['shift'];
  
  if($shift < 0){
    $notes_show = array_reverse($notes_show);
    $notes = array_reverse($notes);
    $shift = abs($shift);
    $isNegative = true;
  }
  
  for($i = 0; $i < sizeof($notes); $i++){
    if($notes[0] != $note){
      $temp = array_shift($notes);
      $notes[] = $temp;
      
      $temp = array_shift($notes_show);
      $notes_show[] = $temp;
    }
  }
}

$note = $notes[$shift];


$notes_select = '<select name="note">';

for($i = 0; $i < sizeof($notes_show); $i++){
  $notes_select .= '<option>'.$notes_show[$i].'</option>';
}

$notes_select .= '</select>';

if($isNegative == true){
  $shift = -1 * abs($shift);
}

$shift_select = '<input name="shift" min="-23" max="23" type="number" value="'.$shift.'">';

$shift_out = '<input type="text" disabled value="'.$note.'">';

$shift_submit = '<input type="submit" value="Berechne">';


echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">' . $notes_select . "&nbsp;" . $shift_select . "&nbsp;" . $shift_out . "&nbsp;" . $shift_submit . '</form>';
