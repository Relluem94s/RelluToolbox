<?php

if( !function_exists('random_bytes') ){
    function random_bytes($length = 6)    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $output = '';
        for ($i = 0; $i < $length; $i++){
            $output .= $characters[rand(0, $charactersLength - 1)];
        }

        return $output;
    }
}

function formatUUIDv4($data){
  assert(strlen($data) == 16);

  $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
  $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
  return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

for($i = 0; $i <= 5; $i++){
    echo '<input
      id="uuid_' . $i . '"
      type="text"
      disabled
      class="form-control"
      value="' . formatUUIDv4(random_bytes(16)) . '">';
}
