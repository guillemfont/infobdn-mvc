<?php
require_once "models/alumne.php";
class AlumneController
{

    public function showMain(){
        require_once "views/general/menu.php";
    }

    public function showSingUp(){
        require_once "views/alumne/singup.php";
    }

    public function singIn(){
    $rang = $_POST['rang'];
    $email = $_POST['email'];
    $pass = $_POST['contrasenya'];

    $alumne = new Alumne();
    
    if ($rang == "alumne" && $alumne->checkAlumne($email, $pass)){
        $_SESSION['usuari']=$email;
        $this->showHome();

    } else if ($rang == "professor"){

    }
    
    }


    public function showHome(){
        require_once "views/alumne/home.php";
    }









}