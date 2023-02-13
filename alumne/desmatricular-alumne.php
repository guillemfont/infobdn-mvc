<?php
// Desmatricular alumne del curs


session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:../index.php');
} else {
    include("funcions-alumne.php");
    // Codi 
    
    $codi = $_GET['codi'];
    $email = $_GET['email'];

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $resultat = mysqli_query($connexio, "SELECT dni FROM alumnes WHERE email='$email'");
    $dni = mysqli_fetch_array($resultat)[0];
    
    $sql = "DELETE FROM matricula WHERE codi_curs = '$codi' AND dni_alumne = '$dni'";

    if(mysqli_query($connexio, $sql)){
        header('Location: home-alumne.php');
    } else {
        include('home-alumne.php');
        echo "No s'ha pogut eliminar.";
    }

}
?>