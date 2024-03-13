
<?php

session_start();
if (
    isset($_POST['nombres'], $_POST['tipo'], $_POST['raza'], $_POST['nota'], $_POST['id_cliente']) &&
    !empty($_POST['nombres']) && !empty($_POST['raza']) &&!empty($_POST['tipo']) &&
    !empty($_POST['nota']) && !empty($_POST['id_cliente'])
) {
   
    require_once '../Clases/MySQL.php';

  
    $nombre = $_POST['nombres'];
    $raza = $_POST['raza'];
    $tipo = $_POST['tipo'];
    $nota = $_POST['nota'];
    $cliente = $_POST['id_cliente'];

   
    $mysql = new MYSQL();
    $mysql->conectar();

  
  $consultaExistencia = $mysql->efectuarConsulta("select * from petlover.cliente where identificacion = '$cliente'"); 

   if (mysqli_num_rows($consultaExistencia) > 0 ) {
    $consulta= $mysql->efectuarConsulta("insert into petlover.mascota(nombre,tipo,raza,nota,id_cliente) values('$nombre','$tipo','$raza','$tipo','$cliente')");
$mysql->desconectar();
echo ($cliente);
if($consulta)
{
 
 
 header('location: ../IniciarSesion.php');
}
else{
 $_SESSION['mensaje']="Ocurrio un error al Registrarse con la mascota";
 $_SESSION['tipo']="danger";
 header("location: ../registroMascota.php");
 }
 } else{
    $_SESSION['mensaje']="Usuario no existe";
    $_SESSION['tipo']="danger";
    header("location: ../registroMascota.php");
 }   
}



 
//-----------------------------------------------------
     
   