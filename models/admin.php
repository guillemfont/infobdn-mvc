<?php
class Administrador
{

    private $connexio;
    private $codi;
    private $email;
    private $password;


    //Constructor
    public function __construct($email = null, $codi = null, $password = null)
    {
        $this->connexio = mysqli_connect("localhost", "root", "", "infobdn");
        $this->codi = $codi;
        $this->email = $email;
        $this->password = $password;
    }

    // Methods
    function validar($user, $pass)
    {

        $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
        $consulta = "SELECT * FROM administradors WHERE email = '$user' and contrasenya = md5('$pass')";
        $resultat = mysqli_query($connexio, $consulta);
        $filas = mysqli_num_rows($resultat);

        if (!empty($resultat) and $filas > 0) {

            return True;
        } else {

            return False;
        }

        mysqli_free_result($resultat);
        mysqli_close($connexio);
    }

    function cursActiu($bandera, $codi)
{

    if ($bandera == 1) {
    ?>
        <a href="cursActiu-admin.php?actiu=1&codi=<?php echo $codi ?>"><i class="fa-solid fa-check"></i></a>
    <?php
    }
    if ($bandera == 0) {
    ?>
        <a href="cursActiu-admin.php?actiu=0&codi=<?php echo $codi ?>"><i class="fa-solid fa-x"></i></a>
<?php
    }
}

// Funció per afegir professors 
function dadesProf($dni, $nom, $cognom, $email, $contrasenya, $titol, $img)
{

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $consulta = "INSERT INTO professors (dni, nom, cognoms, email, contrasenya, titol_academic, fotografia) VALUES ('$dni','$nom','$cognom','$email', md5('$contrasenya'),'$titol', '$img')";
    if ($connexio->query($consulta) == true) {
        echo "PROFESSOR AFEGIT";
        header('Location: prof-admin.php');
    } else {
        die("Error al insertar les dades: " . $connexio->error);
    }
}

// Funció per insertar nou curs
function dadesCurs($dni, $nom, $cognom, $email, $contrasenya, $titol, $img)
{

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $consulta = "INSERT INTO cursos (nom, descripcio, num_hores, data_inici, data_final, nom_professor, fotografia) VALUES ('$dni','$nom','$cognom','$email', '$contrasenya','$titol', '$img')";
    if ($connexio->query($consulta) == true) {
        echo "PROFESSOR AFEGIT";
        header('Location: curs-admin.php');
    } else {
        die("Error al insertar les dades: " . $connexio->error);
    }
}

// Funció per eliminar professors 
function elimProf($dni)
{

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $consulta = "DELETE FROM professors where dni='$dni'";

    var_dump($consulta);

    if ($connexio->query($consulta) == true) {
        echo "PROFESSOR ELIMINAT";
        header('Location: prof-admin.php');
    } else {
        die("Error al eliminar les dades: " . $connexio->error);
    }
}

// Funció per eliminar curs
function elimCurs($codi)
{

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $consulta = "DELETE FROM cursos where codi='$codi'";

    if ($connexio->query($consulta) == true) {
        echo "CURS ELIMINAT";
        header('Location: prof-admin.php');
    } else {
        die("Error al eliminar les dades: " . $connexio->error);
    }
}

// Funció que canvia l'estat d'un professor
function profActiu($bandera, $dni)
{

    if ($bandera == 1) {
?>
        <a href="profActiu-admin.php?actiu=1&dni=<?php echo $dni ?>"><i class="fa-solid fa-check"></i></a>
    <?php
    }
    if ($bandera == 0) {
    ?>
        <a href="profActiu-admin.php?actiu=0&dni=<?php echo $dni ?>"><i class="fa-solid fa-x"></i></a>
    <?php
    }
}

}
