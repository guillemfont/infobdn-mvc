<?php
// Pàgina per posar la nota del professor


session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:../index.php');
} else {
    include("funcions-professor.php");
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
        <link rel="stylesheet" href="../css/professor.css">

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

            <a href="home-professor.php"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

            <div class="lista">


                <li>
                    <ul><a href="home-professor.php"><i class="fa-solid fa-house-user"></i></a></ul>
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


        <section>
            <form action="posarNota-professor.php" method="post">
                <input type="text" name="curs" id="curs" value="<?php echo nomCurs($_GET['codi']); ?>" required readonly="readonly">
                <input type="text" name="alumne" id="alumne" value="<?php echo $_GET['alumne'] ?>" required readonly="readonly">
                <input type="number" name="nota" id="nota" placeholder="Nota" required>
                <input type="submit" value="GUARDAR" id="buto">
            </form>
            <a class="totsCursos" href="home-professor.php">Tots els cursos</a>
        </section>





    </body>

    </html>

<?php

}
?>