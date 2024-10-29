<?php
require_once "../modelo/personajes.php";
require_once "../verif/verificar.php";
verificar();

$intentos3 = isset($_POST['intentos3']) ? intval($_POST['intentos3']) : 0;
$vidaP3 = isset($_POST['vidaP3']) ? intval($_POST['vidaP3']) : 1;

$pato1 = new Pato($vidaP3); // Vida inicial del pato
$reyRata = new ReyRata(20); // Vida inicial del Rey Rata

$valoresPosibles3 = [-3, -1, -2, 4, 5, 6];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'salir') {
        // Redirigir al menú si se presiona el botón SALIR
        header("Location: ../vista/menu.php");
        exit();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'tirar3') {
        if ($intentos3 < 8) {
            $val3 = $valoresPosibles3[array_rand($valoresPosibles3)];
            // Actualizar la vida del pato
            $vidaP3 += $val3;

            // Verificar si la vida del pato es mayor o igual a 10
            if ($vidaP3 >= 20) {
                // Redirigir con mensaje de GANASTe
                header("Location: ../vista/juego3.php?mensaje3=GANASTE&valor3=" . $val3);
                exit();
            }

            $intentos3++;

            // Verificar si se han alcanzado los intentos máximos
            if ($intentos3 >= 8) {
                // Redirigir con mensaje de PERDISTE
                header("Location: ../vista/juego3.php?mensaje3=PERDISTE&valor3=" . $val3);
                exit();
            }

            // Redirigir con los valores de vida actualizados
            header("Location: ../vista/juego3.php?vidaP3=" . $vidaP3 . "&vidaR3=" . $reyRata->getVida() . "&valor3=" . $val3 . "&intentos3=" . $intentos3);
            exit();
        }
    }
}

$pato1->mostrarImagen();
$pato1->mostrarvida();
$reyRata->mostrarImagen();
$reyRata->mostrarvida();
?>
