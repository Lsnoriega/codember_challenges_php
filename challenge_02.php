<?php

const TRACE = "https://codember.dev/trace.txt";

$data = file(TRACE);

function SiguiendoLaPistaDeLaIA($data)   {

    // for ($i=0; $i < strlen($value); $i++) { 
        
    // }
        $value = trim($data);
        $position = 0;
        $result = explode(" ",$value);
        $limit_position = count($result);
        $instruction = $result[$position];
        $steps = 1;
        
        // var_dump($limit_position);

        // for ($i=0; $i < 5; $i++) { 
          
    
        while (true) { 
            
            if ($instruction > 0) {
                // $result = substr_replace($result, $instruction + 1, $position, 1);
                $result[$position] = strval(intval($result[$position] + 1));
                $position = $position + $instruction;
            } 
            if ($instruction < 0) {
                // $result = substr_replace($result, $instruction + 1, $position, 1);
                $result[$position] = strval(intval($result[$position] + 1));
                $position = $position + $instruction;
            } 
            
            if ($instruction == 0) {
                // $result = substr_replace($result, $instruction + 1, $position, 1);
                $result[$position] = strval(intval($result[$position] + 1));
            }
            
            
            if (intval($position) >= $limit_position) {
                $instruction = 0;
                $message = 'Sale por la derecha <br>';
                break;
            }elseif (intval($position) < 0) {
                $instruction = 0;
                $message = 'Sale por la izquierda <br>';
                break;
            }else{
                $instruction = $result[$position];
                $message = 'nada por ahora <br><br>';
            }

            $steps++; 
            
        }

    return ["value"=>strval($value), "position"=> $position, "instruction"=>$instruction, "result"=>implode(' ',$result), "message"=>$message, "limit"=>$limit_position, "steps"=>$steps];
    // return '<br> valor: '.$value.' posición: '.$position.' instrucción: '.$instruction. ' resultado: '.implode(' ',$result) .' '.$message.'limite: '. $limit_position.' pasos: '.$steps;
}


// while ($escape = true) {
//     echo 'escapando...<br>';
//     $escapismo = 'hover';
//     break;
    
// }

// echo $escapismo;

// $value = trim($data[0]);
// $position = 0;
// $instruction = $value[0];
//despues de usar +1 o ++

// echo '<br>valor: '.$value.' posición: '.$position.' instrucción: '.$instruction;
$total_steps = 0;
foreach ($data as $value) {
    
    // echo '<br> result:'. SiguiendoLaPistaDeLaIA($value).'<br>';
    $total = SiguiendoLaPistaDeLaIA($value);
    
    echo "VALOR INICIAL: ".$total["value"]." POSICIÓN: ".$total["position"]." INSTRUCCIÓN: ".$total["instruction"]." RESULTADO: ".$total["result"]." MENSAJE: ".$total["message"]." LIMITE: ".$total["limit"]." PASOS: ".$total["steps"]."<br><br>";

    $total_steps = $total_steps + $total["steps"];
    
}
echo '<br> TOTAL DE PASOS: '.$total_steps;
?>