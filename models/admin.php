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

}
