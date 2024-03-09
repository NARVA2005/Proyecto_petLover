<?php
if (isset($_GET['id']) && isset($_GET['nombre']) && isset($_GET['apellido']) && isset($_GET['correo']) && isset($_GET['contra'])) {
    // Obtener los datos del formulario
    $idCliente = $_GET['id'];
    $nombreCliente = $_GET['nombre'];
    $apellidoCliente = $_GET['apellido'];
    $CorreoCliente = $_GET['correo'];
    $ContrasenaCliente = $_GET['contra'];

    // Verificar si todos los campos del formulario están llenos
    if (empty($idCliente) || empty($nombreCliente) || empty($apellidoCliente) || empty($CorreoCliente) || empty($ContrasenaCliente)) {
        // Mostrar un mensaje de error y redirigir de vuelta a la página del formulario
        $_SESSION['mensaje'] = "Todos los campos son obligatorios";
        $_SESSION['tipo'] = "error";
        header("location: Clientes.php");
        exit(); // Terminar la ejecución del script
    }

    // Actualizar los datos en la base de datos
    require_once './Clases/MySQL.php';
    $mysql = new MYSQL();
    $mysql->conectar();

    $actualizarCliente = $mysql->efectuarConsulta("UPDATE petlover.cliente SET nombre='$nombreCliente', apellido='$apellidoCliente', correo='$CorreoCliente', password='$ContrasenaCliente' WHERE identificacion='$idCliente'");

    if ($actualizarCliente) {
        //de lo contrario no avanza del login
        $_SESSION['mensaje'] = "Datos registrados";
        $_SESSION['tipo'] = "success";
        header("location: Clientes.php");
        exit(); // Terminar la ejecución del script después de redirigir
    } else {
        //de lo contrario no avanza del login
        $_SESSION['mensaje'] = "Datos no actualizados en la base de datos";
        $_SESSION['tipo'] = "warning";
        header("location: clientes.php");
        exit(); // Terminar la ejecución del script después de redirigir
    }
} else {
    //de lo contrario no avanza del login
    $_SESSION['mensaje'] = "Datos no recibidos en el formulario";
    $_SESSION['tipo'] = "warning";
    header("location: clientes.php");
    exit(); // Terminar la ejecución del script después de redirigir
}
?>
