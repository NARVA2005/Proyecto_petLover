<?php
if (isset($_GET['id']) && isset($_GET['descripcion']) && isset($_GET['precio']) && isset($_GET['tipo']) ) {
    // Obtener los datos del formulario
    $idServicio = $_GET['id'];
    $descripcion = $_GET['descripcion'];
    $precio = $_GET['precio'];
    $tipo = $_GET['tipo'];
 

    // Verificar si todos los campos del formulario están llenos
    if (empty($idServicio) || empty($descripcion) || empty($precio) || empty($tipo) ) {
        // Mostrar un mensaje de error y redirigir de vuelta a la página del formulario
        $_SESSION['mensaje'] = "Todos los campos son obligatorios";
        $_SESSION['tipo'] = "error";
        header("location: ../AgregarServicios.php");
        exit(); // Terminar la ejecución del script
    }

    // Actualizar los datos en la base de datos
    require_once '../Clases/MySQL.php';
    $mysql = new MYSQL();
    $mysql->conectar();

    $actualizarCliente = $mysql->efectuarConsulta("UPDATE petlover.servicio SET descripcion='$descripcion', precio='$precio', tipo='$tipo' WHERE id='$idServicio'");

    if ($actualizarCliente) {
        //de lo contrario no avanza del login
        $_SESSION['mensaje'] = "Datos registrados";
        $_SESSION['tipo'] = "success";
        header("location: ../AgregarServicios.php");
        exit(); // Terminar la ejecución del script después de redirigir
    } else {
        //de lo contrario no avanza del login
        $_SESSION['mensaje'] = "Datos no actualizados en la base de datos";
        $_SESSION['tipo'] = "warning";
        header("location: ../AgregarServicios.php");
        exit(); // Terminar la ejecución del script después de redirigir
    }
} else {
    //de lo contrario no avanza del login
    $_SESSION['mensaje'] = "Datos no recibidos en el formulario";
    $_SESSION['tipo'] = "warning";
    header("location: ../AgregarServicios.php");
    exit(); // Terminar la ejecución del script después de redirigir
}
?>
