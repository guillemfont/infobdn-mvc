<!doctype html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info BDN</title>

    <!-- Enllaç al document CSS  -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Enllaç al document JS  -->
    <script src="assets/script/script.js"></script>

    <!-- Enllaç a les tipografies  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">

    <!-- Enllaç a icones  -->
    <script src="https://kit.fontawesome.com/ebca16e450.js" crossorigin="anonymous"></script>

</head>
<body background="assets/img/fondo.jpg">
    <?php
    session_start();
    require_once "autoload.php";
    // require_once "views/general/header.php";
    if (isset($_GET['controller'])) {
        $nameController = $_GET['controller'] . "Controller";
    } else {
        $nameController = "alumneController";
    }
    if (class_exists($nameController)) {
        $controler = new $nameController();
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "showMain";
        }
        $controler->$action();
    } else {
        echo "No existe el controlador";
    }
    // require_once "views/general/footer.php";
    ?>
</body>

</html>