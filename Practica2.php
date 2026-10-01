<?php
    require_once 'configdb.php';
    $sql = "SELECT a.codigoAsignatura, a.nombre, c.idColor, c.colorhexadecimal
        FROM asignatura a
        INNER JOIN colores c ON c.idColor = a.idColor";
    $resultado = $conexion->query($sql);

    $fila = $resultado->fetch_array();//Te devuelve el array con indice numerico y asociativo
    //$fila = $resultado->fetch_assoc();//Te devuelve el array con indice asociativo
    //$fila=$resultado-> fetch_num()//Te devuelve el array con indice numerico
    
    /*
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";*/
    
    //Hacer un foreach completo ($fila,$indice,$asignatura)
    foreach($fila as $indice => $asignatura)/*Con este for each realmente te devuelve 2 veces el valor de cada campo de la fila 0 
    pero cambiando el indice. Te devuelve el array con indice numerico y con el asociativo mezclado*/
        {
            echo 'Indice - ';
            echo $indice;
            echo '<br>';
            echo 'Asignatura - ';
            echo $asignatura;
            echo '<br><br>';
        }

?>