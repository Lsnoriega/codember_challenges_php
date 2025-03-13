<?php

const LOG = "https://codember.dev/log.txt";

$data = file(LOG);

$data_test = '03345678';

function DetectandoAccesoNoDeseado($data) {

    $calculo = preg_match('/^(?:[0-9]+[a-z]+|[a-z]+|[0-9]+)$/', $data, $match);
    

    if ($calculo == true) {
        $extraccion_string = preg_replace('/[0-9]+/','',$data);
        $extraccion_int = preg_replace('/[a-z]+/','',$data);
        $longitud_cadena_texto = strlen($extraccion_string);
        $longitud_cadena_int = strlen($extraccion_int);

        if ($longitud_cadena_texto > 1) {
            
            
            for ($i=1; $i < $longitud_cadena_texto; $i++) { //orden creciente
                if ($extraccion_string[$i] < $extraccion_string[$i - 1]) {//se compara con el valor con la tabla ascii en esta linea y asi se verifica el orden creciente
                    
                    return false;
                }//no se retorna true en un else ya que al ser correcto el patrón en cada letra que sigue retornaria true a cada momento.
            }
            
        }
        if ($longitud_cadena_int > 1) {
            
            for ($i=1; $i < $longitud_cadena_int; $i++) { //orden creciente
                if ($extraccion_int[$i] < $extraccion_int[$i - 1]) {//se compara con el valor con la tabla ascii en esta linea y asi se verifica el orden creciente
                    
                    return false;
                }//no se retorna true en un else ya que al ser correcto el patrón en cada letra que sigue retornaria true a cada momento.
            }
            
        }

         return true;
    }else{
        return false;
    }
        
}

// for ($i=0; $i < 100; $i++) { 
//     echo "El numero $i - " . $data[$i].' Es igual a:'. ((DetectandoAccesoNoDeseado($data[$i]) == true) ? 'Verdadero' : 'Falso').'<br>';
// }

// for ($i=0; $i < 5; $i++) {
//     $data = $data[$i];
//     $result = DetectandoAccesoNoDeseado($data);
//     if ($result) {
//         echo $data." es verdadero";
//     }
//     else {
//         echo $data."es falso";
//     }
// }
echo '<br>';

$contador_true = 0;
$contador_false = 0;

foreach ($data as $value) {
$value = trim($value);//TRIM EL SANTO GRIAL RESULTA QUE EL PUT* FILE() TAMBIEN PASA EL SALTO DE LINEA QUE CONTENIA EL .TXT;
$result = DetectandoAccesoNoDeseado($value);
// echo 'el resultado es : '.$result.'<br>';
    if ($result) {
        $contador_true++;
    }
    else {
        $contador_false++;
    }
}


echo 'el conteo de trues es: '.$contador_true.'<br>';
echo 'el conteo de falsetes es: '.$contador_false.'<br>';
echo '<br>';
echo $data_test.' Es igual a: '. DetectandoAccesoNoDeseado($data[1]);
// echo $data[1];


// '.$calculo = ($calculo == true) ? 'true' : 'false'


?>