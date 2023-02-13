<!-- Pagina principal d'inici de sessió  -->

<nav>
                    
        <img src="assets/img/logo2.png" alt="LOGO INFO BDN" srcset="">

        <div class="lista">

            <li>
                <ul><a href="alumne/home-alumne.php"><i class="fa-solid fa-house-user"></i></a></ul>
            </li>
            <li>
                <ul><a href="#"><i class="fa-brands fa-blogger"></i></a></ul>
            </li>
            <li>
                <ul><a href="alumne/registre-alumne.php"><i class="fa-solid fa-user-plus"></i></i></a></ul>
            </li>
        </div>
    </nav>
    <hr>
    <div class="menu"></div>
    <div id="incorrecte" style="display: flex; justify-content: center;">
        <p id="errorIn" style="color: white; display: flex; align-items: center; font-weight: 600; justify-content: center; display: none; font-size: 20px;">Usuari i/o contrasenya incorrecte</p>
    </div>
    <div style="height: 50px;"></div>

    <section>
  
        <form class="contingut" action="index.php?controller=alumne&action=Singin" method="post">
    
            <img src="assets/img/logo.png" alt="LOGO INFOBDN" srcset="">

             <select name="rang" id="rang">
                 <option value="alumne" required require>Alumne</option>
                <option value="professor">Professor</option>
            </select>            
            
            <input type="text" name="email" id="email" placeholder= "Correu electrònic" required>
            <input type="password" name="contrasenya" id="contrasenya" placeholder = "Contrasenya" required>
    
            <input id="buto" type="submit" value="ACCEDIR">

            <p>
                <a href="index.php?controller=admin&action=loginAdmin" class="blanc">Admin</a>
                <a href="index.php?controller=alumne&action=showSingUp" class="blanc">Registrar-se</a>
            </p>
       
    
        </form> 
    </section>


    <footer style="height: 100px;">

    </footer>
