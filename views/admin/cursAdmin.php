<nav>

<a href="index.php?controller=admin&action=showMain"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

<div class="lista">

    <li>
        <ul><a href="index.php?controller=admin&action=showMain"><i class="fa-solid fa-house-user"></i></a></ul>
    </li>
    <li>
        <ul><a href="#"><i class="fa-brands fa-blogger"></i></a></ul>
    </li>
    <li>
        <ul><a href="index.php?controller=admin&action=closesession" onclick="return confirmarTancarSessio()"><i class="fa-solid fa-right-from-bracket"></i></a></ul>
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
        <a style="margin-bottom: 3%" href="afegirCurs-admin.php"><i style="margin-right: 2%; font-size: 40px" class="fa-solid fa-user-plus"></i>Afegir nou curs</a>
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

            $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
            $sql = "SELECT * from cursos";

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

                    <?php 
                        require_once "models/admin.php";
                        $admin = new Administrador();
                    ?>

                    <td> <a href="editarCurs-admin.php?codi=<?php echo $mostrar['codi'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                    <td><?php $admin->cursActiu($mostrar['actiu'], $mostrar['codi']) ?></i></td>
                    <td><a href="eliminarCurs-admin.php? codi=<?php echo $mostrar['codi'] ?>" onclick="return confirmElimCurs()"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php

            }

            ?>



        </table>
    </div>

</section>


<footer style="height: 100px;">

</footer>