<?php

const NETWORK = 'https://codember.dev/network.txt';

$data = file_get_contents(NETWORK);

// var_dump($data);


$result = preg_match_all('/(\[[0-9]+,[0-9]+\])/', $data, $match);

var_dump($match);


// $patron = '/^\[[1-9]+,[1-9]+\]$/';
// $cadena1 = '[1,2]';
// $cadena2 = '[0,1]';
// $resultadin=preg_match($patron, $cadena1);
// var_dump($resultadin);

// if (preg_match($patron, $cadena1)) {
//     echo "'$cadena1' coincide con el patrón.\n";
// } else {
//     echo "'$cadena1' no coincide con el patrón.\n";
// }

// if (preg_match($patron, $cadena2)) {
//     echo "'$cadena2' coincide con el patrón.\n";
// } else {
//     echo "'$cadena2' no coincide con el patrón.\n";
// }

?>