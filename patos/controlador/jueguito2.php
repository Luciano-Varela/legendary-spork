<?php
require_once "../modelo/personajes.php";
require_once "../verif/verificar.php";
verificar();

$intentos2 = isset($_POST['intentos2']) ? intval($_POST['intentos2']) : 0;
$vidaP2 = isset($_POST['vidaP2']) ? intval($_POST['vidaP2']) : 1;
$vidaR2 = isset($_POST['vidaR2']) ? intval($_POST['vidaR2']) : 15; // Usar el valor inicial de 15 si no se envía

$pato1 = new Pato($vidaP2); // Vida inicial del pato
$reyRata = new ReyRata($vidaR2); // Vida inicial del Rey Rata

$valoresPosibles2 = [-3, -1, -2, 4, 5, 6];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'salir') {
        // Redirigir al menú si se presiona el botón SALIR
        header("Location: ../vista/menu.php");
        exit();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'tirar2') {
        if ($intentos2 < 5) {
            $val2 = $valoresPosibles2[array_rand($valoresPosibles2)];
            
            // Actualizar la vida del pato
            $vidaP2 += $val2;

            // Verificar si la vida del pato es mayor o igual a 10
            if ($vidaP2 >= 15) {
                // Redirigir con mensaje de GANASTE
                header("Location: ../vista/juego2.php?mensaje2=GANASTE&valor2=" . $val2 . "&vidaR2=" . $vidaR2);
                exit();
            }

            $intentos2++;

            // Verificar si se han alcanzado los intentos máximos
            if ($intentos2 >= 5) {
                // Redirigir con mensaje de PERDISTE
                header("Location: ../vista/juego2.php?mensaje2=PERDISTE&valor2=" . $val2 . "&vidaR2=" . $vidaR2);
                exit();
            }

            // Redirigir con los valores de vida actualizados
            header("Location: ../vista/juego2.php?vidaP2=" . $vidaP2 . "&vidaR2=" . $vidaR2 . "&valor2=" . $val2 . "&intentos2=" . $intentos2);
            exit();
        }
    }
}

$pato1->mostrarImagen();
$pato1->mostrarvida();
$reyRata->mostrarImagen();
$reyRata->mostrarvida();
?>
