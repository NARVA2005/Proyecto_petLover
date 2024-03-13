<?php

require_once './Clases/MySQL.php';

$mysql = new MYSQL();
$mysql->conectar();
$consulta = $mysql->efectuarConsulta("SELECT * FROM petlover.mascota where estado='activo'");
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
<?php
// Verificar si hay un mensaje en la sesión y mostrarlo si existe
if (isset($_SESSION['mensaje']) && !empty($_SESSION['mensaje'])) {
  echo '<div class="error-message ' . $_SESSION['tipo'] . '">' . $_SESSION['mensaje'] . '</div>';
  // Limpiar el mensaje de la sesión para evitar que se muestre en futuras visitas a la página
    unset($_SESSION['mensaje']);
}
?>

   
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
            
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
     Servicios
              </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Modulos/agregarServicios.php">Historial de Servicios</a></li>
                <li><a class="dropdown-item" href="../Modulos/ServiciosDesactivados.php">Servicios inactivos</a></li>
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
          
            <h1 class="display-4 m-0"><span class="text-primary">PetLover</span>Mascotas</h1>
        </div>
       
          <!-- Button trigger modal -->
          <!-- //formulario para ingresar productos -->

<div class="row d-flex justify-content-center">

<div class="col-12">
<table class="table" id="datatable"> 

<thead class="text-center thead-dark">

<th>id</th>
<th>Nombre</th>
<th>Tipo</th>
<th>Raza</th>
<th>Nota</th>
<th>Id Cliente</th>
<th>Estado</th>
<th></th>
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
                                                    <?php echo $fila[6]; ?>
                                                </td>
                                                <td>
                                                   
                                                <button type="button" class="btn btn-primary edit-product" data-id="<?php echo $fila[0]; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">✎</button>
                             
                                                </td>
                                                <td>
                                                <a onclick="idMascotaEstado('<?php echo $fila[0] ?>')" class="btn btn-primary" href="#">🗑</a>
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
        { orderable: false, targets: [7, 8] },
            { searchable: false, targets: [7, 8] },
      ],
      pageLength: 5,
      destroy: true,
      language: {
        lengthMenu: "Mostrar _MENU_ mascotas por página",
        zeroRecords: "Ningún mascota encontrado",
        info: "Mostrando _START_ a _END_ mascotas de _TOTAL_ ",
        infoEmpty: "Ningún mascota encontrado",
        infoFiltered: "(filtrados desde _MAX_ mascotas totales)",
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
<div class="row d-flex justify-content-center">
<div class="col-2">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalregistro">
 Ingresar mascota
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar de mascota</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editProductForm" action="./Controladores/llenarCamposEditarMascotas.php" method="POST">
          <div class="mb-3">
            <label for="idMascota" class="form-label">Id de la mascota</label>
            <input type="number" class="form-control" id="idMascota" aria-describedby="emailHelp" name="idMascotas" readonly>
          </div>
          <div class="mb-3">
            <label for="tipo" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="nombre" >
          </div>
          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" aria-describedby="emailHelp" name="tipo" >
          </div>
          <div class="mb-3">
            <label for="razas" class="form-label">Raza</label>
            <input type="text" class="form-control" id="razas" aria-describedby="emailHelp" name="raza" >
          </div>
          <div class="mb-3">
            <label for="nota" class="form-label">Nota</label>
            <input type="text" class="form-control" id="nota" aria-describedby="emailHelp" name="nota" >
          </div>
          <div class="mb-3">
            <label for="idClientes" class="form-label">Id cliente</label>
            <input type="number" class="form-control" id="idCliente" aria-describedby="emailHelp" name="idCliente" readonly >
          </div>
    
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
      $(document).ready(function() {
    $('.edit-product').click(function() {
        var idcliente = $(this).data('id');
        var nombre = $(this).closest('tr').find('td:eq(1)').text().trim(); // Obtiene el precio del producto de la cuarta celda de la fila
        var idMascota = $(this).closest('tr').find('td:eq(0)').text().trim(); // Obtiene el nombre del producto de la segunda celda de la fila
        var raza = $(this).closest('tr').find('td:eq(3)').text().trim();
        var tipo = $(this).closest('tr').find('td:eq(2)').text().trim();  // Obtiene el stock del producto de la tercera celda de la fila
        var nota = $(this).closest('tr').find('td:eq(4)').text().trim(); // Obtiene el precio del producto de la cuarta celda de la fila
        
        $('#idCliente').val(idcliente);
        $('#type').val(tipo); 
        $('#idMascota').val(idMascota); 
        $('#nombre').val(nombre); 
        $('#razas').val(raza); 
        $('#nota').val(nota);  
    });
});


    </script>





<div class="col-2">

<!-- Modal -->
<div class="modal fade" id="exampleModalregistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar mascota</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="" action="./Controladores/registroaMascotaFuncionario.php" method="POST">
        
          <div class="mb-3">
            <label for="idProducto" class="form-label">Nombre de la mascota</label>
            <input type="Text" class="form-control" id="idCliente" aria-describedby="emailHelp" name="nombres">
          </div>
          <div class="mb-3">
            <label for="nombreProducto" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" name="tipo" >
          </div>
          <div class="mb-3">
            <label for="nombreProducto" class="form-label">Raza</label>
            <input type="text" class="form-control" id="apellido" aria-describedby="emailHelp" name="raza" >
          </div>
          <div class="mb-3">
            <label for="stockProducto" class="form-label">Nota</label>
            <input type="text" class="form-control" id="correo" aria-describedby="emailHelp" name="nota" >
          </div>
          <div class="mb-3">
            <label for="precioProducto" class="form-label">Id cliente</label>
            <input type="text" class="form-control" id="idcliente" aria-describedby="emailHelp" name="id_cliente" >
          </div>
    
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
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
const idMascotaEstado = (id) => {
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
        text: "Esta acción cambiará el estado del producto.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, cambiar estado",
        cancelButtonText: "Cancelar",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar la solicitud POST al servidor PHP para cambiar el estado del producto
            fetch('./Controladores/DesactivarMascota.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + id,
            })
            .then(response => response.json())
            .then(data => {
                // Manejar la respuesta del servidor
                if (data.success) {
                    swalWithBootstrapButtons.fire({
                        title: "Éxito",
                        text: "El estado del producto se ha cambiado correctamente.",
                        icon: "success"
                    }).then(() => {
                        // Recargar la página
                        location.reload();
                    });
                } else {
                    swalWithBootstrapButtons.fire({
                        title: "Error",
                        text: "Hubo un error al cambiar el estado del producto.",
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
    <!-- Blog End -->


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

  <!-- Template Javascript -->
  <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>