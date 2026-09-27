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
    $conexion =conectar();
    $sql = "SELECT a.codigoAsignatura, a.nombre, c.idColor, c.colorhexadecimal
        FROM asignatura a
        INNER JOIN colores c ON c.idColor = a.idColor";
    $resultado = $conexion->query($sql);

    echo "<table border='1' cellpadding='3' >";
    echo "<tr><th>Código</th><th>Nombre</th><th>ID Color</th></tr>";
     while($fila = $resultado->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $fila['codigoAsignatura'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo '<td style="background-color: ' . $fila['colorhexadecimal'] . ';">' . $fila['idColor'] . '</td>';   
            echo "</tr>";
        }
    echo "</table>";



?>