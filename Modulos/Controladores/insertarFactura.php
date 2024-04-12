
<?php
require_once '../Clases/MySQL.php';

  

$total = $_POST['total'];
$correo = $_SESSION['correo'];
$fecha_actual = date("Y-m-d");



$mysql = new MYSQL();
$mysql->conectar();

$id= $mysql->efectuarConsulta("select identificacion from petlover.cliente where correo = ".$correo);

$id = mysqli_fetch_assoc($id);

$consulta= $mysql->efectuarConsulta("insert into petlover.factura_producto values('$fecha_actual','$total','$id')");
$mysql->desconectar();
echo ($cliente);
if($consulta)
{


header('location: ../inicioClientes.php');
}
else{
$_SESSION['mensaje']="Ocurrio un error al Registrarse con la mascota";
$_SESSION['tipo']="danger";
header("location: ../inicioClientes.php");
}


?>
