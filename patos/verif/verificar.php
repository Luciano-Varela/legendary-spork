<?php
function verificar(){
    if (session_status()== PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION['usuario'])){
        header("Location: ../vista/login.php");
        exit();
    }
}
?>