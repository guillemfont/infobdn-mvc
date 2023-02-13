<?php
// Pàgina 'editar curs' de l'administrador


session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:index-admin.php');
} else {

    $codi = $_GET['codi'];

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $sql = "SELECT * from cursos WHERE codi = '$codi'";
    $resultat = mysqli_query($connexio, $sql);

    $mostrar = mysqli_fetch_array($resultat);

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

            <a href="curs-admin.php"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

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
            <form class="contingut" action="edicioCurs-admin.php" method="post" enctype="multipart/form-data">

                <input type="text" name="codi" id="codi" value="<?= $codi ?>" required readonly="readonly">
                <input type="text" name="nom" id="nom" value="<?= $mostrar['nom'] ?>" required>
                <input type="text" name="descripcio" id="descripcio" value="<?= $mostrar['descripcio'] ?>" required>
                <input type="text" name="num_hores" id="num_Hores" value="<?= $mostrar['num_hores'] ?>" required>
                <input type="text" name="data_inici" id="data_inici" value="<?= $mostrar['data_inici'] ?>" required>
                <input type="text" name="data_final" id="data_final" value="<?= $mostrar['data_final'] ?>" required>
                <input type="text" name="nom_professor" id="nom_professor" value="<?= $mostrar['nom_professor'] ?>" required readonly="readonly">

                <input id="buto" type="submit" value="GUARDAR" onclick="return modificarProf()"">

            <p><a href=" curs-admin.php" class="blanc">Veure els cursos</a></p>


            </form>

        </section>


        <footer style="height: 100px;">

        </footer>



    </body>

    </html>

<?php



}
?>