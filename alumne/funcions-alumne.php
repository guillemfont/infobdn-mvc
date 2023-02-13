<?php
// Funcions relaciones amb alumnes

// Funció per registrar alumne
function registrarAlumne($dni, $nom, $cognom, $contrasenya, $email, $edat, $fotografia)
{

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $consulta = "INSERT INTO alumnes (dni, nom, cognoms, email, contrasenya, edat, fotografia) VALUES ('$dni','$nom','$cognom','$email', md5('$contrasenya'),'$edat', '$fotografia')";
    if ($connexio->query($consulta) == true) {
        echo "PROFESSOR AFEGIT";
        header('Location: registrat-alumne.php');
    } else {
        header('Location: error-alumne.php');
    }
}

// Funció per validar inici de sessió alumne
function validarAlumne($user, $pass)
{

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $consulta = "SELECT * FROM alumnes WHERE email = '$user' and contrasenya = md5('$pass')";

    $resultat = mysqli_query($connexio, $consulta);

    $filas = mysqli_num_rows($resultat);



    if (!empty($resultat) and $filas > 0) {

        return True;
    } else {

        return False;
    }

    mysqli_free_result($resultat);
    mysqli_close($connexio);
}

// Funció per obtenir dni de alumne
function dniUsuari($nom)
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $sql = "SELECT * from alumnes WHERE email = '$nom'";
    $resultat = mysqli_query($connexio, $sql);

    while ($mostrar = mysqli_fetch_array($resultat)) {
        $dni = $mostrar['dni'];
    }


    return $dni;
}

// Funció per mostrat totes les dades d'un curs
function mostrarCursComplet($codi, $bool)
{

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $dataAvui = date('Y-m-d');
    $dni = dniUsuari($_SESSION['usuari']);
    if ($bool == 0) {
        $sql = "SELECT * FROM cursos WHERE codi = '$codi' and actiu like 1 and data_final>'$dataAvui' and codi IN ( SELECT codi_curs FROM matricula WHERE dni_alumne like '$dni')";
    }
    if ($bool == 1) {
        $sql = "SELECT * FROM cursos WHERE codi = '$codi' and actiu like 1 and data_final>'$dataAvui'";
    }



    $consulta = mysqli_query($connexio, $sql);
    if (!$consulta) {
        echo mysqli_error($connexio) . "<br>";
        echo "Error querry no valida " . $sql;
        echo "Redirigint..";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1.5;URL=profs_admin.php'>";
    } else {
        $numlines = mysqli_num_rows($consulta);
        for ($i = 0; $i < $numlines; $i++) {
            $curs = mysqli_fetch_assoc($consulta);
            $dniprof = $curs['nom_professor'];
            $sql2 = "SELECT * FROM professors WHERE dni like '$dniprof'";
            $consulta2 = mysqli_query($connexio, $sql2);
            $prof = mysqli_fetch_assoc($consulta2);
?>
            <div class="curs">
                <div class="nom-curs">Nom:</div>
                <div class="descripcio-curs">Descripció:</div>
                <div class="nom-prof">Professor: </div>
                <div class="data-inici">Data d'inici:</div>
                <div class="data-final">Data final:</div>
                <div class="hores-totals">Hores totals:</div>
                <div class="nom"><?php echo $curs['nom'] ?></div>
                <div class="desc"><?php echo $curs['descripcio'] ?></div>
                <div class="profnom"><?php echo $prof['nom'] . " " . $prof['cognoms'] ?></div>
                <div class="inici"><?php echo $curs['data_inici'] ?></div>
                <div class="final"><?php echo $curs['data_final'] ?></div>
                <div class="totals"><?php echo $curs['num_hores'] ?></div>
                <div class="imatge" id="imatge"><img src="data:image/jpg;base64,<?php echo base64_encode($curs['fotografia']); ?>" /></div>
                <br>
                <?php if ($bool == 0) { ?>
                    <div class="enllaç"><a href="desmatricular-alumne.php?email=<?php echo $_SESSION['usuari'] ?>&codi=<?php echo $curs['codi'] ?>" onclick="return desmatricular()">Desmatricular-me del curs</a></div>
                <?php } else {
                ?> <div class="enllaç"><a style="text-decoration: underline" href="matricular-alumne.php?curs=<?php echo $curs['codi'] ?>" onclick="return matricularAlumne()">Matricular-me</a></div>
                <?php } ?>
                <div class="enllaç2"><a href="home-alumne.php">Tots els cursos</a></div>
            </div>





            <?php
        }
    }
}

