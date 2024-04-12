<?php
require_once './Clases/MySQL.php';
$mysql = new MYSQL();
$mysql->conectar();

// Recibir los datos del cliente y la factura
$correo = $_POST['correo'];
$itemsFactura = $_POST['items']; // Recibe un array de objetos
$fecha = date("Y-m-d");
$consulta = $mysql->efectuarConsulta("SELECT identificacion FROM petlover.cliente WHERE correo = ". $correo);
$id_cliente = mysqli_fetch_assoc($consulta);

// Insertar los datos en la base de datos
foreach ($itemsFactura as $item) {
    $titulo = $item['titulo'];
    $cantidad = $item['cantidad'];
    $precioUnitario = $item['precioUnitario'];
    $precioTotal = $item['precioTotal'];

   
    $consulta = $mysql->efectuarConsulta("INSERT INTO petlover.factura_producto (fecha,total,id_cliente) VALUES ('$fecha',$precioTotal,$id_cliente");

}


$mysql->desconectar();
?>
