<?php
// Matricular alumne a curs

session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:../index.php');
} else {
    include("funcions-alumne.php");
    // Codi 
    
    $curs = $_GET['curs'];
    $dni = dniUsuari($_SESSION['usuari']);

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $resultat = mysqli_query($connexio, "INSERT INTO matricula (dni_alumne, codi_curs) VALUES ('$dni', '$curs')");
    
    if($resultat){
        echo 'Alumne matriculat';
        header('Location: home-alumne.php');
    } else {
        echo 'No ha funcionat';
        echo var_dump($resultat);
        header('Location: home-alumne.php');
    }

}
