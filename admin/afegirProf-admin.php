<?php
// Pàgina 'home' de l'administrador


session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:index-admin.php');
} else {


    // Codi 
?>
    <!-- Pagina principal d'inici de sessió  -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Info BDN</title>

        <!-- Enllaç al document CSS  -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/admin.css">

        <!-- Enllaç a les tipografies  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">

        <!-- Enllaç a icones  -->
        <script src="https://kit.fontawesome.com/ebca16e450.js" crossorigin="anonymous"></script>

        <!-- Enllaç al script JavaScript -->
        <script src="../script/script.js"></script>

    </head>

    <body background="../img/fondo.jpg">

        <nav>

            <a href="prof-admin.php"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

            <div class="lista">

                <li>
                    <ul><a href="home-admin.php"><i class="fa-solid fa-house-user"></i></a></ul>
                </li>
                <li>
                    <ul><a href="#"><i class="fa-brands fa-blogger"></i></a></ul>
                </li>
                <li>
                    <ul><a href="../sortir.php" onclick="return confirmarTancarSessio()"><i class="fa-solid fa-right-from-bracket"></i></a></ul>
                </li>
            </div>
        </nav>
        <hr>
        <div class="menu"></div>


        <section>
            <form class="contingut" action="afegirProf-admin.php" method="post" enctype="multipart/form-data">

                <input type="text" name="dni" id="dni" placeholder="DNI" required>
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
                <input type="text" name="cognom" id="cognom" placeholder="Cognoms" required>
                <input type="text" name="email" id="email" placeholder="Correu electrònic" required>
                <input type="password" name="contrasenya" id="contrasenya" placeholder="Contrasenya" required>
                <input type="text" name="titol" id="titol" placeholder="Titol Acadèmic" required>
                <input type="file" name="imatge" id="imatge" required>

                <input id="buto" type="submit" value="AFEGIR">

                <p><a href="prof-admin.php" class="blanc">Veure els professors</a></p>


            </form>

        </section>


        <footer style="height: 100px;">

        </footer>



    </body>

    </html>

<?php

    if (isset($_POST['dni'])) {

        include('funcions-admin.php');

        $imatge = addslashes(file_get_contents($_FILES['imatge']['tmp_name']));

        dadesProf($_POST['dni'], $_POST['nom'], $_POST['cognom'], $_POST['email'], $_POST['contrasenya'], $_POST['titol'], $imatge);
    }
}
?>