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
                    require_once "models/alumne.php";
                    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
                    $alumne = new Alumne();
                    $dni = $alumne->dniUsuari($_SESSION['usuari']);

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
                                $nomProf = $alumne->nomProfessor($matricula['codi_curs']);


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
                <a style="text-align: center" href="index.php?controller=alumne&action=showHome">Tots els cursos</a>
            </div>

        </section>
