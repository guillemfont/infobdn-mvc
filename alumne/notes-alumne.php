<?php
// Pàgina amb notes de l'alumne

session_start();
if (!isset($_SESSION['usuari'])) { // Comprovar que la sessió existeix
    header('location:../index.php');
} else {
    include("funcions-alumne.php");
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

            <a href="home-alumne.php"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

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
        <div class="menu"></div>


        <section>
            <div class="container" style="margin: 0 50px">
                <table>
                    <tr>
                        <th style="font-size: 18px;">Curs</th>
                        <th style="font-size: 18px;">Nom del professor</th>
                        <th style="font-size: 18px;">Nota</th>
                    </tr>

                    <?php
                    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
                    $dni = dniUsuari($_SESSION['usuari']);

                    $sql1 = "SELECT * FROM matricula WHERE dni_alumne = '$dni' and nota != 'NULL'";
                    $resultat1 = mysqli_query($connexio, $sql1);


                    if ($resultat1) {
                        $numLineas1 = mysqli_num_rows($resultat1);

                        if ($numLineas1 == 0) {
                            echo "</table>";
                            echo "<p style='text-align: center'>No ni han notes disponibles de cap curs.</p>";
                        } else {


                            $matricula = mysqli_fetch_assoc($resultat1);


                            for ($i = 0; $i < $numLineas1; $i++) {
                                $codiMatricula = $matricula['codi_curs'];
                                $sql2 = "SELECT nom FROM cursos WHERE codi = '$codiMatricula'";
                                $resultat2 = mysqli_query($connexio, $sql2);
                                $nomCurs = mysqli_fetch_array($resultat2)['nom'];
                                $nomProf = nomProfessor($matricula['codi_curs']);


                                echo "<tr>";
                                echo "<td style='text-align: center'>$nomCurs</td>";
                                echo "<td style='text-align: center'>$nomProf</td>";
                                echo "<td style='text-align: center'>" . $matricula['nota'] . "</td>";
                                echo "</tr>";
                                
                            }
                            echo "</table>";
                        }
                    }




                    ?>
                </table>
                <br>
                <a style="text-align: center" href="home-alumne.php">Tots els cursos</a>
            </div>

        </section>





    </body>

    </html>

<?php


}
?>