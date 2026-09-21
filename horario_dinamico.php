<?php
//Version que contiene arrays asociativos mostrando horas y dias (Ej:'8:15','LUNES')
echo'<h2>Version1</h2>';
$horario=
[
    '8:15' =>['LUNES'=>'IPE2','MARTES'=>'DWENC','MIERCOLES'=>'IPE2','JUEVES'=>'DWESV','VIERNES'=>'OPT2I'],
    '9:10' =>['LUNES'=>'DWESV','MARTES'=>'DWENC','MIERCOLES'=>'DWENC','JUEVES'=>'DWESV','VIERNES'=>'OPT2A'],
    '10:05'=>['LUNES'=>'DWESV','MARTES'=>'DWESV','MIERCOLES'=>'DWENC','JUEVES'=>'DWESV','VIERNES'=>'DASP'],
    '11:30'=>['LUNES'=>'PIMOD','MARTES'=>'DWESV','MIERCOLES'=>'DMESV','JUEVES'=>'SASP','VIERNES'=>'DMESV'],
    '12:25'=>['LUNES'=>'DEAPW','MARTES'=>'PIMOD','MIERCOLES'=>'DEAPW','JUEVES'=>'OPT1','VIERNES'=>'DMESV'],
    '13:20'=>['LUNES'=>'DWENC','MARTES'=>'DEAPW','MIERCOLES'=>'DEAPW','JUEVES'=>'IPE2','VIERNES'=>'TUTO'],
    '14:15'=>['LUNES'=>'DWENC','MARTES'=>'','MIERCOLES'=>'','JUEVES'=>'','VIERNES'=>'']
];

$colores = [
    'IPE2'  => '#FFD1DC', 
    'DWENC' => '#AEC6CF', 
    'DWESV' => '#77DD77', 
    'OPT2I' => '#FDFD96', 
    'OPT2A' => '#B39EB5', 
    'DASP'  => '#FFB347', 
    'PIMOD' => '#CFCFC4', 
    'DMESV' => '#836FFF', 
    'SASP'  => '#FF6961', 
    'DEAPW' => '#CB99C9', 
    'OPT1'  => '#E6E6FA', 
    'TUTO'  => '#F5DEB3',
    ''      => '#ffffff' // Para las celdas vacias
];


function mostrarHorario($horario, $colores)
{
    $cabeceraMostrada = false; // DECLARADA FUERA DEL FOREACH
    
    foreach($horario as $hora => $asignatura)
    {
        // 1. Cabecera (Solo se ejecuta una vez en la primera vuelta)
        if (!$cabeceraMostrada) {
            echo "<tr>";
            echo "<th>HORA</th>";
            foreach ($asignatura as $dia => $nombreAsignatura) {
                echo "<th>" . $dia . "</th>"; // Extrae los dias directamente del array
            }
            echo "</tr>";
            $cabeceraMostrada = true; 
        }

        // 2. Fila con hora y asignaturas
        echo "<tr><td>".$hora."</td>";
        foreach($asignatura as $dia)
        {
            $color = $colores[$dia];
            echo "<td style='background-color:".$color.";'>".$dia."</td>";                
        }
        echo "</tr>";
    }
}

echo "<table border='1' cellspacing='3'>";
    mostrarHorario($horario, $colores);
echo '</table>';







//Version con numerico y asociativo
echo'<h2>Version2</h2>';
$horario2=
[
    1=>['LUNES'=>'IPE2','MARTES'=>'DWENC','MIERCOLES'=>'IPE2','JUEVES'=>'DWESV','VIERNES'=>'OPT2I'],
    2=>['LUNES'=>'DWESV','MARTES'=>'DWENC','MIERCOLES'=>'DWENC','JUEVES'=>'DWESV','VIERNES'=>'OPT2A'],
    3=>['LUNES'=>'DWESV','MARTES'=>'DWESV','MIERCOLES'=>'DWENC','JUEVES'=>'DWESV','VIERNES'=>'DASP'],
    4=>['LUNES'=>'PIMOD','MARTES'=>'DWESV','MIERCOLES'=>'DMESV','JUEVES'=>'SASP','VIERNES'=>'DMESV'],
    5=>['LUNES'=>'DEAPW','MARTES'=>'PIMOD','MIERCOLES'=>'DEAPW','JUEVES'=>'OPT1','VIERNES'=>'DMESV'],
    6=>['LUNES'=>'DWENC','MARTES'=>'DEAPW','MIERCOLES'=>'DEAPW','JUEVES'=>'IPE2','VIERNES'=>'TUTO'],
    7=>['LUNES'=>'DWENC','MARTES'=>'','MIERCOLES'=>'','JUEVES'=>'','VIERNES'=>'']//Rellenamos de martes a viernes con '' para poder asignarle el color blanco como si estuviese vacio
];



function horarioNumericoAsociativo($horario2, $colores)
{
    $totalHoras = count($horario2);
    echo "<tr><th>HORA</th>";
    foreach ($horario2[1] as $dia => $asignatura) {
        echo "<th>" . $dia . "</th>";
    }
    echo "</tr>";

    for($i = 1; $i <= $totalHoras; $i++)
    {
        echo '<tr><td>'.$i.'</td>';
        foreach($horario2[$i] as $asig)
        {
            $color = $colores[$asig];
            echo "<td style='background-color:".$color.";'>".$asig."</td>";
        }
        
        echo '</tr>';
    }
}

echo "<table border='1' cellspacing='3'>";
    horarioNumericoAsociativo($horario2, $colores);
echo '</table>';
?>

