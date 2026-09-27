<?php 
    define('SERVIDOR', 'localhost');
    define('USUARIO', 'root');
    define('PASSWORD', ''); 
    define('BBDD', 'prueba');

    function conectar() {
        $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
        $conexion->set_charset("utf8"); 
        return $conexion;
    }

    $conexion = conectar();
    $sql = "SELECT a.codigoAsignatura, a.nombre, c.idColor, c.colorhexadecimal
            FROM asignatura a
            INNER JOIN colores c ON c.idColor = a.idColor";
    $resultado = $conexion->query($sql);

    //INICIALIZAMOS EL ARRAY DE COLORES DESDE LA BASE DE DATOS
    $colores = [
        '' => '#ffffff' // Color por defecto para las celdas vacías
    ];

    // Rellenamos el array con los datos de la consulta
    while($fila = $resultado->fetch_array()) {
        $codigo = $fila['codigoAsignatura'];
        $hexadecimal = $fila['colorhexadecimal'];
        
        // Creamos la clave valor en el array
        $colores[$codigo] = $hexadecimal;
    }

    //DEFINIMOS LOS HORARIOS
    $horario = [
        '8:15' =>['LUNES'=>'IPP2','MARTES'=>'DWENC','MIERCOLES'=>'IPP2','JUEVES'=>'DWESV','VIERNES'=>'OPT 1'],
        '9:10' =>['LUNES'=>'DWESV','MARTES'=>'DWENC','MIERCOLES'=>'DWENC','JUEVES'=>'DWESV','VIERNES'=>'OPT2A'],
        '10:05'=>['LUNES'=>'DWESV','MARTES'=>'DWESV','MIERCOLES'=>'DWENC','JUEVES'=>'DWESV','VIERNES'=>'DASP'],
        '11:30'=>['LUNES'=>'PIMOD','MARTES'=>'DWESV','MIERCOLES'=>'DWESV','JUEVES'=>'SASP','VIERNES'=>'DWESV'],
        '12:25'=>['LUNES'=>'DEAPW','MARTES'=>'PIMOD','MIERCOLES'=>'DEAPW','JUEVES'=>'OPT 1','VIERNES'=>'DWESV'],
        '13:20'=>['LUNES'=>'DWENC','MARTES'=>'DEAPW','MIERCOLES'=>'DEAPW','JUEVES'=>'IPP2','VIERNES'=>'TUTO'],
        '14:15'=>['LUNES'=>'DWENC','MARTES'=>'','MIERCOLES'=>'','JUEVES'=>'','VIERNES'=>'']
    ];

    $horario2 = [
        1=>['LUNES'=>'IPP2','MARTES'=>'DWENC','MIERCOLES'=>'IPP2','JUEVES'=>'DWESV','VIERNES'=>'OPT 1'],
        2=>['LUNES'=>'DWESV','MARTES'=>'DWENC','MIERCOLES'=>'DWENC','JUEVES'=>'DWESV','VIERNES'=>'OPT2A'],
        3=>['LUNES'=>'DWESV','MARTES'=>'DWESV','MIERCOLES'=>'DWENC','JUEVES'=>'DWESV','VIERNES'=>'DASP'],
        4=>['LUNES'=>'PIMOD','MARTES'=>'DWESV','MIERCOLES'=>'DWESV','JUEVES'=>'SASP','VIERNES'=>'DWESV'],
        5=>['LUNES'=>'DEAPW','MARTES'=>'PIMOD','MIERCOLES'=>'DEAPW','JUEVES'=>'OPT 1','VIERNES'=>'DWESV'],
        6=>['LUNES'=>'DWENC','MARTES'=>'DEAPW','MIERCOLES'=>'DEAPW','JUEVES'=>'IPP2','VIERNES'=>'TUTO'],
        7=>['LUNES'=>'DWENC','MARTES'=>'','MIERCOLES'=>'','JUEVES'=>'','VIERNES'=>'']
    ];

    //FUNCIONES PARA MOSTRAR HORARIOS
    function mostrarHorario($horario, $colores)
    {
        $cabeceraMostrada = false; 
        foreach($horario as $hora => $asignatura)
        {
            if (!$cabeceraMostrada) {
                echo "<tr>";
                echo "<th>HORA</th>";
                foreach ($asignatura as $dia => $nombreAsignatura) {
                    echo "<th>" . $dia . "</th>"; 
                }
                echo "</tr>";
                $cabeceraMostrada = true; 
            }
            echo "<tr><td>".$hora."</td>";
            foreach($asignatura as $dia)
            {
                if (isset($colores[$dia])) {
                    $color = $colores[$dia];
                } else {
                    $color = '#ffffff';
                }
                echo "<td style='background-color:".$color.";'>".$dia."</td>";                
            }
            echo "</tr>";
        }
    }

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
                $color = '#ffffff'; // Color por defecto
                
                // ¡IMPORTANTE! Aquí usamos $asig, NO $dia
                if (isset($colores[$asig])) {
                    $color = $colores[$asig];
                }
                
                echo "<td style='background-color:".$color.";'>".$asig."</td>";
            }
            
            echo '</tr>';
        }
    }

    // 4. IMPRIMIR RESULTADOS
    echo '<h2>Version1</h2>';
    echo "<table border='1' cellspacing='3'>";
    mostrarHorario($horario, $colores);
    echo '</table>';

    echo '<h2>Version2</h2>';
    echo "<table border='1' cellspacing='3'>";
    horarioNumericoAsociativo($horario2, $colores);
    echo '</table>';
?>