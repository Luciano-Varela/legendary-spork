<?php
require_once "../modelo/queries.php";
// Obtener datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$correo = $_POST['correo'];

// Asegurarse de que los datos estén correctamente escapados
$usuario = $conexion->real_escape_string($usuario);
$contraseña = $conexion->real_escape_string($contraseña);
$correo = $conexion->real_escape_string($correo);


// Consulta SQL para insertar datos
$query = "INSERT INTO users (usuario, contraseña, correo) VALUES ('$usuario', '$contraseña', '$correo')";

// Ejecutar consulta
$ejecutar = mysqli_query($conexion, $query);

// Verificar si la consulta se ejecutó correctamente
if ($ejecutar) {
    echo '
    <script>
        alert("se ha almacenado correctamente");
        window.location = "../vista/login.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("hubo un error al registrar, intente nuevamente");
        window.location = "../vista/registros.php";
    </script>
    ';
}

// Cerrar conexión
mysqli_close($conexion);
?>