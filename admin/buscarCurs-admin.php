<?php
// Pàgina 'buscar curs' de l'administrador


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

        <a href="curs-admin.php"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

        <div class="lista">

            <li>
                <ul><a href="home-admin.php"><i class="fa-solid fa-house-user"></i></a></ul>
            </li>
            <li>
                <ul><a href="#"><i class="fa-brands fa-blogger"></i></a></ul>
            </li>
            <li>
                <ul><a href="../sortir.php" onclick="return confirmarTancarSessio()"><i
                            class="fa-solid fa-right-from-bracket"></i></a></ul>
            </li>
        </div>
    </nav>
    <hr>
    <div class="menu"></div>


    <section>
        <div class="taulaProf">
            <form action="buscarCurs-admin.php" method="post" style="display:flex; justify-content: center;">
                <input type="text" name="buscar" id="buscar" placeholder="Buscar curs">
                <input type="button" value="BUSCAR">
            </form>
            <a style="margin-bottom: 3%" href="afegirCurs-admin.php"><i style="margin-right: 2%; font-size: 40px"
                    class="fa-solid fa-user-plus"></i>Afegir nou professor</a>
            <table>
                <tr>
                    <th>Codi</th>
                    <th>Nom</th>
                    <th>Descripció</th>
                    <th>Número d'hores</th>
                    <th>Data d'inici</th>
                    <th>Data de final</th>
                    <th>DNI del professor</th>
                    <th>Modificar</th>
                    <th>Estat</th>
                    <th>Eliminar</th>
                </tr>

                <?php

                    $buscar = $_POST['buscar'];

                    include('funcions-admin.php');

                    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
                    $sql = "SELECT * from cursos WHERE nom like '$buscar' '%' order by codi";
                    $resultat = mysqli_query($connexio, $sql);

                    while ($mostrar = mysqli_fetch_array($resultat)) {

                    ?>

                <tr>

                    <td><?php echo $mostrar['codi'] ?></td>
                    <td><?php echo $mostrar['nom'] ?></td>
                    <td><?php echo $mostrar['descripcio'] ?></td>
                    <td><?php echo $mostrar['num_hores'] ?></td>
                    <td><?php echo $mostrar['data_inici'] ?></td>
                    <td><?php echo $mostrar['data_final'] ?></td>
                    <td><?php echo $mostrar['nom_professor'] ?></td>
                    <td> <a href="editarCurs-admin.php?dni=<?php echo $mostrar['codi'] ?>"><i
                                class="fa-solid fa-gear"></i></a></td>
                    <td><?php cursActiu($mostrar['actiu'], $mostrar['codi']) ?></i></td>
                    <td><a href="eliminarCurs-admin.php? dni=<?php echo $mostrar['codi'] ?>"
                            onclick="return confirmElimCurs()"><i class="fa-solid fa-trash"></i></a></td>

                </tr>
                <?php

                    }

                    ?>



            </table>
            <a style="text-align:center; margin-top:1%;" href="curs-admin.php">Tots els cursos</a>

        </div>

    </section>


    <footer style="height: 400px;">

    </footer>



</body>

</html>

<?php


}
?>