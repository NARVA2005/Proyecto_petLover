<?php
if(isset($_POST['cedula'])){
    require_once '../Clases/MySQL.php';
    $cedula = $_POST['cedula'];
    $mysql = new MYSQL();

    $mysql->conectar();
    $consulta = $mysql->efectuarConsulta("SELECT factura_cita.id, factura_cita.fecha, factura_cita.total, servicio.descripcion AS descripcion_servicio, servicio.precio AS precio_servicio
    FROM petlover.factura_cita 
    INNER JOIN petlover.detalle_factura_cita ON factura_cita.id = detalle_factura_cita.id_factura_cita 
    INNER JOIN petlover.servicio ON detalle_factura_cita.id_servicio = servicio.id 
    INNER JOIN petlover.cita ON factura_cita.id_cita = cita.id
    INNER JOIN petlover.cliente ON cita.id_cliente = cliente.identificacion
    WHERE cliente.identificacion='$cedula'");
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
            $htmlFilas .= '<td>' . $fila['descripcion_servicio'] . '</td>';
            $htmlFilas .= '<td>' . $fila['precio_servicio'] . '</td>';
            $htmlFilas .= '<td>' . $fila['total'] . '</td>';
            $htmlFilas .= '</tr>';
        }
    } 
}
?>
