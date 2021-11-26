<?php
    session_start();
    $bdd = mysqli_connect('localhost','root','root','moduleconnexion');
    // echo $_SESSION['login'];
    if(isset($_POST['deco'])){
        session_destroy();

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="page.css"> 
    
</head>
<body class="body_pageaccueil">
    <header>
        <nav>
            <a href="index.php">Accueil</a>
                <?php 
                    if(isset($_SESSION["login"])){
                        if($_SESSION["login"]=="admin"){
                            echo '<a href="admin.php">Admin</a>';
                            }
                        else{
                            echo '<a href="profil.php">Profil</a>
                            <a href="deco.php">déconnexion</a>';
                            }
                    }
                    else{
                        echo '<a href="inscription.php">Inscription</a>
                        <a href="connexion.php">Connexion</a>';
                    }
            ?>
               
            
            <div class="animation start-home"></div>
        </nav>
    </header>
    <main>
    </main>
</body>
</html>