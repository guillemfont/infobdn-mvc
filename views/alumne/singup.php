    <nav>

        <a href="index.php"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

        <div class="lista">

            <li>
                <ul><a href="home-alumne.php"><i class="fa-solid fa-house-user"></i></a></ul>
            </li>
            <li>
                <ul><a href="#"><i class="fa-brands fa-blogger"></i></a></ul>
            </li>
        </div>
    </nav>
    <hr>
    <div class="menu"></div>



    <section>

        <form class="contingut" action="registre-alumne.php" method="post" enctype="multipart/form-data">

            <div id="incorrecte" style="display: flex; justify-content: center;">
                <p id="errorIn" style="color: white; display: flex; align-items: center; font-weight: 600; justify-content: center; display: none; font-size: 20px;">Les contrasenyes no coincideixen</p>
            </div>


            <input type="text" name="dni" id="dni" placeholder="DNI" required>
            <input type="text" name="nom" id="nom" placeholder="Nom" required>
            <input type="text" name="cognom" id="cognom" placeholder="Cognoms" required>
            <input type="text" name="email" id="email" placeholder="Correu electrònic" required>
            <input type="password" name="contrasenya" id="contrasenya" placeholder="Contrasenya" required>
            <input type="password" name="repetir-contrasenya" id="repetirContrasenya" placeholder="Repeteix la contrasenya" required>
            <input type="number" name="edat" id="edat" placeholder="Edat" required>
            <input type="file" name="imatge" id="imatge" required>


            <input id="buto" type="submit" value="REGISTRAR" onclick="return validarContrasenya()">



        </form>

        </div>
    </section>


    <footer style="height: 100px;">

    </footer>


    <script>
        function validarContrasenya() {

            let pass1 = document.getElementById("contrasenya").value;
            let pass2 = document.getElementById("repetirContrasenya").value;

            if (pass1 != pass2) {
                let incorrecte = document.getElementById('errorIn');
                incorrecte.style.display = 'inline-block';
                return false;
            } else {
                incorrecte.style.display = 'none';
                return true;
            }
        }
    </script>


<?php


if ($_POST) {

    try {


        $dni = $_POST['dni'];
        $nom = $_POST['nom'];
        $cognom = $_POST['cognom'];
        $email = $_POST['email'];
        $contrasenya = $_POST['contrasenya'];
        $repetirContrasenya = $_POST['repetir-contrasenya'];
        $edat = $_POST['edat'];
        $imatge = addslashes(file_get_contents($_FILES['imatge']['tmp_name']));



        include("funcions-alumne.php");
        registrarAlumne($dni, $nom, $cognom, $contrasenya, $email, $edat, $imatge);
    } catch (Exception $err) {
        header('Location: error-alumne.php');
    }
}


?>