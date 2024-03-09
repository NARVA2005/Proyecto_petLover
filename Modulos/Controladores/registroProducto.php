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
                                title: "Producto registrado correctamente",
                                timer: 2000,
                                timerProgressBar: true,
                                showConfirmButton: false
                            }).then((result) => {
        
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    open("../Empleados.php", "_self");
                                }
                            });
                            window.addEventListener("click", () => {
                                open("../Empleados.php", "_self");
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
                                    open("../Empleados.php", "_self");
                                }
                            });
                            window.addEventListener("click", () => {
                                open("../Empleados.php", "_self");
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
                isset($_POST['nombreProducto']) && !empty($_POST['nombreProducto'] &&
                    isset($_POST['stockProduct'])) && !empty($_POST['stockProduct'] && $_POST['stockProduct']> 0)
            ) {
              // se hace el llamado del modelo de conexión y consultas


            // se capturan las variables que vienen desde el formulario
            $root = '../../assets/img';

            $nameProduct = $_POST['nombreProducto'];
            $stockProduct = $_POST['stockProduct'];
            $image = $_FILES['urlImage']['name'];
            $precio = $_POST['precio'];
            $temp = $_FILES['urlImage']['tmp_name'];
            
            $mysql->conectar();
            $consulta = $mysql->efectuarConsulta("SELECT COUNT(*) FROM petlover.producto where descripcion = '$nameProduct'");
            $mysql->desconectar();
  
                // Verificar que el nombre del producto no exista

                
                if (mysqli_fetch_array($consulta)[0] == 0){
                    echo "Ruta completa: " . $root  . $image;

                if (move_uploaded_file($temp, $root . $image)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            
                    chmod($root  . $image, 0777);
                    $rutaCompleta = $root . $image;
                    $mysql->conectar();
                    $mysql->efectuarConsulta("INSERT 
                    INTO petlover.producto VALUES('','$nameProduct',$stockProduct, $precio, '$rutaCompleta','activo')");
                    $mysql->desconectar();
                    loadSuccess();
                  
                }
                    else{
                        try {
                            $url = $_POST['urlImageOnline']; // URL de la imagen en línea
                            $filename = basename($url); // Obtener el nombre del archivo de la URL
                            $save_path = $root . $filename; // Ruta de destino
                        
                            // Guardar la imagen desde la URL
                            $image_content = file_get_contents($url); // Descargar el contenido de la imagen desde la URL
                            
                            if ($image_content === false) {
                                throw new Exception('Error al obtener el contenido de la imagen desde la URL');
                            }
                        
                            $result = file_put_contents($save_path, $image_content);
                            if ($result === false) {
                                throw new Exception('Error al guardar la imagen en el servidor');
                            }
                            $mysql->conectar();
                            $mysql->efectuarConsulta("INSERT 
                            INTO productos.productos VALUES('','$nombreProducto',$stockProduct,$precio,'$save_path','activo')");
                            $mysql->desconectar();
                            loadSuccess();
                        } catch (Exception $ex) {
                            ?>
                            <script>
                                document.body.innerHTML = "";
                            </script>
                        
                            <?php
                         
                            loadError("Formato o URL inválida, debe terminar en (.jpg,.png, etc)","Registro fallido","error");
                        }   
                    }
                } 
                else{
                    loadError("Nombre del producto ya existe, intenta con otro","Registro fallido","error");
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
                                open("../Empleados.php", "_self");
                            }
                        });
                        window.addEventListener("click", () => {
                            open("../Empleados.php", "_self");
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
                                open("./modulos/Empleados.php", "_self");
                            }
                        });
                        window.addEventListener("click", () => {
                            open("./modulos/Empleados.php", "_self");
                        });
            </script>
        </body>

        </html>
    <?php
    }