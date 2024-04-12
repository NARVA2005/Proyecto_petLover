
<?php

session_start();
if (
    isset($_POST['descripcion'], $_POST['tipo'], $_POST['precio'])
) {
   
    require_once '../Clases/MySQL.php';

  
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];


   
    $mysql = new MYSQL();
    $mysql->conectar();

  
  $consultaExistencia = $mysql->efectuarConsulta("select * from petlover.servicio where descripcion = '$descripcion'"); 

   if (mysqli_num_rows($consultaExistencia) == 0 ) {
    $consulta = $mysql->efectuarConsulta("INSERT INTO petlover.servicio (descripcion, precio, servicios_para_mascota) VALUES ('$descripcion', '$precio', '$tipo')");
    $mysql->desconectar();
echo ($cliente);
if($consulta)
{
 
 
 header('location: ../AgregarServicios.php');
}
else{
 $_SESSION['mensaje']="Ocurrio un error al Registrar el servicio";
 $_SESSION['tipo']="danger";
 header("location: ../AgregarServicios.php");
 }
 } else{
    $_SESSION['mensaje']="El servicio ya existe";
    $_SESSION['tipo']="danger";
    header("location: ../AgregarServicios.php");
 } 
}



 
//-----------------------------------------------------
     
   