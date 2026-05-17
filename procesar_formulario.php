<?php
// Credenciales por defecto de XAMPP
$servidor = "localhost";
$usuario = "root";
$contrasena = ""; 
$base_datos = "lospumas";

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $programa = $_POST['programa'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO inscripciones (nombre, correo, telefono, programa) 
            VALUES ('$nombre', '$correo', '$telefono', '$programa')";

    // Ejecutar consulta y crear el bucle de respuesta
    if ($conexion->query($sql) === TRUE) {
        echo "<script>
                alert('¡Inscripción enviada con éxito! Nos pondremos en contacto pronto.');
                window.location.href = 'index.html#contacto';
              </script>";
    } else {
        echo "<script>
                alert('Hubo un error al enviar tus datos. Inténtalo de nuevo.');
                window.location.href = 'index.html#contacto';
              </script>";
    }
}

// Cerrar la conexión
$conexion->close();
?>