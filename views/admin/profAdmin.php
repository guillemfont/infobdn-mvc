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
                <form action="buscarProf-admin.php" method="post" style="display:flex; justify-content: center;">
                    <input type="text" name="buscar" id="buscar" placeholder="Buscar professor">
                    <input type="button" value="BUSCAR">
                </form>
                <a style="margin-bottom: 3%" href="afegirProf-admin.php"><i style="margin-right: 2%; font-size: 40px" class="fa-solid fa-user-plus"></i>Afegir nou professor</a>
                <table>
                    <tr>
                        <th>DNI</th>
                        <th>Nom</th>
                        <th>Cognoms</th>
                        <th>Correu electrònic</th>
                        <th>Titol Acadèmic</th>
                        <th>Fotografía</th>
                        <th>Modificar</th>
                        <th>Estat</th>
                        <th>Eliminar</th>
                    </tr>

                    <?php

                    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
                    $sql = "SELECT * from professors";
                    $resultat = mysqli_query($connexio, $sql);

                    while ($mostrar = mysqli_fetch_array($resultat)) {

                    ?>

                        <tr>

                            <td><?php echo $mostrar['dni'] ?></td>
                            <td><?php echo $mostrar['nom'] ?></td>
                            <td><?php echo $mostrar['cognoms'] ?></td>
                            <td><?php echo $mostrar['email'] ?></td>
                            <td><?php echo $mostrar['titol_academic'] ?></td>
                            <td><img src="data:image/jpg;base64,<?php echo base64_encode($mostrar['fotografia']); ?>" /></td>
                            <td> <a href="editarProf-admin.php?dni=<?php echo $mostrar['dni'] ?>"><i class="fa-solid fa-gear"></i></a></td>
                            <td><?php profActiu($mostrar['actiu'], $mostrar['dni']) ?></i></td>
                            <td><a href="eliminarProf-admin.php? dni=<?php echo $mostrar['dni'] ?>" onclick="return confirmElim()"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php

                    }

                    ?>



                </table>
            </div>

        </section>


        <footer style="height: 200px;">

        </footer>