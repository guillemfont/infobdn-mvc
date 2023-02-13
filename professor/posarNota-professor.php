<?php
session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:index-admin.php');
} else {

    if($_POST){

        include('funcions-professor.php');

        $curs = $_POST['curs'];
        $alumne = dniAlum($_POST['alumne']);
        $nota = $_POST['nota'];
        $codiCurs = codiCurs($curs);

        $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

        $sql = "UPDATE matricula SET nota='$nota' WHERE dni_alumne = '$alumne' AND codi_curs = '$codiCurs'";

        if ($connexio->query($sql)) {
            echo "NOTA POSADA";
            header('Location:notes-professor.php?codi='.$codiCurs);
        } else {
            die("Error al insertar les dades: ". $connexio->error);
        }


    }

}
?>