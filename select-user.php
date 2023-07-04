<?php
require_once('db/connex.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des utilisateurs</title>
</head>
<body>
    <?php 
        $sql = "SELECT id, nom, nomUtilisateur, motDePasse,dateDeNaissance from utilisateur order by nom";
        $result = mysqli_query($connex, $sql);
    ?>
    <h1>Liste des utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Courriel</th>
                <th>Date de naissance</th>
                <th>Ville</th>
                <th>Modifier</th>
                <th>Effacer</th>
            </tr>
        </thead>
        <tbody>
        <?php
                foreach($result as $row){
                    var_dump($row);
                    ?>
                    <tr>
                        <td><?php echo $row['nom'];?></td>
                        <td><?= $row['nomUtilisateur'];?></td>
                        <td><?= $row['motDePasse'];?></td>
                        <td><?= $row['dateDeNaissance'];?></td>
                        <td></td>
                    </tr>
                    <?php
                }
        ?>  
        </tbody>
    </table>

</body>
</html>
