<?php
// Pàgina 'edició curs' de l'administrador


    session_start();
    if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
        header('location:index-admin.php');
    }else{

            $codi = $_POST['codi'];
            $nom = $_POST['nom'];
            $descripcio = $_POST['descripcio'];
            $num_hores = $_POST['num_hores'];
            $data_inici = $_POST['data_inici'];
            $data_final = $_POST['data_final'];
            $nom_professor = $_POST['nom_professor'];

            $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

            $consulta = "UPDATE cursos SET nom='$nom', num_hores = '$num_hores', descripcio ='$descripcio', data_inici ='$data_inici', data_final='$data_final' WHERE codi like '$codi'";

            var_dump($connexio->query($consulta));

            if ($connexio->query($consulta) == true) {
                echo "CURS MODIFICAT";
                header('Location: curs-admin.php');
            } else {
                die("Error al insertar les dades: ". $connexio->error);
            }



        }

        
    
?>