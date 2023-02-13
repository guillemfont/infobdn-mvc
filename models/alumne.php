<?php
class Alumne
{

    private $connexio;
    private $userDNI;
    private $userName;
    private $userLastName;
    private $email;
    private $password;
    private $age;
    private $photo;


    //Constructor
    public function __construct($email = null, $name = null, $lastname = null, $age = null, $photo = null, $DNI = null, $password = null)
    {
        $this->connexio = mysqli_connect("localhost", "root", "", "infobdn");
        $this->email = $email;
        $this->userName = $name;
        $this->userLastName = $lastname;
        $this->age = $age;
        $this->photo = $photo;
        $this->userDNI = $DNI;
        $this->password = $password;
    }

    // Methods
    public function checkAlumne($user, $pass)
    {
        $consulta = "SELECT * FROM alumnes WHERE email = '$user' and contrasenya = md5('$pass')";
        $resultat = mysqli_query($this->connexio, $consulta);
        $filas = mysqli_num_rows($resultat);

        if (!empty($resultat) and $filas > 0) {

            return True;
        } else {

            return False;
        }

        mysqli_free_result($resultat);
        mysqli_close($this->connexio);
    }

    function dniUsuari($nom)
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $sql = "SELECT * from alumnes WHERE email = '$nom'";
    $resultat = mysqli_query($connexio, $sql);

    while ($mostrar = mysqli_fetch_array($resultat)) {
        $dni = $mostrar['dni'];
    }


    return $dni;
}

    function showCourses()
    {

        $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

        $dataAvui = date('Y-m-d');
        $dni = $this->dniUsuari($_SESSION['usuari']);
        $sql = "SELECT * FROM cursos WHERE actiu like 1 and data_final>'$dataAvui' and codi IN ( SELECT codi_curs FROM matricula WHERE dni_alumne like '$dni')";



        $consulta = mysqli_query($connexio, $sql);
        if (!$consulta) {
            echo mysqli_error($connexio);
            echo "Alguna cosa no funciona correctament";
        } else {
            $numlines = mysqli_num_rows($consulta);
            if ($numlines != 0) {

                for ($i = 0; $i < $numlines; $i++) {
                    $curs = mysqli_fetch_assoc($consulta);
                    $dniprof = $curs['nom_professor'];
                    $sql2 = "SELECT * FROM professors WHERE dni like '$dniprof'";
                    $consulta2 = mysqli_query($connexio, $sql2);
                    $prof = mysqli_fetch_assoc($consulta2);

                    return '
                <div class="cursos">
                    <div class="nom">' . $curs['nom'] . '</div>
                    <div class="imatge" id="imatge"><img src="data:image/jpg;base64</div>
                    <div class="enllaç"><a style="text-decoration: underline;" href="curs-alumne.php?codi=' . $curs['codi'] . '>Veure complet</a></div>
                    <div class="enllaç"><a onclick="return desmatricular()" style="text-decoration: underline;" href="desmatricular-alumne.php?email=' . $_SESSION['usuari'] . '&codi=' . $curs['codi'] . '">Desmatricular-me</a></div>
                </div>
                <a href="notes-alumne.php"><span class="notes">Les meves notes</span> </a>';
                }
            } else {
                echo '<br/>';
                echo 'No estàs matriculat a cap curs.';
            }
        }
    }


    function cursosDisponibles()
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $dni = $this->dniUsuari($_SESSION['usuari']);
    $dataAvui = date('Y-m-d');
    $sql = "SELECT * FROM cursos WHERE actiu = 1 AND data_inici>'$dataAvui' AND codi NOT IN (SELECT codi_curs FROM matricula WHERE dni_alumne = '$dni' )";

    $consulta = mysqli_query($connexio, $sql);

    if ($consulta) {

        $numLinies = mysqli_num_rows($consulta);
        if ($numLinies != 0) {


            for ($i = 0; $i < $numLinies; $i++) {
                $curs = mysqli_fetch_assoc($consulta);
            ?>
                <div style="margin: 10px 0; border: 1px solid #dcf4fa; border-radius: 8%;">
                    <ul>
                        <li style="font-weight:bold"><?php echo $curs['nom'] ?></li>
                        <li><img src="data:image/jpg;base64,<?php echo base64_encode($curs['fotografia']); ?>" /></li>
                        <li><a style="text-decoration: underline" href="matricula-alumne.php?curs=<?php echo $curs['codi'] ?>">Matricular-me</a></li>
                    </ul>
                </div>

<?php
            }
        } else {
            echo '<br/>';
            echo 'Actualment no hi han cursos disponibles.';
        }
    } else {
        echo mysqli_error($connexio);
        echo "Alguna cosa no funciona correctament";
    }
}

public function checkProf($user, $pass)
    {
        $consulta = "SELECT * FROM professors WHERE email = '$user' and contrasenya = md5('$pass')";
        $resultat = mysqli_query($this->connexio, $consulta);
        $filas = mysqli_num_rows($resultat);

        if (!empty($resultat) and $filas > 0) {

            return True;
        } else {

            return False;
        }

        mysqli_free_result($resultat);
        mysqli_close($this->connexio);
    }
}
