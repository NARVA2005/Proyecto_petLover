
<?php


if (
    isset($_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['contra'],$_POST['identi']) &&
    !empty($_POST['nombres']) && !empty($_POST['apellidos']) &&
    !empty($_POST['correo']) && !empty($_POST['contra'])&& !empty($_POST['identi'])
) {
   
    require_once './Clases/MySQL.php';

  
    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];
    $identi = $_POST['identi'];
   
    $mysql = new MYSQL();
    $mysql->conectar();

  
    $consultaExistencia = $mysql->efectuarConsulta("select * from petlover.cliente where correo = '$correo' or identificacion='$identi'");

    if (mysqli_num_rows($consultaExistencia) > 0 ) {
        $_SESSION['mensaje']="Usuario existente";
$_SESSION['tipo']="warning";

header('location: Clientes.php');
}else{

$consulta= $mysql->efectuarConsulta("insert into petlover.cliente(identificacion,nombre,apellido,correo,password) values('$identi','$nombre','$apellido','$correo','$contra')");
$mysql->desconectar();

if($consulta)
{
 
 
    $_SESSION['mensaje']="Se registro correctamente";
    $_SESSION['tipo']="danger";
    header("location: Clientes.php");
}
else{
 $_SESSION['mensaje']="Ocurrio un error al Registrarse";
 $_SESSION['tipo']="danger";
 header("location: Clientes.php");
 }
 }



 }

   