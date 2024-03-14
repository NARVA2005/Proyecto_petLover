
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
    <link rel="stylesheet" href="../assets/css/css.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />

</head>

<body>

 
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
                <a href="inicioClientes.php" class="nav-item nav-link">Productos</a>
                     
                         
                         
                   

                 

                     <a href="ServiciosClientes.php" class="nav-item nav-link">Servicios</a>
            <a class="nav-link " href="ComprasCliente.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
     Compras realizadas 
              </a>
          
                </div>
                <a href="../index.html" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Cerrar sesion</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <style>
       
        .container {
            max-width: 600px;
            margin: auto;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            margin-bottom: 0;
        }
        h2 {
            margin-top: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <!-- Blog Start -->
    <div class="container  pt-5 ">
        <div class="d-flex flex-column text-center mb-5 pt-5 ">
          
            <h1 class="display-4 m-0"><span class="text-primary">PetLover</span>Compras</h1>
        </div>
        <h2>Ingrese datos para ver compras - Veterinaria</h2>
        <form id="formularioCedula">
    <label for="cedula">Número de identificación:</label><br>
    <input type="text" id="cedula" name="cedula" required><br><br>
    <input type="button" value="Enviar" id="enviarConsulta">
</form>
          <!-- Button trigger modal -->
          <!-- //formulario para ingresar productos -->

<div class="row d-flex justify-content-center">

<div class="col-12">
<table class="table" id="datatable"> 

<thead class = "text-center thead-dark">

<th>id</th>
<th>Fecha</th>
<th>Mascota</th>


</thead >


<tbody id="miTabla">
                                       
</tbody>


</table>

</div>

<div class="col-12">
<table class="table" id="datatable2"> 

<thead class = "text-center thead-dark">

<th>id</th>
<th>Descripcion</th>
<th>Cantidad</th>
<th>Precio</th>
<th>Estado</th>

</thead >


<tbody id="miTabla">
                                       
</tbody>


</table>

</div>

</div>

<script>
    $(document).ready(function() {
        $('#enviarConsulta').click(function() {
            // Obtiene el valor del campo de entrada
            var cedula = $('#cedula').val();

            // Realiza la solicitud AJAX al servidor
            $.ajax({
                url: './Controladores/VerificarCliente.php', // Cambia esto por la ruta a tu script PHP
                method: 'POST',
                data: { cedula: cedula }, // Datos a enviar al servidor
                success: function(response) {
                    // Actualiza el contenido del contenedor de la tabla con la respuesta del servidor
                    $('#miTabla').html(response);
                }
            });
        });
    });
</script>
<script>
  $(document).ready(function() {
    $("#datatable2").DataTable({
      lengthMenu: [5, 10, 15, 50, 100, 250, 500],
      columnDefs: [
        { orderable: false, targets: [3, 4] },
            { searchable: false, targets: [3, 4] },
      ],
      pageLength: 5,
      destroy: true,
      language: {
        lengthMenu: "Mostrar _MENU_ Producto comprado por página",
        zeroRecords: "Ningún Producto compradoencontrado",
        info: "Mostrando _START_ a _END_ Productos comprados de _TOTAL_ ",
        infoEmpty: "Ningún producto comprado encontrado",
        infoFiltered: "(filtrados desde _MAX_ Productos comprados totales)",
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
    $("#datatable").DataTable({
      lengthMenu: [5, 10, 15, 50, 100, 250, 500],
      columnDefs: [
        { orderable: false, targets: [1, 2] },
            { searchable: false, targets: [1, 2] },
      ],
      pageLength: 5,
      destroy: true,
      language: {
        lengthMenu: "Mostrar _MENU_ Cita por página",
        zeroRecords: "Ningún Cita encontrado",
        info: "Mostrando _START_ a _END_ Citas de _TOTAL_ ",
        infoEmpty: "Ningúna cita encontrada encontrado",
        infoFiltered: "(filtrados desde _MAX_ Citas totales)",
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
 Ingresar producto
</button>




<div class="col-2">
<!-- Formulario para editar productos -->


<!-- Button trigger modal -->






<div class="col-2">





 





        </div>
    </div>
    <script>
const idProductoEstado = (id) => {
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
        confirmButtonText: "Sí, desactivar",
        cancelButtonText: "Cancelar",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar la solicitud POST al servidor PHP para cambiar el estado del producto
            fetch('./Controladores/DesactivarProducto.php', {
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


     

  <!-- Template Javascript -->
  <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="../assets/js/main.js"></script>
  
</body>

</html>

