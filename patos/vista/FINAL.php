<?php
require_once "../verif/verificar.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vista/fin.css">
    <title>¡Has Ganado!</title>
</head>
<body>
    <div class="container">
        <!-- Botón de Salir -->
        <form id="salirForm" method="POST" action="../vista/agradecimientos.php">
            <button id="salirButton" type="submit">SALIR</button>
        </form>

        <!-- Texto de Ganaste -->
        <h1>¡HAS GANADO!</h1>

        <!-- Imagen del fondo con los patos -->
        <img src="../fondofin.png" alt="Fondo de Patos" class="fondo-img">
    </div>
</body>
</html>
