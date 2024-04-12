<?php

session_start();

require_once '../Clases/MySQL.php';

$producto_id = $_GET['ProductoID'];

$mysql = new MYSQL();
$mysql->conectar();

$consultaExistencia = $mysql->efectuarConsulta("SELECT stock FROM petlover.producto WHERE id = $producto_id");

$mysql->desconectar();

if ($consultaExistencia) {
    $resultado =  mysqli_fetch_assoc($consultaExistencia);
    $stock = $resultado['stock'];

    // Devolver el resultado como JSON
    echo json_encode(['stock' => $stock]);
} else {
    // Manejar el error si la consulta falla
    echo json_encode(['error' => 'Error al obtener el stock del producto']);
}





 
//-----------------------------------------------------
     
   