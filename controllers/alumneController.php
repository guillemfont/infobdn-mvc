<?php
require_once "models/alumne.php";
class AlumneController
{

    public function showMain()
    {
        require_once "views/general/menu.php";
    }

    public function showSingUp()
    {
        require_once "views/alumne/singup.php";
    }

    public function singIn()
    {
        $rang = $_POST['rang'];
        $email = $_POST['email'];
        $pass = $_POST['contrasenya'];

        $alumne = new Alumne();

        if ($rang == "alumne" && $alumne->checkAlumne($email, $pass)) {
            $_SESSION['usuari'] = $email;
            $this->showHome();
        } else if ($rang == "professor" && $alumne->checkProf($email, $pass)) {
            $_SESSION['usuari'] = $email;
            header("location: index.php?controller=prof&action=showHome");
        }
    }


    public function showHome()
    {
        $alumne = new Alumne();
        $courses = $alumne->showCourses();
        $disponibles = $alumne->cursosDisponibles();
        require_once "views/alumne/home.php";
    }

    public function closeSession()
    {
        session_destroy();
        header("location: index.php");
    }

    public function showNotas() {
        require_once "views/alumne/notas.php";
    }
}
