<body background="../img/fondo.jpg">

    <nav>

        <a href="index.php"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

        <div class="lista">

            <li>
                <ul><a href="#"><i class="fa-solid fa-house-user"></i></a></ul>
            </li>
            <li>
                <ul><a href="#"><i class="fa-brands fa-blogger"></i></a></ul>
            </li>
            <li>
                <ul><a href="#"><i class="fa-solid fa-right-from-bracket"></i></a></ul>
            </li>
        </div>
    </nav>
    <hr>
    <div id="menu" style="height: 100px"></div>

    <div id="incorrecte" style="display: flex; justify-content: center;">
        <p id="errorIn" style="color: white; display: flex; align-items: center; font-weight: 600; justify-content: center; display: none; font-size: 20px;">Usuari i/o contrasenya incorrecte</p>
    </div>


    <section>
        <form class="contingut" action="index.php?controller=admin" method="post">

            <img src="assets/img/logo.png" alt="LOGO INFOBDN" srcset="">

            <input type="text" name="usuari" id="usuari" placeholder="Nom d'usuari" required>
            <input type="password" name="contrasenya" id="contrasenya" placeholder="Contrasenya" required>

            <input id="buto" type="submit" value="ACCEDIR">

            <p><a href="index.php" class="blanc">Sóc Alumne/Professor</a></p>


        </form>
    </section>


    <footer style="height: 100px;">

    </footer>



</body>

</html>