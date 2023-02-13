<?php
// Pàgina home administrador

session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:index-admin.php');
} else {

    // Codi 
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Info BDN</title>

        <!-- Enllaç al document CSS  -->
        <link rel="stylesheet" href="../css/style.css">

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

            <a href="../sortir.php" onclick="return confirmarTancarSessio()"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

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
            <div class="contingut" style="margin: 0 50px">
                <a href=prof-admin.php>
                    <h1 style="text-align: center">Gestió de Professors</h1>
                    <br>
                    <i class="fa-solid fa-user" style="font-size: 40px"><span style="font-size: 19px; margin-left: 30px">Mostrar, afegir i/o eliminar professors</span></i>
                </a>
            </div>
            <div class="contingut" style="margin: 0 50px">
                <a href=curs-admin.php>
                    <h1 style="text-align: center">Gestió de Cursos</h1>
                    <br>
                    <i class="fa-solid fa-book" style="font-size: 40px"><span style="font-size: 19px; margin-left: 30px">Mostrar, afegir i/o eliminar cursos</i>
                </a>
            </div>

        </section>


        <footer style="height: 400px;">

        </footer>



    </body>

    </html>

<?php


}
?>