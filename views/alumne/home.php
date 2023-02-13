<nav>

<a href="index.php?controller=alumne&action=closesession" onclick="return confirmarTancarSessio()"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>

<div class="lista">

    <li>
        <ul><a href="notes-alumne.php"><i class="fa-solid fa-book"></i></a></ul>
    </li>
    <li>
        <ul><a href="home-alumne.php"><i class="fa-solid fa-house-user"></i></a></ul>
    </li>
    <li>
        <ul><a href="#"><i class="fa-brands fa-blogger"></i></a></ul>
    </li>
    <li>
        <ul><a href="index.php?controller=alumne&action=closesession" onclick="return confirmarTancarSessio()"><i class="fa-solid fa-right-from-bracket"></i></a></ul>
    </li>
</div>
</nav>
<hr>


<section id="seccioAlumne">
<div class="contingut" style="margin: 0 50px">
    <h1>Els meus cursos</h1>
    <?php echo $courses; ?>
</div>
<div class="contingut" style="margin: 0 50px">
    <h1>Cursos disponibles</h1>
    <?php echo $disponibles ?>
</div>

</section>