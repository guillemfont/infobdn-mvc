<?php
// Pàgina 'home' de l'alumne


session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:../index.php');
} else {
    include("funcions-alumne.php");
    // Codi 
?>
    <!-- Pagina principal usuari alumne  -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Info BDN</title>

        <!-- Enllaç al document CSS  -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/alumne.css">

        <!-- Enllaç a les tipografies  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">

        <!-- Enllaç a icones  -->
        <script src="https://kit.fontawesome.com/ebca16e450.js" crossorigin="anonymous"></script>

        <!-- Enllaç al document JS  -->
        <script src="../script/script.js"></script>

    </head>

    <body background="../img/fondo.jpg">

        <nav>

            <a href="../sortir.php" onclick="return confirmarTancarSessio()"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

            <div class="lista">

                <li>
                    <ul><a href="notes-alumne.php"><i class="fa-solid fa-book"></i></a></ul>
                </li>
                <li>
                    <ul><a href="home-alumne.php"><i class="fa-solid fa-house-user"></i></a></ul>
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


        <section id="seccioAlumne">
            <div class="contingut" style="margin: 0 50px">
                <h1>Els meus cursos</h1>
                <?php mostrarCursos(); ?>
            </div>
            <div class="contingut" style="margin: 0 50px">
                <h1>Cursos disponibles</h1>
                <?php cursosDisponibles(); ?>
            </div>

        </section>





    </body>

    </html>

<?php


}
?>