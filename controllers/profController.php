<?php
require_once "models/professor.php";
class AlumneController
{

    public function singIn(){
    $rang = $_POST['rang'];
    $email = $_POST['email'];
    $pass = $_POST['contrasenya'];

    $alumne = new Alumne();
    
    if ($rang == "alumne" && $alumne->checkAlumne($email, $pass)){
        $_SESSION['usuari']=$email;

    } else if ($rang == "professor"){

    }
    
    }









}