<?php
require_once "models/admin.php";
class AdminController
{
    public function loginAdmin(){
        require_once "views/admin/login.php";
    }

    public function checkAdmin(){
        $usuari = $_POST['usuari'];
        $contrasenya = $_POST['contrasenya'];
        $admin = new Administrador();
        if ($admin->validar($usuari, $contrasenya)){
            $this->showMain();
        } else {
            header('Location: index.php');
        }
    }

    public function showMain(){
        require_once "views/admin/home.php";
    }

    public function closeSession()
    {
        session_destroy();
        header("location: index.php");
    }
}