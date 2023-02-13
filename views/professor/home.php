<nav>

            <a href="location: index.php?controller=prof&action=closesession" onclick="return confirmarTancarSessio()"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

            <div class="lista">

                <li>
                    <ul><a href="location: index.php?controller=prof&action=showHome"><i class="fa-solid fa-house-user"></i></a></ul>
                </li>
                <li>
                    <ul><a href="#"><i class="fa-brands fa-blogger"></i></a></ul>
                </li>
                <li>
                    <ul><a href="location: index.php?controller=prof&action=closesession" onclick="return confirmarTancarSessio()"><i class="fa-solid fa-right-from-bracket"></i></a></ul>
                </li>
            </div>
        </nav>
        <hr>


        <section>
            <h1>Els meus cursos</h1>
            <table>
                <tr>
                    <th>Imatge</th>
                    <th>Nom</th>
                    <th>Data inici</th>
                    <th>Data inici</th>
                    <th>Complet</th>
                    <th>Notes</th>
                </tr>
                <?php echo $cursos;?>

        </section>