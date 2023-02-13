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
    public function checkAlumne($user, $pass){
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
}