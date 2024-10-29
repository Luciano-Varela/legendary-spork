<?php
require_once "../verif/verificar.php";
verificar();
// Comprueba si las variables de sesión están definidas
$usuario = isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']):'';
$correo = isset($_SESSION['correo']) ? htmlspecialchars($_SESSION['correo']):'';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vista/stylesM.css">
    <title>MENU</title>
</head>
<body>
    <div class="user-info">
        <p><strong>Usuario:</strong> <?php echo $usuario; ?></p>
        <p><strong>Correo:</strong> <?php echo $correo; ?></p>
    </div>
    <div class="container">
        <h1>EVOLUPATO</h1>

        <form action="../vista/juego.php" method="get">
            <button type="submit" value="Iniciar sesión">JUGAR</button>
        </form>
        <form action="../vista/creditos.php" method="get">
            <button type="submit" value="Iniciar sesión">CREDITOS</button>
        </form>
        <form action="../vista/instrucciones.php" method="get">
            <button type="submit" value="Iniciar sesión">INSTRUCCIONES</button>
        </form>
        
        <!-- Formulario para cerrar sesión -->
        <form action="" method="post">
            <button type="submit" name="action" value="salir">SALIR</button>
        </form>
        
        <?php
        // Cerrar sesión si se presionó el botón "SALIR"
        if (isset($_POST['action']) && $_POST['action'] === 'salir') {
            session_destroy(); // Destruir la sesión
            header("Location: ../vista/login.php"); // Redirigir al login
            exit(); // Asegurarse de que el script se detenga aquí
        }
        ?>
    </div>
</body>
</html>
