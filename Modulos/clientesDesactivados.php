
<?php


require_once './Clases/MySQL.php';
$mysql = new MYSQL();
$mysql->conectar();
$consulta = $mysql->efectuarConsulta("SELECT * FROM petlover.cliente where estado='inactivo'");
$mysql->desconectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetLover - Pet Care Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
 <!-- Agrega jQuery y Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    
    <link href="../assets/lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />

</head>

<body>
<?php
// Verificar si hay un mensaje en la sesión y mostrarlo si existe
if (isset($_SESSION['mensaje']) && !empty($_SESSION['mensaje'])) {
    echo '<div class="mensaje ' . $_SESSION['tipo'] . '">' . $_SESSION['mensaje'] . '</div>';
    // Limpiar el mensaje de la sesión para evitar que se muestre en futuras visitas a la página
    unset($_SESSION['mensaje']);
}
?>

    <style>
    .mensaje {
    position: fixed; /* Fija el mensaje en la pantalla */
    top: 50px; /* Distancia desde la parte superior */
    left: 50%; /* Coloca el mensaje en el centro horizontal */
    transform: translateX(-50%); /* Centra horizontalmente */
    z-index: 1000; /* Asegura que el mensaje esté por encima de otros elementos */
    padding: 10px;
    background-color: #f8d7da; /* Color de fondo rojo claro */
    border: 1px solid #f5c6cb; /* Borde rojo */
    color: #721c24; /* Texto rojo oscuro */
    border-radius: 5px; /* Bordes redondeados */
    width: 300px; /* Ancho del mensaje */
    text-align: center; /* Texto centrado */
    font-size: 16px; /* Tamaño de fuente */
}
    </style>
    <script>
    // Función para ocultar el mensaje después de un tiempo determinado
    setTimeout(function() {
        $('.mensaje').fadeOut('slow'); // Oculta el mensaje con una animación de desvanecimiento
    }, 5000); // Cambia este valor (en milisegundos) para ajustar la duración del mensaje antes de que se desvanezca
</script>
<!-------------------------------------------> 

        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Abierto Desde</h6>
                        <p class="m-0">8.00AM - 9.00PM</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Email</h6>
                        <p class="m-0">PetLover@gmail.com</p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Telefono</h6>
                            <p class="m-0">57 300 726 9738</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


      <!-- Navbar Start -->
      <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Safety</span>First</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
           Productos
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Modulos/Empleados.php">Historial de productos</a></li>
                <li><a class="dropdown-item" href="productosDesactivados.php">Prodcutos inactivos</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
       Clientes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Modulos/Clientes.php">Historial de Clientes</a></li>
                <li><a class="dropdown-item" href="clientesDesactivados.php">Clientes inactivos</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
     Mascotas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Modulos/mascotas.php">Historial de mascotas</a></li>
                <li><a class="dropdown-item" href="mascotasDesactivadas.php">mascotas inactivos</a></li>
              </ul>
            </li>
            
                 
                </div>
                <a href="../index.html" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Cerrar sesion</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Blog Start -->
    <div class="container  pt-5 ">
        <div class="d-flex flex-column text-center mb-5 pt-5 ">
          
            <h1 class="display-4 m-0"><span class="text-primary">PetLover</span>Clientes</h1>
        </div>
       
          <!-- Button trigger modal -->
          <!-- //formulario para ingresar productos -->

<div class="row d-flex justify-content-center">

<div class="col-12">
<table class="table" id="datatable"> 

<thead class="text-center thead-dark">

<th>id</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Correo</th>
<th>Contraseña</th>

<th>Estado</th>


<th></th>


</thead>


<tbody id="miTabla">
                                        <?php
                                        while ($fila = mysqli_fetch_array($consulta)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $fila[0]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $fila[1]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $fila[2]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $fila[3]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $fila[4]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $fila[5]; ?>
                                                </td>
                                               
                                                <td>
                                                <a onclick="idClienteEstado('<?php echo $fila[0] ?>')" class="btn btn-primary" href="#">🗑</a>
                                            </tr>

                                        <?php
                                        }
                                        ?>


</tbody>


</table>

</div>



</div>





<script>
  $(document).ready(function() {
    $("#datatable").DataTable({
      lengthMenu: [5, 10, 15, 50, 100, 250, 500],
      columnDefs: [
        { orderable: false, targets: [5, 6] },
            { searchable: false, targets:[5, 6] },
      ],
      pageLength: 5,
      destroy: true,
      language: {
        lengthMenu: "Mostrar _MENU_ cliente por página",
        zeroRecords: "Ningún cliente encontrado",
        info: "Mostrando _START_ a _END_ clientes de _TOTAL_ ",
        infoEmpty: "Ningún mascota encontrado",
        infoFiltered: "(filtrados desde _MAX_ clientes totales)",
        search: "Buscar:",
        loadingRecords: "Cargando...",
        paginate: {
          first: "<<",
          last: ">>",
          next: ">",
          previous: "<",
        },
      },
    });
  });
</script>


<script>
        $(document).ready(function() {
    $('.elim-producto').click(function() {
        var idProducto = $(this).data('id');
    
        
        $('#idProductoEliminar').val(idProducto);
 
    });
});
    </script>
</div>




</div>







        </div>
    </div>
    <script>
        function idClienteEstado(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    // Mostrar el cuadro de diálogo de confirmación
    swalWithBootstrapButtons.fire({
        title: "¿Estás seguro?",
        text: "Esta acción cambiará el estado del cliente.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, activar",
        cancelButtonText: "Cancelar",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar la solicitud POST al servidor PHP para cambiar el estado del producto
            fetch('./Controladores/DesactivarCliente.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'identificacion=' + id,
            })
            .then(response => response.json())
            .then(data => {
                // Manejar la respuesta del servidor
                if (data.success) {
                    swalWithBootstrapButtons.fire({
                        title: "Éxito",
                        text: "El estado del cliente se ha cambiado correctamente.",
                        icon: "success"
                    }).then(() => {
                        // Recargar la página
                        location.reload();
                    });
                } else {
                    swalWithBootstrapButtons.fire({
                        title: "Error",
                        text: "Hubo un error al cambiar el estado del cliente.",
                        icon: "error"
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                swalWithBootstrapButtons.fire({
                    title: "Error",
                    text: "Hubo un error al comunicarse con el servidor.",
                    icon: "error"
                });
            });
        }
    });
}
    </script>
  


      <!-- Footer Start -->
      <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">Pet</span>Lover</h1>
              
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Punto de contacto/h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>carrera 7 13-41, Colombia, Cartago Valle</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>3007269738</p>
                        <p><i class="fa fa-envelope mr-2"></i>petlover@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                   
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Boletin informativo</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0" placeholder="Nombre" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0" placeholder="Gmail" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-lg btn-primary btn-block border-0" type="submit">Aplique ahora</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="#">Nombre del sitio</a>.Reservado todos los derechos. Diseñado por Alejo y Narva(programadores)
                    <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
   <!-- Template Javascript -->
   <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>