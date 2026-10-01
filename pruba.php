<?php 
    require_once 'configdb.php';
    $sql = "SELECT a.codigoAsignatura, a.nombre, c.idColor, c.colorhexadecimal
        FROM asignatura a
        INNER JOIN colores c ON c.idColor = a.idColor";
    //Version fila por fila
    $resultado = $conexion->query($sql);
    $fila = $resultado->fetch_array();
    echo "<table border='1' cellpadding='3' >";
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";

    $fila = $resultado->fetch_array();//Fetch array es el metodo y $resultado es el objeto
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";

    $fila = $resultado->fetch_array();//Fetch array es el metodo y $resultado es el objeto
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";

    $fila = $resultado->fetch_array();//Fetch array es el metodo y $resultado es el objeto
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";

    $fila = $resultado->fetch_array();//Fetch array es el metodo y $resultado es el objeto
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";

    $fila = $resultado->fetch_array();//Fetch array es el metodo y $resultado es el objeto
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";

    $fila = $resultado->fetch_array();//Fetch array es el metodo y $resultado es el objeto
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";

    $fila = $resultado->fetch_array();//Fetch array es el metodo y $resultado es el objeto
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";

    $fila = $resultado->fetch_array();//Fetch array es el metodo y $resultado es el objeto
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";

    $fila = $resultado->fetch_array();//Fetch array es el metodo y $resultado es el objeto
    echo "<tr>";
    echo "<td>".$fila['codigoAsignatura']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
    echo "</tr>";

    if($fila = $resultado->fetch_array())//Fetch array es el metodo y $resultado es el objeto
    {
        echo "<tr>";
        echo "<td>".$fila['codigoAsignatura']."</td>";
        echo "<td>".$fila['nombre']."</td>";
        echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
        echo "</tr>";}
    else{
        echo'<h1>ERROR<h1>';
    }

    //version todas las filas
    /*while($fila = $resultado->fetch_array()) {
            echo "<tr>";
            echo "<td>".$fila['codigoAsignatura']."</td>";
            echo "<td>".$fila['nombre']."</td>";
            echo '<td style="background-color: '.$fila['colorhexadecimal'].';">'.$fila['idColor'].'</td>';   
            echo "</tr>";
        }*/

    //Hacer tantos fetch_array como filas haya
    //Numero filas
    $filas=$resultado->num_rows;
    echo $filas;
    echo "</table>";



?>