<?php 
require_once "../verif/verificar.php";
require_once "../controlador/jueguito.php";
verificar();

require_once "../modelo/queries.php";
// Clase base Personajes
class Personajes {
    protected $nivel;

    public function __construct($nivel) {
        $this->nivel = $nivel;
    }

    // Método abstracto para mostrar la vida, implementado en clases derivadas
    public function mostrarvida() {
        // Este método será implementado por las subclases
    }
}

// Clase Pato
class Pato extends Personajes {
    private $vidaP;
    private $vidaP2;    // Vida del pato
    private $vidaP3;   // Nueva variable de vida del pato
    private $imagenP;  // Imagen del pato

    public function __construct($nivel) {
        parent::__construct($nivel);
        $this->vidaP = 1;  // Vida inicial
        $this->vidaP2 = 1;  // Vida inicial
        $this->vidaP3 = 1; // Nueva vida inicial
        $this->imagenP = "../patoagresivo.png";  // Imagen inicial
    }

    // Mostrar imagen del pato
    public function mostrarImagen() {
        echo "<img src='$this->imagenP' alt='Pato'>\n";
    }

    // Mostrar vida del pato
    public function mostrarvida() {
        echo "Vida del Pato: $this->vidaP, Vida P2: $this->vidaP2, Vida P3: $this->vidaP3, Nivel: $this->nivel\n";
    }

    // Método para sumar o restar vida al pato
    public function sumaoresta($val, $val2, $val3) {
        $this->vidaP += $val; 
        $this->vidaP2 += $val;  // Permitir vida negativa
        $this->vidaP3 += $val3; // Permitir vida negativa en vidaP3

        // Ajustar imagen del pato según la nueva vida
        if ($this->vidaP < 0) {
            $this->imagenP = "../patotriste.png";
        } elseif ($this->vidaP >= 7) {
            $this->imagenP = "../patomusculoso.png";
        } else {
            $this->imagenP = "../patoagresivo.png";
        }
    }

    // Verificar si el pato ha ganado
    public function verificarEstado() {
        if ($this->vidaP >= 10 || $this->vidaP2 >= 15 || $this->vidaP3 >= 20) {
            return 'GANASTE'; 
        }
        return '';
    }

    // Obtener la vida actual del pato
    public function getVida() {
        return $this->vidaP;
    }
    public function getVida2() {
        return $this->vidaP2;
    }
    // Obtener la vida actual de vidaP3
    public function getVida3() {
        return $this->vidaP3;
    }
}

// Clase ReyRata
class ReyRata extends Personajes {
    private $vidaR;
    private $vidaR2;    // Vida del Rey Rata
    private $vidaR3;   // Nueva variable de vida del Rey Rata
    private $imagenR;  // Imagen del Rey Rata

    public function __construct($nivel) {
        parent::__construct($nivel);
        $this->vidaR = 10;  // Vida inicial
        $this->vidaR2 = 15;
        $this->vidaR3 = 20; // Nueva vida inicial
        $this->imagenR = "../reyrata.png";  // Imagen inicial
    }

    // Mostrar imagen del Rey Rata
    public function mostrarImagen() {
        echo "<img src='$this->imagenR' alt='Rey Rata'>\n";
    }

    // Mostrar vida del Rey Rata
    public function mostrarvida() {
        echo "Vida del Rey Rata: $this->vidaR, Vida R2: $this->vidaR2, Vida R3: $this->vidaR3, Nivel: $this->nivel\n";
    }

    // Método para restar vida al Rey Rata
    public function pierde($val, $val2, $val3) {
        $this->vidaR -= $val;   // Restar vida
        $this->vidaR2 -= $val2; // Restar vida en vidaR3
        $this->vidaR3 -= $val3; // Restar vida en vidaR3

        // Asegurar que la vida del Rey Rata no sea negativa
        if ($this->vidaR < 0) {
            $this->vidaR = 0;
        }
    }

    // Verificar si el Rey Rata ha sido derrotado
    public function verificarEstado() {
        if ($this->vidaR <= 0 || $this->vidaR3 <= 0) {
            return 'Rey Rata derrotado';
        }
        return '';
    }

    // Obtener la vida actual del Rey Rata
    public function getVida() {
        return $this->vidaR;
    }

    // Obtener la vida actual de vidaR3
    public function getVida3() {
        return $this->vidaR3;
    }
}
?>
