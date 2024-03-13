
<?php
require_once '../Clases/MySQL.php';
$mysql = new MySQL();
$mysql->conectar();

$response = ['success' => false, 'estado' => '', 'error' => ''];

if (isset($_REQUEST['identificacion'])) {
    $id = $_REQUEST['identificacion']; // Usamos REQUEST para manejar tanto GET como POST
    $consulta = $mysql->efectuarConsulta("SELECT estado FROM petlover.cliente WHERE identificacion = $id");

    if ($consulta->num_rows > 0) {
        $fila = $consulta->fetch_assoc();
        $estado_producto = $fila['estado'];
        $nuevo_estado = '';

        // Cambiar el estado del producto de activo a inactivo o viceversa
        if ($estado_producto === 'activo') {
            $nuevo_estado = 'inactivo';
        } else {
            $nuevo_estado = 'activo';
        }

        // Actualizar el estado del producto en la base de datos
        $actualizacion = $mysql->efectuarConsulta("UPDATE petlover.cliente SET estado = '$nuevo_estado' WHERE identificacion = $id");

        if ($actualizacion) {
            $response['success'] = true;
            $response['estado'] = $nuevo_estado;
        } else {
            $response['error'] = 'No se pudo cambiar el estado del producto';
        }
    } else {
        $response['error'] = 'ID no encontrado en la base de datos';
    }
} else {
    $response['error'] = 'ID no proporcionado';
}

$mysql->desconectar();

header('Content-Type: application/json');
echo json_encode($response);
?>
