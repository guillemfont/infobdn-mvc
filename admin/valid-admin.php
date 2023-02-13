<?php
// Validació d'inici de sessió administrador

if ($_POST) {


    $usuari = $_POST['usuari'];
    $contrasenya = $_POST['contrasenya'];

    include("funcions-admin.php");

    try {


        if (validar($usuari, $contrasenya)) {

            session_start();
            $_SESSION['usuari'] = $usuari;

            header("location:home-admin.php");
        } else {

            include("index-admin.php")




?>
            <script>
                let incorrecte = document.getElementById('errorIn');
                incorrecte.style.display = 'inline-block';
            </script>
        <?php
        }
    } catch (Exception $e) {

        include("index-admin.php");
        echo $e;

        ?>
        <script>
            let incorrecte = document.getElementById('errorIn');
            incorrecte.style.display = 'inline-block';
        </script>
<?php

    }
} else {

    header("location:home-admin.php");
}




?>