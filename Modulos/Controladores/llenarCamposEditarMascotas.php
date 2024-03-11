<link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    
    <?php

    // Funciones

    function loadSuccess(){
        ?>
        <!DOCTYPE html>
                    <html lang="en">
        
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="../../node_modules/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">
                     
                        <title>Registro exitoso</title>
                    </head>
        
                    <body>
        
                        <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: "Mascota actualizado correctamente",
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false
                            }).then((result) => {
        
                                if (result.dismiss === Swal.DismissReason.timer) {
                              open("../mascotas.php", "_self");
                                }
                            });
                           
                        </script>
                    </body>
        
                    </html>
                
                <?php 
                }
            



    function loadError($message,$titleDocument,$icon){
        
        ?>
        <!DOCTYPE html>
                    <html lang="en">
        
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="../node_modules/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">
                        <link rel="stylesheet" href="../assets/css/login-register.css">
                        <title><?php echo $titleDocument?></title>
                    </head>
        
                    <body>
        
                        <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
                        <script>
                            Swal.fire({
                                icon: '<?php  echo $icon?>',
                                title: '<?php  echo $message?>',
                                timer: 3500,
                                timerProgressBar: true,
                                showConfirmButton: false
                            }).then((result) => {
        
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    open("../mascotas.php", "_self");
                                }
                            });
                         
                        </script>
                    </body>
        
                    </html>
                
                <?php 
                }
    // controla el inicio de sesión
    // se verifica que existan datos en el formulario
    try {
        // se instancia la clase, es decir, se llama para poder usar sus métodos
      
        require_once '../clases/MYSQL.php';
    
      
        $mysql = new MYSQL();          
                
    
            if (
                isset($_POST['raza']) && !empty($_POST['raza']) &&
                isset($_POST['tipo']) && !empty($_POST['tipo'])   &&
                isset($_POST['idMascotas']) && !empty($_POST['idMascotas']) &&
                isset($_POST['nombre']) && !empty($_POST['nombre']) &&
                isset($_POST['nota']) && !empty($_POST['nota']) &&
                isset($_POST['idCliente']) && !empty($_POST['idCliente'])
            ) {
          
            $id= $_POST['idMascotas'];
            $Nombre = $_POST['nombre'];
            $tipoMascota = $_POST['tipo'];
            $razaMascota = $_POST['raza'];
            $nota = $_POST['nota'];
            $idCliente = $_POST['idCliente'];
           
                
               
                        try {
                          
                            $mysql->conectar();
                            $mysql->efectuarConsulta("UPDATE petlover.mascota SET nombre='$Nombre',tipo='$tipoMascota', raza='$razaMascota', nota='$nota', id_cliente=$idCliente  WHERE id=$id");
                            $mysql->desconectar();
                            loadSuccess();
                        } catch (Exception $ex) {
                          
                         
                        }   
                  
               
            }
            else {
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
                            icon: 'error',
                            title: "Verifica si hay campos vacíos o datos incorrectos",
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then((result) => {

                            if (result.dismiss === Swal.DismissReason.timer) {
                               ("../mascotas.php", "_self");
                            }
                        });
                       
                    </script>
                </body>

                </html>
        <?php
            }
        } 
     catch (Exception $ex) {
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
                                open("../mascotas.php", "_self");
                            }
                        });
                       
            </script>
                <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
    <?php
    }