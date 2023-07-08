<?php
function format_uuidv4($data){
  assert(strlen($data) == 16);

  $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
  $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
  return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

for($i = 0; $i <= 5; $i++){
    echo format_uuidv4(random_bytes(16)) . "<br>";
}