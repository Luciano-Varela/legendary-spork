<?php
require_once "../verif/verificar.php";
verificar();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vista/stylesIns.css">
    <title>Creditos</title>
</head>
<body>
<form id="salirForm" method="POST" action="../controlador/jueguito.php">
        <button id="salirButton" type="submit" name="action" value="salir">SALIR</button>
    </form>
<div class="cointainer">
    <h1>INSTRUCCIONES</h1>
    <p>Este juego es simple</p>
    <p>Para jugar necesitas tirar los dados presionando el dado, a continuacion saldra un numero al azar que puede ser tanto positivo como negativo</p>
    <p>Si te sale un numero positivo, la vida de tu pato subira y evolucionara a medida que sea mas grande, pero si el numero sale negativo, la vida del pato disminuye y tu pato involucionara</p>
    <p>Ganaras cuando la vida de tu pato llegue a la vida del rey rata, pero hay una dificultad, solo podras tirar 3 veces los dados en el nivel 1, 5 en el nivel 2, y 8 en el nivel 3. Si la vida del pato no alcanza a la de la vida del rey rata pierdes y deberas volver a intentarlo</p>
    <p>Si ganas subiras de nivel pero si pierdes deberas volver a hacer el nivel 1 nuevamente</p>
    <p>Aclaracion: los dados de color blanco indican que es un numero positivo, mientras que los dados de color rojo seran negativos</p>
    <p>Que disfrutes nuestro juego</p>
</div>
</body>
</html>