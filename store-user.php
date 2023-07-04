<?php

require_once('db/connex.php');


foreach ($_POST as $key => $value) {
    $$key = mysqli_real_escape_string($connex, $value);   
}

$sql = "INSERT INTO utilisateur(nom, nomUtilisateur, motDePasse, dateDeNaissance) VALUES ('$nom', '$nomUtilisateur', '$motDePasse', '$dateDeNaissance')";



if (mysqli_query($connex, $sql)) {
    echo "Bravo !";
} else {                                   
    echo "Nop: " . $sql . "</br>" . mysqli_error($connex);
}
mysqli_close($connex);









?>