<?php
require_once "models/professor.php";
class ProfController
{

    public function showHome(){
        $prof = new Professor();
        $dni = $prof->dniUsuari($_SESSION['usuari']);
        $cursos = $prof->totsCursosProf($dni);
        require_once "views/professor/home.php";
    }

    public function closeSession()
    {
        session_destroy();
        header("Location: index.php");
    }








}