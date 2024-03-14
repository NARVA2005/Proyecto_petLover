<?php

if(isset($_POST['cedula'])){
    require_once '../Clases/MySQL.php';
    $cedula = $_POST['cedula'];
    $mysql = new MYSQL();

$mysql->conectar();
$consulta = $mysql->efectuarConsulta("SELECT * FROM petlover.cita where id_cliente='$cedula'");
$mysql->desconectar();

// Inicializa una variable para almacenar las filas de la tabla HTML
$htmlFilas = '';

// Verifica si hay resultados en la consulta
if ($consulta && $consulta->num_rows > 0) {
    // Recorre los resultados de la consulta
    while ($fila = $consulta->fetch_assoc()) {
        // Genera una fila HTML para cada resultado
        $htmlFilas .= '<tr>';
        $htmlFilas .= '<td>' . $fila['id'] . '</td>';
        $htmlFilas .= '<td>' . $fila['fecha'] . '</td>';
       
        $htmlFilas .= '<td>' . $fila['id_mascota'] . '</td>';
       
        $htmlFilas .= '</tr>';
    }
   
} 
}


?>