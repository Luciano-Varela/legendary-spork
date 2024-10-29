<?php
require_once "../verif/verificar.php";
verificar();

// Recuperar valores de vida, mensaje, valor y dado desde la URL
$vidaP = isset($_GET['vidaP']) ? intval($_GET['vidaP']) : 1;
$vidaR = isset($_GET['vidaR']) ? intval($_GET['vidaR']) : 10;
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
$valor = isset($_GET['valor']) ? intval($_GET['valor']) : null;
$intentos = isset($_GET['intentos']) ? intval($_GET['intentos']) : 0;

// Determinar la imagen del pato según el valor de vida o el resultado del juego
$patoImagen = '../patoagresivo.png'; // Imagen por defecto
if ($mensaje === 'PERDISTE') {
    $patoImagen = '../patotriste.png';
} elseif ($mensaje === 'GANASTE') {
    $patoImagen = '../patomusculoso.png';
} else {
    if ($vidaP >= 5) {
        $patoImagen = '../patomusculoso.png';
    } elseif ($vidaP < 0) {
        $patoImagen = '../patotriste.png';
    }
}

// Determinar la imagen del Rey Rata
$reyRataImagen = ($vidaP >= 10) ? '../ratamuerta.png' : '../reyrata.png';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesJ.css"> <!-- Enlace al archivo CSS -->
    <title>Juego de Patos</title>
</head>
<body>
    <!-- Formulario para el botón SALIR -->
    <form id="salirForm" method="POST" action="../controlador/jueguito.php">
        <button id="salirButton" type="submit" name="action" value="salir">SALIR</button>
    </form>

    <div id="nivel">NIVEL 1</div> <!-- Texto de NIVEL 1 -->

    <div id="gameContainer">
        <canvas id="gameCanvas" width="800" height="600"></canvas>
    </div>

    <!-- Contenedor del pato -->
    <div id="contenedor">
        <div class="banner_img">
            <img src="<?php echo $patoImagen; ?>" alt="Pato">
            <p><?php echo htmlspecialchars($vidaP); ?> de vida</p> <!-- Vida del pato -->
        </div>
    </div>

    <!-- Contenedor del Rey Rata -->
    <div id="reyRataContenedor">
        <img src="<?php echo $reyRataImagen; ?>" alt="Rey Rata">
        <p><?php echo htmlspecialchars($vidaR); ?> de vida</p> <!-- Vida del Rey Rata -->
    </div>

    <!-- Mostrar mensaje de GANASTE o PERDISTE si existe -->
    <?php if (!empty($mensaje)) : ?>
        <div id="resultado" class="<?php echo ($mensaje == 'GANASTE') ? 'ganaste' : 'perdiste'; ?>">
            <p><?php echo htmlspecialchars($mensaje); ?></p>
            <!-- Mostrar botón "Avanzar" si el jugador gana -->
            <?php if ($mensaje === 'GANASTE') : ?>
                <form id="avanzarForm" method="GET" action="../vista/juego2.php">
                    <button id="avanzarButton" type="submit">AVANZAR</button>
                </form>
            <?php endif; ?>
            <!-- Mostrar botón "Reintentar" si el jugador pierde -->
            <?php if ($mensaje === 'PERDISTE') : ?>
                <form id="reintentarForm" method="GET" action="../vista/juego.php">
                    <button id="reintentarButton" type="submit">REINTENTAR</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Contenedor separado para el dado -->
    <?php if ($valor !== null) : ?>
        <div id="contenedorDado">
            <!-- Mostrar imagen correspondiente al valor del dado -->
            <?php if ($valor === 4): ?>
                <img src="../dado4.png" alt="Dado 4">
            <?php elseif ($valor === 5): ?>
                <img src="../dado5.png" alt="Dado 5">
            <?php elseif ($valor === 6): ?>
                <img src="../dado6.png" alt="Dado 6">
            <?php elseif ($valor === -3): ?>
                <img src="../dado-3.png" alt="Dado -3">
            <?php elseif ($valor === -2): ?>
                <img src="../dado-2.png" alt="Dado -2">
            <?php elseif ($valor === -1): ?>
                <img src="../dado-1.png" alt="Dado -1">
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Botón para generar un número aleatorio (oculto cuando hay mensaje) -->
    <?php if (empty($mensaje)) : ?>
        <form id="randomForm" method="POST" action="../controlador/jueguito.php">
            <input type="hidden" name="vidaP" value="<?php echo htmlspecialchars($vidaP); ?>">
            <input type="hidden" name="intentos" value="<?php echo htmlspecialchars($intentos); ?>">
            <button id="tirarButton" type="submit" name="action" value="tirar" class="rotate"></button>
        </form>
    <?php endif; ?>
</body>
</html>
