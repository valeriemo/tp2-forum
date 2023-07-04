<!-- Page de création de compte -->
<?php
require_once('db/connex.php');

$nomErreur = $nomUtilisateurErreur = $motDePasseErreur = $dateDeNaissanceErreur = null;
$result = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $erreur = false;

    foreach($_POST as $key=>$value){
        $$key=mysqli_real_escape_string($connex, $value);
// Validation du nom
        if($key == 'nom'){
            if(strlen($value)< 3 || strlen($value) > 30 ){
                $nomErreur = 'Le nom doit avoir entre 3 et 30 caracteres';
                $erreur = true;
            }
// Validation du nom d'Utilisateur  //ajouter contrainte unique (doit valider si disponible)
        }elseif($key == 'nomUtilisateur'){
            if( strlen($value) > 30){
                $nomUtilisateurErreur = 'L`address ne peut pas avoir plus que 30 caracteres';
                $erreur = true;
            }
        }
// Validation du mot de passe
        if($key == 'motDePasse'){
            if(strlen($value) < 6 || strlen($value) > 20 ){
                $motDePasseErreur = 'Le mot de passe doit avoir entre 6 et 20 caracteres';
                $erreur = true;
            }
// Validation de la date de naissance
        }elseif($key == 'dateDeNaissance'){
            $valide = validateDate($value);
            if ($valide == false){
                $dateDeNaissanceErreur = 'La date de fête n`est pas valide';
                $erreur = true;
            } 
        }
    }
    if($erreur == false){
        //insert
        $sql = "INSERT INTO utilisateur(nom, nomUtilisateur, motDePasse, dateDeNaissance) VALUES ('$nom', '$nomUtilisateur', '$motDePasse', '$dateDeNaissance')";

        if(mysqli_query($connex, $sql)){
            header("Location: select-user.php");
        }else{
            echo "Erreur: " . $sql . "<br>" . mysqli_error($connex);
        }
    }
} 

function validateDate($date){
    if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts)) {
        if(checkdate($parts[2],$parts[3],$parts[1])) {
        return true;
        }else{
        return false;
        }
        }else{
        return false;}
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <nav>
        <a href="index.php">⌂</a>
        <div>
            <a href="se-connecter.php"><button class="bouton">Se connecter</button></a>
            <a href="nouvel-utilisateur.php"><button class="bouton">Se créer un compte</button></a>
        </div>
    </nav>
    <header>
        <h1>Forum de classe</h1>
        <h2>Programmation Web dynamique</h2>
    </header>


    <div class="login-page">
        <h3>Créer un compte</h3>
        <div class="form">
            <form class="login-form" method="post">
                <label>Name
                    <input type="text" name="nom"  maxlength="30" minlength="3">
                    <div class='Erreur'><?= $nomErreur;?></div>
                </label>
                <label>Nom d'utilisateur
                    <input type="text" name="nomUtilisateur"  maxlength="30" required>
                    <div class='Erreur'><?= $nomUtilisateurErreur;?></div>
                </label>
                <label>Mot de passe
                    <input type="password" name="motDePasse"  maxlength="20" minlength="6" required>
                    <div class='Erreur'><?= $motDePasseErreur;?></div>
                </label>
                <label>Date de naissance
                    <input type="date" name="dateDeNaissance">
                    <div class='Erreur'><?= $dateDeNaissanceErreur;?></div>
                </label>

                <button class="bouton">Créer votre compte</button>
                <p class="message">Vous avez déjà un compte? <a href="#">Se connecter</a></p>
            </form>
        </div>
    </div>