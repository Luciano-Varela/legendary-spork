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

// Consulta SQL para verificar si el usuario existe
$query = "SELECT * FROM users WHERE usuario = '$usuario' AND contraseña = '$contraseña' AND correo = '$correo'";
$resultado = $conexion->query($query);

// Verificar si se encontró el usuario
if ($resultado->num_rows > 0) {
    // Iniciar sesión y redirigir
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['contraseña'] = $contraseña;
    $_SESSION['correo'] = $correo;
    
    echo '
    <script>
        alert("Inicio de sesión exitoso");
        window.location = "../vista/menu.php"; // Redirige a la página principal
    </script>
    ';
} else {
    // Si el usuario no existe o la contraseña es incorrecta
    echo '
    <script>
        alert("Usuario o contraseña incorrectos");
        window.location = "../vista/login.php"; // Redirige de nuevo al formulario de inicio de sesión
    </script>
    ';
}

// Cerrar conexión
mysqli_close($conexion);
?>
