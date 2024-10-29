
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vista/styles2.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container">
        <!-- Formulario de inicio de sesión -->
        <form method="POST" action="../controlador/lg.php">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required> <!-- Cambiado a tipo 'email' para validación HTML -->

            <button type="submit">Iniciar Sesión</button>
        </form>

        <!-- Botón para ir al formulario de registro -->
        <form action="../vista/registros.php" method="get">
            <button type="submit">Registrarse</button>
        </form>

        <!-- Elemento para mostrar el estado de login, si es necesario -->
        <div id="loginStatus"></div>
    </div>
</body>
</html>
