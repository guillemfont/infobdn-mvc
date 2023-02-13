<!-- Pagina principal d'inici de sessió  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info BDN</title>

    <!-- Enllaç al document CSS  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Enllaç a les tipografies  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">

    <!-- Enllaç a icones  -->
    <script src="https://kit.fontawesome.com/ebca16e450.js" crossorigin="anonymous"></script>

</head>
<body background="img/fondo.jpg">

    <nav>
                    
        <img src="img/logo2.png" alt="LOGO INFO BDN" srcset="">

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
  
        <form class="contingut" action="validacio.php" method="post">
    
            <img src="img/logo.png" alt="LOGO INFOBDN" srcset="">

             <select name="rang" id="rang">
                 <option value="alumne" required require>Alumne</option>
                <option value="professor">Professor</option>
            </select>            
            
            <input type="text" name="email" id="email" placeholder= "Correu electrònic" required>
            <input type="password" name="contrasenya" id="contrasenya" placeholder = "Contrasenya" required>
    
            <input id="buto" type="submit" value="ACCEDIR">

            <p>
                <a href="admin/index-admin.php" class="blanc">Admin</a>
                <a href="alumne/registre-alumne.php" class="blanc">Registrar-se</a>
            </p>
       
    
        </form> 
    </section>


    <footer style="height: 100px;">

    </footer>



</body>
</html>