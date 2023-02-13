<?php

if($_POST){

    $rang = $_POST['rang'];
    $email = $_POST['email'];
    $pass = $_POST['contrasenya'];
    
    if ($rang == 'alumne'){
        include('alumne/funcions-alumne.php');

        try {


            if (validarAlumne($email, $pass)){
                
                session_start();
                $_SESSION['usuari']=$email;
                
                header("location: alumne/home-alumne.php");
            }
            else {
    
                include("index.php");
                ?>
            <script>
                let incorrecte = document.getElementById('errorIn');
                incorrecte.style.display = 'inline-block';
        
            </script>
            <?php
            }
        } catch(Exception $err){
            echo $err;
        }

    }
    if ($rang == 'professor'){
        include('professor/funcions-professor.php');

        try {

            if (validarProfessor($email, $pass)){
                
                session_start();
                $_SESSION['usuari']=$email;
                
                header("location: professor/home-professor.php");
            }
            else {
    
                include("index.php");
                ?>
            <script>
                let incorrecte = document.getElementById('errorIn');
                incorrecte.style.display = 'inline-block';
        
            </script>
            <?php
            }
        } catch(Exception $err){
            echo $err;
        }


    }
} else{
    header('Location: index.php');
}
?>