<?php 
    require_once 'configdb.php';
    $sql = "SELECT a.codigoAsignatura, a.nombre, c.idColor, c.colorhexadecimal
        FROM asignatura2 a
        INNER JOIN colores c ON c.idColor = a.idColor";
    //Version fila por fila
    $resultado = $conexion->query($sql);
    $fila = $resultado->fetch_array();
   
    
    //version todas las filas
   if($resultado->fetch_array())
    { 
         $filas=$resultado->num_rows;
         echo $filas." filas";
         echo "<table border='1' cellpadding='3' >";
        while($fila = $resultado->fetch_array()) {
                echo "<tr>";
                echo "<td>".$fila['codigoAsignatura']."</td>";
                echo "<td>".$fila['nombre']."</td>";
                echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
                echo "</tr>";
            }
    }
    else{
        echo "<h1>NO HAY NINGUNA ASIGNATURA</h1>";
    }

    //Hacer tantos fetch_array como filas haya
    
    
    
    echo "</table>";



?>