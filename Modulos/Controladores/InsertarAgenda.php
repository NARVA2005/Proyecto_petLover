<?php

require('../Clases/MySQL.php');

$mysql = new MYSQL();
$fecha = $_POST['fecha'];
$id_cliente = $_POST['id_cliente'];


try{



$mysql ->conectar();
$resultado_mascota = $mysql->efectuarConsulta("SELECT mascota.id FROM petlover.cliente 
INNER JOIN petlover.mascota ON mascota.id_cliente = cliente.identificacion
WHERE cliente.identificacion = $id_cliente");

// Verificar si se obtuvo un resultado
if ($resultado_mascota) {
    // Extraer el ID de la mascota
    $fila_mascota = mysqli_fetch_assoc($resultado_mascota);
    $id_mascota = $fila_mascota['id'];

    // Insertar la cita usando los IDs obtenidos
    $fecha = date('Y-m-d', strtotime(str_replace('/', '-', $fecha)));

    $resultado = $mysql -> efectuarConsulta("SELECT * FROM petlover.cita WHERE fecha = '$fecha'");
    $numFilas = $resultado->num_rows;
    if($numFilas == 0){
        
        $mysql->efectuarConsulta("INSERT INTO petlover.cita VALUES('','$fecha', $id_cliente, $id_mascota)");
    
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../node_modules/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="../../assets/css/login-register.css">
        <title>Error</title>
    </head>

    <body>

        <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script>
                            Swal.fire({
                                icon: 'success',
                                title: "Cita agendada correctamente",
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false
                            }).then((result) => {
        
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    open("../Servicios.php", "_self");
                                }
                            });
                            window.addEventListener("click", () => {
                                open("../Servicios.php", "_self");
                            });
                        </script>
    </body>

    </html>

<?php
}else{

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../node_modules/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="../../assets/css/login-register.css">
        <title>Error</title>
    </head>

    <body>

        <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script>
                            Swal.fire({
                                icon: 'error',
                                title: "Error esta fecha no esta disponible, por favor seleccione otra",
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false
                            }).then((result) => {
        
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    open("../Servicios.php", "_self");
                                }
                            });
                            window.addEventListener("click", () => {
                                open("../Servicios.php", "_self");
                            });
                        </script>
    </body>

    </html>

<?php



}
} else {
    // Manejar el caso en que no se obtenga ningún resultado
    echo "Error al obtener el ID de la mascota.";
}

$mysql->desconectar();
}
catch(Exception $ex){
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../node_modules/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="../../assets/css/login-register.css">
        <title>Error</title>
    </head>

    <body>

        <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire({
                icon: 'Upps',
                title: "Algo ocurrió(Error interno)...",
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                            open("./modulos/Servicios.php", "_self");
                        }
                    });
                    window.addEventListener("click", () => {
                        open("./modulos/Servicios.php", "_self");
                    });
        </script>
    </body>

    </html>


<?php

}




?>