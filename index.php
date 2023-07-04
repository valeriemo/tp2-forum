<!-- Page de d'acceuil : doit répertorier tous les articles avec le nom de l'étudiant qui l'a écritet la date et doit etre accessible a tous-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
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
        <div class="form">
            <form class="login-form">
                <input type="text" placeholder="Nom d'utilisateur"/>
                <input type="password" placeholder="Mot de passe"/>
                <button class="bouton">Se connecter</button>
                <p class="message">Nouvelle utilisateur ? <a href="se-connecter.php">Se créer un compte</a></p>
            </form>
        </div>
    </div>