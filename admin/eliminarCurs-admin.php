<?php
// Pàgina per eliminar curs

session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:index-admin.php');
} else {


    // Codi 
    include('funcions-admin.php');


    $codi = $_GET['codi'];

    if (elimCurs($codi)) {
        header('location:curs-admin.php');
        echo ("yes");
    } else {
        header('location:curs-admin.php');
        echo ("no");
    }
}
