<?php
echo'<h2>Version1</h2>';
$horario=
[
    '8:15'=>['LUNES'=>'IPE2','MARTES'=>'DWENC','MIERCOLES'=>'IPE2','JUEVES'=>'DWESV','VIERNES'=>'OPT2I'],
    '9:10'=>['LUNES'=>'DWESV','MARTES'=>'DWENC','MIERCOLES'=>'DWENC','JUEVES'=>'DWESV','VIERNES'=>'OPT2A'],
    '10:05'=>['LUNES'=>'DWESV','MARTES'=>'DWESV','MIERCOLES'=>'DWENC','JUEVES'=>'DWESV','VIERNES'=>'DASP'],
    '11:30'=>['LUNES'=>'PIMOD','MARTES'=>'DWESV','MIERCOLES'=>'DMESV','JUEVES'=>'SASP','VIERNES'=>'DMESV'],
    '12:25'=>['LUNES'=>'DEAPW','MARTES'=>'PIMOD','MIERCOLES'=>'DEAPW','JUEVES'=>'OPT1','VIERNES'=>'DMESV'],
    '13:20'=>['LUNES'=>'DWENC','MARTES'=>'DEAPW','MIERCOLES'=>'DEAPW','JUEVES'=>'IPE2','VIERNES'=>'TUTO'],
    '14:15'=>['LUNES'=>'DWENC']
];
$d=["LUNES","MARTES","MIERCOLES","JUEVES","VIERNES"];//Array para mostrar los dias arriba , porque si utilizase el array de arriba me mostraria muchas veces los dias 
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
    ''=>'#ffffff'//Para las celdas vacias porque si no da error de undefined key desde martes a viernes  
];


function mostrarHorario($horario,$d,$colores)
{
    echo"<tr><th>DIAS</th>";
    foreach($d as $dias)//Foreach para mostrar los dias arriba
        {
            echo "<th>".$dias."</th>";
        }
    echo"</tr>";
    foreach($horario as $hora=>$asignatura)//Foreach que recorre el indice hora
        {
            echo "<tr><td>".$hora."</td>";
            foreach($asignatura as $dia)//Hay que tener cuidado con poner un tipo string en lugar de array
                {
                    $color = $colores[$dia];//Asigna color a cada asignatura 
                    echo "<td style='background-color:".$color.";'>".$dia."</td>";                
                }
                echo "</tr>";
        }
        
}
echo "<table border='1'cellspacing='3'>";
    mostrarHorario($horario,$d,$colores);
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



function horarioNumericoAsociativo($horario2, $d, $colores)
{
    $totalHoras = count($horario2);
    echo "<tr><th>DIAS</th>";
    foreach($d as $dias)
    {
        echo "<th>".$dias."</th>";
    }
    echo "</tr>";

    for($i = 1; $i <= $totalHoras; $i++)
    {
        echo '<tr><td>'.$i.'</td>';
        foreach($d as $dias)
        {
            $asignatura = $horario2[$i][$dias];
            $color = $colores[$asignatura];
            echo "<td style='background-color:".$color.";'>".$asignatura."</td>"; 
        }
        echo '</tr>';
    }
}

echo "<table border='1' cellspacing='3'>";
    horarioNumericoAsociativo($horario2, $d, $colores);
echo '</table>';
?>

