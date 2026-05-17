<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = ""; 
$base_datos = "lospumas";

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $programa = $_POST['programa'];

    $sql = "INSERT INTO inscripciones (nombre, correo, telefono, programa) 
            VALUES ('$nombre', '$correo', '$telefono', '$programa')";

    // Ejecutar consulta y crear el bucle de respuesta
    if ($conexion->query($sql) === TRUE) {
        echo "<script>
                alert('¡Hemos recibido tus datos! Nos pondremos en contacto pronto.');
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