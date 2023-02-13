<?php
class Professor
{

    private $connexio;
    private $userDNI;
    private $userName;
    private $userLastName;
    private $email;
    private $password;
    private $titol;
    private $photo;


    //Constructor
    public function __construct($email = null, $name = null, $lastname = null, $titol = null, $photo = null, $DNI = null, $password = null)
    {
        $this->connexio = mysqli_connect("localhost", "root", "", "infobdn");
        $this->email = $email;
        $this->userName = $name;
        $this->userLastName = $lastname;
        $this->titol = $titol;
        $this->photo = $photo;
        $this->userDNI = $DNI;
        $this->password = $password;
    }

    // Methods
    function dniUsuari($nom)
    {
        $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
        $sql = "SELECT * from professors WHERE email = '$nom'";
        $resultat = mysqli_query($connexio, $sql);

        while ($mostrar = mysqli_fetch_array($resultat)) {
            $dni = $mostrar['dni'];
        }


        return $dni;
    }

    function totsCursosProf($dni)
    {
        $connexio = mysqli_connect("localhost", "root", "", "infobdn"); // Connexió amb la BBDD
        $consulta = mysqli_query($connexio, "SELECT * FROM cursos WHERE nom_professor = '$dni'");

        if ($consulta) {
            $numLines = mysqli_num_rows($consulta);
            for ($i = 0; $i < $numLines; $i++) {
                $curs = mysqli_fetch_array($consulta);
                return 
                '<tr>
                    <th><img src="data:image/jpg;base64,'.base64_encode($curs['fotografia']).'" width="150px"></th>
                    <td>'.$curs['nom'].'</td>
                    <td>'.$curs['data_inici'].'</td>
                    <td>'.$curs['data_final'].'</td>
                    <th><a href="curs-professor.php?codi='.$curs['codi'] .'"><i class="fa-solid fa-book-open"></i></a></th>
                    <th><a href="notes-professor.php?codi='.$curs['codi'] .'"><i class="fa-solid fa-pen-to-square"></i></a></th>
                </tr>';
            }
        } else {
            echo mysqli_error($connexio);
            echo "Alguna cosa no ha funcionat correctament";
        }
    }
}
