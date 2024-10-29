<?php
require_once "../modelo/personajes.php";
require_once "../verif/verificar.php";
verificar();

$intentos = isset($_POST['intentos']) ? intval($_POST['intentos']) : 0;
$vidaP = isset($_POST['vidaP']) ? intval($_POST['vidaP']) : 1;

$pato1 = new Pato($vidaP); // Vida inicial del pato
$reyRata = new ReyRata(10); // Vida inicial de 10

$valoresPosibles = [-3, -1, -2, 4, 5, 6];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'salir') {
        // Redirigir al menú si se presiona el botón SALIR
        header("Location: ../vista/menu.php");
        exit();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'tirar') {
        if ($intentos < 3) {
            $val = $valoresPosibles[array_rand($valoresPosibles)];
            
            // Actualizar la vida del pato
            $vidaP += $val;

            // Verificar si la vida del pato es mayor o igual a 10
            if ($vidaP >= 10) {
                // Cambiar de nivel y redirigir a juego.php con mensaje de GANAST
                header("Location: ../vista/juego.php?mensaje=GANASTE&valor=" . $val);
                exit();
            }

            $intentos++;

            // Verificar si se han alcanzado los intentos máximos
            if ($intentos >= 3) {
                // Redirigir con mensaje de PERDISTE
                header("Location: ../vista/juego.php?mensaje=PERDISTE&valor=" . $val);
                exit();
            }

            // Redirigir con los valores de vida actualizados
            header("Location: ../vista/juego.php?vidaP=" . $vidaP . "&vidaR=" . $reyRata->getVida() . "&valor=" . $val . "&intentos=" . $intentos);
            exit();
        }
    }
}

$pato1->mostrarImagen();
$pato1->mostrarvida();
$reyRata->mostrarImagen();
$reyRata->mostrarvida();
?>
