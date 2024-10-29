<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vista/styles.css">
    <title>Formulario de Registro</title>
</head>
<body>
    <div class="container">
        <!-- Formulario de Registro -->
        <form method="POST" action="../controlador/registrar.php" id="form-registrarse">
            <h2>Registrarse</h2>
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>

            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo" required>

            <button type="submit">Registrarse</button>
            <div id="registroStatus"></div>
        </form>

        <!-- Botón para redirigir a la página de Logueo -->
        <form action="../vista/login.php" method="get">
            <button type="submit">Loguearse</button>
        </form>
    </div>
</body>
</html>