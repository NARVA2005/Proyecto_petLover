<?php
// Iniciar la sesión para poder acceder a las variables de sesión
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">



  <title>Formulario inicio de sesion</title>
  <style>
    body {
      background-color: #F4EBE8;
      font-family: 'Rounded Mplus 1c', sans-serif;
      background-image: radial-gradient(circle at 100% 150%, #F4EBE8 24%, #EAC4D5 25%, #EAC4D5 28%, #F4EBE8 29%, #F4EBE8 36%, #EAC4D5 36%, #EAC4D5 40%, transparent 40%, transparent),
                        radial-gradient(circle at 0    150%, #F4EBE8 24%, #EAC4D5 25%, #EAC4D5 28%, #F4EBE8 29%, #F4EBE8 36%, #EAC4D5 36%, #EAC4D5 40%, transparent 40%, transparent),
                        radial-gradient(circle at 50%  100%, #EAC4D5 10%, transparent 10%),
                        radial-gradient(circle at 100% 50%, transparent 20%, #F4EBE8 20%, #F4EBE8 26%, transparent 26%), transparent;
      background-size: 30px 30px;
    }

    .form-register {
      background-color: #FFF;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 0 auto;
      text-align: center;
    }

    .form-register h4 {
      color: #7D6E83;
      font-size: 28px;
      margin-bottom: 30px;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .controls {
      margin-bottom: 20px;
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: 2px solid #EAC4D5;
      box-sizing: border-box;
      font-size: 16px;
      color: #7D6E83;
    }

    .botons {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: none;
      background-color: #7D6E83;
      color: #FFF;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .botons:hover {
      background-color: #A7A1AC;
    }

    .terms {
      font-size: 16px;
      color: #7D6E83;
      margin-top: 20px;
    }

    a {
      color: #7D6E83;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #A7A1AC;
      text-decoration: underline;
    }

    .paw-print {
      font-size: 30px;
      color: #EAC4D5;
      margin-bottom: 10px;
    }
  
    /* Estilos para el contenedor del mensaje de error */
    .error-message {
      background-color: #ffcccc;
      border: 1px solid #ff0000;
      color: #ff0000;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
    }
 
  </style>
</head>
<body>
<?php
// Verificar si hay un mensaje en la sesión y mostrarlo si existe
if (isset($_SESSION['mensaje']) && !empty($_SESSION['mensaje'])) {
  echo '<div class="error-message ' . $_SESSION['tipo'] . '">' . $_SESSION['mensaje'] . '</div>';
  // Limpiar el mensaje de la sesión para evitar que se muestre en futuras visitas a la página
    unset($_SESSION['mensaje']);
}
?>
<!-------------------------------------------> 



<form id="formularioIncio" action="./Controladores/login.php" method="POST">

  
  <section class="form-register">
    <span class="paw-print">&#128062;</span>
    <h4>Iniciar sesion</h4>


    <select class="form-select controls" aria-label="Default select example" name="rol" id="rol">
  <option selected>Seleccione su rol</option>
  <option value="1">Cliente</option>
  <option value="2">Empleado</option>
</select>

    <input class="controls" type="email" name="correo" id="correo" placeholder="Correo del dueño">
    <input class="controls" type="password" name="contra" id="contra" placeholder="Contraseña">
    <input class="botons" type="submit" id="btnIniciar" value="Iniciar">
    <p class="terms">Al registrarte, aceptas nuestros <a href="#">Términos y Condiciones</a></p>
  </section>
</form>
  <!-- haremos el formulario de verificacion para que llene los campos con JS-->

  <script>
let rol = document.getElementById("rol")

rol.addEventListener("change",()=>{

if(rol.value == "1"){

  document.getElementById("correo").placeholder = "Correo del dueño" 

}else{

document.getElementById("correo").placeholder = "Correo del empleado" 


  
}


})

  




</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const btnI = document.getElementById("btnIniciar");
  btnI.addEventListener("click", function(e) {
    let correo = document.getElementById("correo").value;
    let contra = document.getElementById("contra").value;

    if (correo === "" || contra === "") {
      Swal.fire({
        title: "Hay campos vacíos papá",
        width: 600,
        padding: "3em",
        color: "#716add",
      });
    }
  });
});
</script>




  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>
</html>
