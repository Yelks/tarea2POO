<?

class Alumno {
    private $nombre;
    private $dni;
    private $calificaciones = [];

    public function __construct($nombre, $dni) {
        $this->nombre = $nombre;
        $this->dni = $dni;
    }

    public function agregarCalificacion($parcial, $nota) {
        $this->calificaciones[$parcial] = $nota;
    }

    public function calcularNotaMedia() {
        if (count($this->calificaciones) == 2) {
            $notaMedia = array_sum($this->calificaciones) / count($this->calificaciones);
            return $notaMedia;
        } else {
            return 0; // Si no se han registrado ambas calificaciones.
        }
    }
}

class Curso {
    private $alumnos = [];

    public function agregarAlumno($alumno) {
        $this->alumnos[] = $alumno;
    }

    public function calcularNotaMediaCurso() {
        $totalNotas = 0;
        $totalAlumnos = count($this->alumnos);

        foreach ($this->alumnos as $alumno) {
            $totalNotas += $alumno->calcularNotaMedia();
        }

        if ($totalAlumnos > 0) {
            $notaMediaCurso = $totalNotas / $totalAlumnos;
            return $notaMediaCurso;
        } else {
            return 0; // Si no hay alumnos en el curso.
        }
    }
}

// Ejemplo de uso:
$alumno1 = new Alumno("Juan Pérez", "12345678A");
$alumno2 = new Alumno("María González", "98765432B");

$alumno1->agregarCalificacion(1, 8.5); // Primer parcial
$alumno1->agregarCalificacion(2, 7.0); // Segundo parcial

$alumno2->agregarCalificacion(1, 9.0); // Primer parcial
$alumno2->agregarCalificacion(2, 8.5); // Segundo parcial

$curso = new Curso();
$curso->agregarAlumno($alumno1);
$curso->agregarAlumno($alumno2);

echo "Nota media de Juan Pérez: " . $alumno1->calcularNotaMedia() . "\n";
echo "Nota media de María González: " . $alumno2->calcularNotaMedia() . "\n";
echo "Nota media del curso: " . $curso->calcularNotaMediaCurso() . "\n";

?>