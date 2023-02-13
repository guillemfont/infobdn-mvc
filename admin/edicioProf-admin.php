<?php
// Pàgina 'edició prof' de l'administrador


    session_start();
    if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
        header('location:index-admin.php');
    }else{

            $dni = $_POST['dni'];
            $nom = $_POST['nom'];
            $cognom = $_POST['cognom'];
            $email = $_POST['email'];
            $titol = $_POST['titol'];

            $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

            $consulta = "UPDATE professors SET nom='$nom', cognoms='$cognom', email='$email', titol_academic='$titol' WHERE dni like '$dni'";

            if ($connexio->query($consulta) == true) {
                echo "PROFESSOR MODIFICAT";
                header('Location: prof-admin.php');
            } else {
                die("Error al insertar les dades: ". $connexio->error);
            }



        }

        
    
?>