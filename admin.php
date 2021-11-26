<?php 
    session_start();
    $bdd = mysqli_connect('localhost','root','root','moduleconnexion');
        mysqli_set_charset($bdd, 'utf8');

    $requete = mysqli_query($bdd, "SELECT * FROM utilisateurs");
    $users = mysqli_fetch_all($requete, MYSQLI_ASSOC);
    
    if($_SESSION['login'] != 'admin'){
        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width">
    <link rel="stylesheet" href="page.css"> 
    
    <header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="inscription.php">Inscription</a>
            <a href="connexion.php">Connexion</a>
            <a href="profil.php">Modifier Profil</a>
            <a href="admin.php">Admin</a>
            <a href="deco.php">déconnexion</a>
            <div class="animation start-home"></div>
        </nav>
    </header>
    <main>
        <div class = 'Container'>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Login</th>
                        <th>Mot de Passe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        echo '<p>Voici la liste des utilisateurs existant</p>
                        <style>
                        p{
                            padding :1%;
                            font-size:1.7em;
                        }
                        </style>';

                        foreach ($users as $user){
                            echo'<tr><td>'.$user['id'].'</td>';
                            echo'<td>'.$user['nom'].'</td>';
                            echo'<td>'.$user['prenom'].'</td>';
                            echo'<td>'.$user['login'].'</td>';
                            echo'<td>'.$user['password'].'</td>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>>
</head>
<body>
    
</body>
</html>