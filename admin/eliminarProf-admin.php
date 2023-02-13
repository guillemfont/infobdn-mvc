<?php
// Pàgina per eliminar professor   

    session_start();
    if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
        header('location:index-admin.php');
    }else{
        
              
        // Codi 
        include('funcions-admin.php');


        $dni = $_GET['dni'];

        if(elimProf($dni)){
            header('location:prof-admin.php');
            echo ("yes");
        } else {
            header('location:prof-admin.php');
            echo ("no");
        }

    }
