<?php
// Funció per validar inici de sessió professor
function validarProfessor($user, $pass)
{

    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD

    $consulta = "SELECT * FROM professors WHERE email = '$user' and contrasenya = md5('$pass')";

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

// Obtenir dni del professor
function dniProf($email)
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $consulta = mysqli_query($connexio, "SELECT dni FROM professors WHERE email = '$email'");
    return (mysqli_fetch_array($consulta)[0]);
}

// Tots els cursos que imparteix un professor
function totsCursosProf($dni)
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $consulta = mysqli_query($connexio, "SELECT * FROM cursos WHERE nom_professor = '$dni'");

    if ($consulta) {
        $numLines = mysqli_num_rows($consulta);
        for ($i = 0; $i < $numLines; $i++) {
            $curs = mysqli_fetch_array($consulta);
?>
            <tr>
                <th><img src="data:image/jpg;base64,<?php echo base64_encode($curs['fotografia']); ?>"></th>
                <td><?php echo $curs['nom'] ?></td>
                <td><?php echo $curs['data_inici'] ?></td>
                <td><?php echo $curs['data_final'] ?></td>
                <th><a href="curs-professor.php?codi=<?php echo $curs['codi'] ?>"><i class="fa-solid fa-book-open"></i></a></th>
                <th><a href="notes-professor.php?codi=<?php echo $curs['codi'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></th>
            </tr>
        <?php
        }
    } else {
        echo mysqli_error($connexio);
        echo "Alguna cosa no ha funcionat correctament";
    }
}

// Mostrar un curs complet
function cursComplet($codi)
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $consulta = mysqli_query($connexio, "SELECT * FROM cursos WHERE codi = '$codi'");

    if ($consulta) {
        $numLines = mysqli_num_rows($consulta);
        for ($i = 0; $i < $numLines; $i++) {
            $curs = mysqli_fetch_array($consulta);
        ?>
            <tr>
                <td><?php echo $curs['nom'] ?></td>
                <td><?php echo $curs['descripcio'] ?></td>
                <td><?php echo $curs['num_hores'] ?></td>
                <td><?php echo $curs['data_inici'] ?></td>
                <td><?php echo $curs['data_final'] ?></td>
                <?php if ($curs['actiu'] == 1) {
                ?><th><i class="fa-solid fa-check"></i></th><?php
                                                            } else {
                                                                ?><th><i class="fa-solid fa-x"></i></th><?php } ?>
                <th><img src="data:image/jpg;base64,<?php echo base64_encode($curs['fotografia']); ?>"></th>
            </tr>
        <?php
        }
    } else {
        echo mysqli_error($connexio);
        echo "Alguna cosa no ha funcionat correctament";
    }
}


// Mostrar notes d'un curs
function notes($codi)
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $consulta = mysqli_query($connexio, "SELECT * FROM matricula WHERE codi_curs = '$codi'");

    if ($consulta) {
        $numLines = mysqli_num_rows($consulta);
        for ($i = 0; $i < $numLines; $i++) {
            $nota = mysqli_fetch_array($consulta);
            $dniAlumne = $nota['dni_alumne'];
            $query = "SELECT * FROM alumnes WHERE dni like '$dniAlumne'";
            $resultat = mysqli_query($connexio, $query);
            $alumne = mysqli_fetch_assoc($resultat);
        ?>
            <tr>
                <td><?php echo $alumne['nom']." ".$alumne['cognoms'] ?></td>
                <?php if ($nota['nota'] != NULL) { ?>
                    <td><?php echo $nota['nota'] ?></td>
                <?php } else { ?>
                    <td><a class="posarNota" href="qualificar-professor.php?alumne=<?php echo $alumne['nom'] ?>&codi=<?php echo $codi ?>">Qualificar</a></td>

                <?php
                } ?>
                <td><a class="posarNota" href="qualificar-professor.php?alumne=<?php echo $alumne['nom'] ?>&codi=<?php echo $codi ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
            </tr><?php
                }
            }
        }

// Obtenir nom del curs
function nomCurs($codi)
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $consulta = mysqli_query($connexio, "SELECT * FROM cursos WHERE codi = '$codi'");

    if ($consulta) {
        $curs = mysqli_fetch_array($consulta);
        return $curs['nom'];
    }
}

// Obtenir dni del alumne
function dniAlum($nom)
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $consulta = mysqli_query($connexio, "SELECT dni FROM alumnes WHERE nom = '$nom'");
    return (mysqli_fetch_array($consulta)[0]);
}

// Obtenir codi d'un curs
function codiCurs($nom)
{
    $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
    $consulta = mysqli_query($connexio, "SELECT codi FROM cursos WHERE nom = '$nom'");
    return (mysqli_fetch_array($consulta)[0]);
}




            ?>