// Funció per mostrar tots els cursos
function mostrarCursos()
{

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $dataAvui = date('Y-m-d');
    $dni = dniUsuari($_SESSION['usuari']);
    $sql = "SELECT * FROM cursos WHERE actiu like 1 and data_final>'$dataAvui' and codi IN ( SELECT codi_curs FROM matricula WHERE dni_alumne like '$dni')";



    $consulta = mysqli_query($connexio, $sql);
    if (!$consulta) {
        echo mysqli_error($connexio);
        echo "Alguna cosa no funciona correctament";
    } else {
        $numlines = mysqli_num_rows($consulta);
        if ($numlines != 0) {

            for ($i = 0; $i < $numlines; $i++) {
                $curs = mysqli_fetch_assoc($consulta);
                $dniprof = $curs['nom_professor'];
                $sql2 = "SELECT * FROM professors WHERE dni like '$dniprof'";
                $consulta2 = mysqli_query($connexio, $sql2);
                $prof = mysqli_fetch_assoc($consulta2);
            ?>
                <div class="cursos">
                    <div class="nom"><?php echo $curs['nom'] ?></div>
                    <div class="imatge" id="imatge"><img src="data:image/jpg;base64,<?php echo base64_encode($curs['fotografia']); ?>" /></div>
                    <div class="enllaç"><a style="text-decoration: underline;" href="curs-alumne.php?codi=<?php echo $curs['codi'] ?>">Veure complet</a></div>
                    <div class="enllaç"><a onclick="return desmatricular()" style="text-decoration: underline;" href="desmatricular-alumne.php?email=<?php echo $_SESSION['usuari'] ?>&codi=<?php echo $curs['codi'] ?>">Desmatricular-me</a></div>
                </div>
                <a href="notes-alumne.php"><span class="notes">Les meves notes</span> </a>
            <?php
            }
        } else {
            echo '<br/>';
            echo 'No estàs matriculat a cap curs.';
        }
    }
}


// Funció per cursos disponibles
function cursosDisponibles()
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $dni = dniUsuari($_SESSION['usuari']);
    $dataAvui = date('Y-m-d');
    $sql = "SELECT * FROM cursos WHERE actiu = 1 AND data_inici>'$dataAvui' AND codi NOT IN (SELECT codi_curs FROM matricula WHERE dni_alumne = '$dni' )";

    $consulta = mysqli_query($connexio, $sql);

    if ($consulta) {

        $numLinies = mysqli_num_rows($consulta);
        if ($numLinies != 0) {


            for ($i = 0; $i < $numLinies; $i++) {
                $curs = mysqli_fetch_assoc($consulta);
            ?>
                <div style="margin: 10px 0; border: 1px solid #dcf4fa; border-radius: 8%;">
                    <ul>
                        <li style="font-weight:bold"><?php echo $curs['nom'] ?></li>
                        <li><img src="data:image/jpg;base64,<?php echo base64_encode($curs['fotografia']); ?>" /></li>
                        <li><a style="text-decoration: underline" href="matricula-alumne.php?curs=<?php echo $curs['codi'] ?>">Matricular-me</a></li>
                    </ul>
                </div>

<?php
            }
        } else {
            echo '<br/>';
            echo 'Actualment no hi han cursos disponibles.';
        }
    } else {
        echo mysqli_error($connexio);
        echo "Alguna cosa no funciona correctament";
    }
}

// Funció per obtenir nom del professor d'un curs
function nomProfessor($codiCurs)
{

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $consulta = mysqli_query($connexio, "SELECT nom_professor FROM cursos WHERE codi = '$codiCurs'");
    $dniProf = mysqli_fetch_array($consulta)[0];

    $nom = mysqli_query($connexio, "SELECT nom FROM professors WHERE dni = '$dniProf'");
    $cognom = mysqli_query($connexio, "SELECT cognoms FROM professors WHERE dni = '$dniProf'");
    return mysqli_fetch_array($nom)[0] . " " . mysqli_fetch_array($cognom)[0];
}
