<?php
require_once "../verif/verificar.php";
verificar();
?>
<?php
// Recuperar valores de vida, mensaje, valor y dado desde la URL
$vidaP3 = isset($_GET['vidaP3']) ? intval($_GET['vidaP3']) : 1;
$vidaR = isset($_GET['vidaR']) ? intval($_GET['vidaR']) : 20;
$mensaje3 = isset($_GET['mensaje3']) ? $_GET['mensaje3'] : '';
$valor3 = isset($_GET['valor3']) ? intval($_GET['valor3']) : null;
$intentos3 = isset($_GET['intentos3']) ? intval($_GET['intentos3']) : 0;

// Determinar la imagen del pato según el valor de vida o el resultado del juego
$patoImagen = '../patoagresivo.png'; // Imagen por defecto

if ($mensaje3 === 'PERDISTE') {
    $patoImagen = '../patotriste.png';
} elseif ($mensaje3 === 'GANASTE') {
    $patoImagen = '../patomusculoso.png';
} else {
    if ($vidaP3 >= 5) {
        $patoImagen = '../patomusculoso.png';
    } elseif ($vidaP3 < 0) {
        $patoImagen = '../patotriste.png';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesJ3.css"> <!-- Enlace al archivo CSS -->
    <title>Juego de Patos</title>
</head>
<body>
    <!-- Formulario para el botón SALIR -->
    <form id="salirForm" method="POST" action="../controlador/jueguito3.php">
        <button id="salirButton" type="submit" name="action" value="salir">SALIR</button>
    </form>

    <div id="nivel">NIVEL 3</div> <!-- Texto de NIVEL 2 -->

    <div id="gameContainer">
        <canvas id="gameCanvas" width="800" height="600"></canvas>
    </div>

    <!-- Contenedor del pato -->
    <div id="contenedor">
        <div class="banner_img">
            <img src="<?php echo $patoImagen; ?>" alt="Pato">
            <p><?php echo htmlspecialchars($vidaP3); ?> de vida</p> <!-- Vida del pato -->
        </div>
    </div>

    <!-- Contenedor del Rey Rata -->
    <div id="reyRataContenedor">
        <img src="../reyrata.png" alt="Rey Rata">
        <p><?php echo htmlspecialchars($vidaR); ?> de vida</p> <!-- Vida del Rey Rata -->
    </div>

    <!-- Mostrar mensaje de GANASTE o PERDISTE si existe -->
    <?php if (!empty($mensaje3)) : ?>
        <div id="resultado" class="<?php echo ($mensaje3 == 'GANASTE') ? 'ganaste' : 'perdiste'; ?>">
            <p><?php echo htmlspecialchars($mensaje3); ?></p>
              <!-- Mostrar botón "Avanzar" si el jugador gana -->
              <?php if ($mensaje3 === 'GANASTE') : ?>
                <form id="avanzarForm" method="GET" action="../vista/FINAL.php">
                    <button id="avanzarButton" type="submit">AVANZAR</button>
                </form>
              <?php endif; ?>
              <?php if ($mensaje3 === 'PERDISTE') : ?>
                <form id="reintentarForm" method="GET" action="../vista/juego3.php">
                    <button id="reintentarButton" type="submit">REINTENTAR</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Contenedor separado para el dado -->
    <?php if ($valor3 !== null) : ?>
        <div id="contenedorDado">
            <!-- Mostrar imagen correspondiente al valor del dado -->
            <?php if ($valor3 === 4): ?>
                <img src="../dado4.png" alt="Dado 4">
            <?php elseif ($valor3 === 5): ?>
                <img src="../dado5.png" alt="Dado 5">
            <?php elseif ($valor3 === 6): ?>
                <img src="../dado6.png" alt="Dado 6">
            <?php elseif ($valor3 === -3): ?>
                <img src="../dado-3.png" alt="Dado -3">
            <?php elseif ($valor3 === -2): ?>
                <img src="../dado-2.png" alt="Dado -2">
            <?php elseif ($valor3 === -1): ?>
                <img src="../dado-1.png" alt="Dado -1">
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Botón para generar un número aleatorio (oculto cuando hay mensaje) -->
    <?php if (empty($mensaje3)) : ?>
        <form id="randomForm" method="POST" action="../controlador/jueguito3.php">
            <input type="hidden" name="vidaP3" value="<?php echo htmlspecialchars($vidaP3); ?>">
            <input type="hidden" name="intentos3" value="<?php echo htmlspecialchars($intentos3); ?>">
            <button id="tirarButton" type="submit" name="action" value="tirar3" class="rotate"></button>
        </form>
    <?php endif; ?>
</body>
</html>
