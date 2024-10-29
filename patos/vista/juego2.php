<?php
require_once "../verif/verificar.php";
verificar();
?>
<?php
// Recuperar valores de vida, mensaje, valor y dado desde la URL
$vidaP2 = isset($_GET['vidaP2']) ? intval($_GET['vidaP2']) : 1;
$vidaR2 = isset($_GET['vidaR2']) ? intval($_GET['vidaR2']) : 15; // Establecer vida inicial del Rey Rata en 15
$mensaje2 = isset($_GET['mensaje2']) ? $_GET['mensaje2'] : '';
$valor2 = isset($_GET['valor2']) ? intval($_GET['valor2']) : null;
$intentos2 = isset($_GET['intentos2']) ? intval($_GET['intentos2']) : 0;

// Determinar la imagen del pato según el valor de vida o el resultado del juego
$patoImagen = '../patoagresivo.png'; // Imagen por defecto

if ($mensaje2 === 'PERDISTE') {
    $patoImagen = '../patotriste.png';
} elseif ($mensaje2 === 'GANASTE') {
    $patoImagen = '../patomusculoso.png';
} else {
    if ($vidaP2 >= 5) {
        $patoImagen = '../patomusculoso.png';
    } elseif ($vidaP2 < 0) {
        $patoImagen = '../patotriste.png';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesJ2.css"> <!-- Enlace al archivo CSS -->
    <title>Juego de Patos</title>
</head>
<body>
    <!-- Formulario para el botón SALIR -->
    <form id="salirForm" method="POST" action="../controlador/jueguito2.php">
        <button id="salirButton" type="submit" name="action" value="salir">SALIR</button>
    </form>

    <div id="nivel">NIVEL 2</div> <!-- Texto de NIVEL 2 -->

    <div id="gameContainer">
        <canvas id="gameCanvas" width="800" height="600"></canvas>
    </div>

    <!-- Contenedor del pato -->
    <div id="contenedor">
        <div class="banner_img">
            <img src="<?php echo $patoImagen; ?>" alt="Pato">
            <p><?php echo htmlspecialchars($vidaP2); ?> de vida</p> <!-- Vida del pato -->
        </div>
    </div>

    <!-- Contenedor del Rey Rata -->
    <div id="reyRataContenedor">
        <img src="../reyrata.png" alt="Rey Rata">
        <p><?php echo htmlspecialchars($vidaR2); ?> de vida</p> <!-- Vida del Rey Rata -->
    </div>

    <!-- Mostrar mensaje de GANASTE o PERDISTE si existe -->
    <?php if (!empty($mensaje2)) : ?>
        <div id="resultado" class="<?php echo ($mensaje2 == 'GANASTE') ? 'ganaste' : 'perdiste'; ?>">
            <p><?php echo htmlspecialchars($mensaje2); ?></p>
              <!-- Mostrar botón "Avanzar" si el jugador gana -->
              <?php if ($mensaje2 === 'GANASTE') : ?>
                <form id="avanzarForm" method="GET" action="../vista/juego3.php">
                    <button id="avanzarButton" type="submit">AVANZAR</button>
                </form>
              <?php endif; ?>
              <?php if ($mensaje2 === 'PERDISTE') : ?>
                <form id="reintentarForm" method="GET" action="../vista/juego2.php">
                    <button id="reintentarButton" type="submit">REINTENTAR</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <!-- Contenedor separado para el dado -->
    <?php if ($valor2 !== null) : ?>
        <div id="contenedorDado">
            <!-- Mostrar imagen correspondiente al valor del dado -->
            <?php if ($valor2 === 4): ?>
                <img src="../dado4.png" alt="Dado 4">
            <?php elseif ($valor2 === 5): ?>
                <img src="../dado5.png" alt="Dado 5">
            <?php elseif ($valor2 === 6): ?>
                <img src="../dado6.png" alt="Dado 6">
            <?php elseif ($valor2 === -3): ?>
                <img src="../dado-3.png" alt="Dado -3">
            <?php elseif ($valor2 === -2): ?>
                <img src="../dado-2.png" alt="Dado -2">
            <?php elseif ($valor2 === -1): ?>
                <img src="../dado-1.png" alt="Dado -1">
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Botón para generar un número aleatorio (oculto cuando hay mensaje) -->
    <?php if (empty($mensaje2)) : ?>
        <form id="randomForm" method="POST" action="../controlador/jueguito2.php">
            <input type="hidden" name="vidaP2" value="<?php echo htmlspecialchars($vidaP2); ?>">
            <input type="hidden" name="vidaR2" value="<?php echo htmlspecialchars($vidaR2); ?>"> <!-- Añadir vidaR2 aquí -->
            <input type="hidden" name="intentos2" value="<?php echo htmlspecialchars($intentos2); ?>">
            <button id="tirarButton" type="submit" name="action" value="tirar2" class="rotate"></button>
        </form>
    <?php endif; ?>
</body>
</html>
