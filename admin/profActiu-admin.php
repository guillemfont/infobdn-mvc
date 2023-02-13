<?php
// Activar/desactivar professors



session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:index-admin.php');
} else {


    // Codi 
    $actiu = $_GET['actiu'];
    $dni = $_GET['dni'];

    if ($actiu == 0) {
        $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
        $consulta = "UPDATE professors SET actiu='1' WHERE dni like '$dni'";
        echo 0;
    }
    if ($actiu == 1) {
        $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
        $consulta = "UPDATE professors SET actiu='0' WHERE dni like '$dni'";
        echo 1;
    }

    if ($connexio->query($consulta) == true) {
        echo "PROFESSOR MODIFICAT";
        header('Location: prof-admin.php');
    } else {
        die("Error al insertar les dades: " . $connexio->error);
    }
}
