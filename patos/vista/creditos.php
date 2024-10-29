<?php
require_once "../verif/verificar.php";
verificar();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vista/stylesC.css">
    <title>Creditos</title>
</head>
<body>
<form id="salirForm" method="POST" action="../controlador/jueguito.php">
        <button id="salirButton" type="submit" name="action" value="salir">SALIR</button>
    </form>
<div class="cointainer">
    <h1>Créditos del Proyecto</h1>
    <p>Este proyecto fue desarrollado por Benjamin Perez Rossi, Lautaro Sorribas, Luciano Varela, Felipe Flores y Marcos Contreras.</p>
    <p>Descripción del proyecto:</p>
    <p>Aqui puedes dejar tu opinion o alguna pregunta sobre el juego: lauuusorribas@gmail.com </p>
</div>
</body>
</html>