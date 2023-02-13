<?php
// Pàgina per modificar l'estat d'un curs

    

    session_start();
    if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
        header('location:index.php');
    }else{
        
              
        // Codi 
        $actiu = $_GET['actiu'];
        $codi = $_GET['codi'];

        if ($actiu == 0){
            $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
            $consulta = "UPDATE cursos SET actiu='1' WHERE codi like '$codi'";
            echo 0;

        }
        if ($actiu == 1){
            $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
            $consulta = "UPDATE cursos SET actiu='0' WHERE codi like '$codi'";
            echo 1;
        }

        if ($connexio->query($consulta) == true) {
            echo "PROFESSOR MODIFICAT";
            header('Location: curs-admin.php');
        } else {
            die("Error al insertar les dades: ". $connexio->error);
        }

    }
?>
