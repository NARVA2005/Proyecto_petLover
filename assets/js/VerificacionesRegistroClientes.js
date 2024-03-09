// Encapsulamos todo en una función de validación
function validarRegistro(e) {
  // Evitar que el formulario se envíe automáticamente
  e.preventDefault();

  console.log("Validando formulario...");

  let nombre = document.getElementById("nombres").value;
  let apellido = document.getElementById("apellidos").value;
  let correo = document.getElementById("correo").value;
  let contrase = document.getElementById("contra").value;
  let identi = document.getElementById("identi").value;

  if (nombre === "" || apellido === "" || correo === "" || contrase === "" || identi === "") {
    Swal.fire({
      title: "Hay campos vacíos papá",
      width: 600,
      padding: "3em",
      color: "#716add",
    });
  } else {
    // Si no hay campos vacíos, enviar el formulario
    document.getElementById("formularioRegistro").submit();
  }
}