

<?php
//controla el inicio de sesion
//se verifica que existan datos en el formulario

if (isset($_POST['correo']) && !empty($_POST['correo']) && isset($_POST['contra']) && !empty($_POST['contra'])) {
    //se hace el llamado del modelo de conexion y consultas
    // Obtiene y muestra el directorio de trabajo actual
echo "Directorio actual: " . getcwd() . "<br>";
    require_once '../Clases/MySQL.php';
    //se capturan las variables que vienen desde el formulario
    $user = $_POST['correo'];
    $pass = $_POST['contra'];
    $rol = $_POST['rol'];

    //se instancia la clase, es decir, se llama para poder usar sus metodos

    $mysql = new MYSQL();
    $mysql->conectar();


    if($rol == 2){
        $empleado = $mysql->efectuarConsulta("select correo, password from petlover.usuario where usuario.correo ='$user' and usuario.password ='$pass'");
        $mysql->desconectar();
   
        $fila = mysqli_fetch_array($empleado);
        $_SESSION['cliente']=$fila['email'];
        $_SESSION['contra']=$fila['password'];
        //se verifica si devolvio algo la consulta si o lo hizo es porque no existe 
        if (mysqli_num_rows($empleado) > 0) {
            // Si existe, se redirige al usuario a la página de comprar productos
            //Verificamos que rol tiene el usuario
     
    
                $_SESSION['cliente'] = $user; // Guardar el correo del usuario en la sesión
                header("location: ../Empleados.php");
    
            
            
          
        } else {
             //de lo contrario no avanza del login
             $_SESSION['mensaje']="Datos no registrados en la base de datos";
             $_SESSION['tipo']="warning";
             header("location: ../iniciarSesion.php");
             exit(); // Terminar la ejecución del script
        }
    }else{

        $usuario = $mysql->efectuarConsulta("select correo, password from petlover.cliente where cliente.correo ='$user' and cliente.password ='$pass'");
   
        $mysql->desconectar();
    
        $fila = mysqli_fetch_array($usuario);
     
        $_SESSION['cliente']=$fila['email'];
        $_SESSION['contra']=$fila['password'];
        //se verifica si devolvio algo la consulta si o lo hizo es porque no existe 
        if (mysqli_num_rows($usuario) > 0) {
            // Si existe, se redirige al usuario a la página de comprar productos
            //Verificamos que rol tiene el usuario
     
           
                $_SESSION['cliente'] = $user; // Guardar el correo del usuario en la sesión
                header("location: ../entradaRegistradosProductos.php");
    
            
            
          
        } else {
             //de lo contrario no avanza del login
             $_SESSION['mensaje']="Datos no registrados en la base de datos";
             $_SESSION['tipo']="warning";
             header("location: ../iniciarSesion.php");
             exit(); // Terminar la ejecución del script
        }
        
    }
   
}
else{
    header("location: ../iniciarSesion.php");
}

