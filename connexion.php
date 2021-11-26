<?php 
session_start();

$bdd = mysqli_connect('localhost','root','root','moduleconnexion');
    mysqli_set_charset($bdd, 'utf8');
    $login = $_POST['login'];
    $password = $_POST['password'];
    $message ="";
     if(isset($_SESSION['login'])){
      header("location: index.php");
    }


    
if (isset($_POST['login']) && isset($_POST['password'])){ //Vérfie que les champs sont bien remplit
     
    if($login !== "" && $password !== ""){
        $requete = "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$password'";
        $requete2 = mysqli_query($bdd, $requete);
        $reponse = mysqli_fetch_all($requete2);
        $count = count($reponse);
        
        if($count==1){
            $_SESSION['login'] = $login;
            header('Location: index.php');
        }
        else{
            $message = "login ou password incorrect";
        }
    }

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
<body class="body_connexion">
    <header>
        <nav>
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
                        echo '<a href="inscription.php">inscription</a>
                        <a href="deo.php">déconnexion</a>';
                    }
            ?>
               
            
            <div class="animation start-home"></div>

        </nav>
    </header>
    <main>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form action="" method="POST">
            <h3>Se connecter</h3>

            <label for="login">Login</label>
            <input type="text" placeholder="login" name="login">

            <label for="password">Mot de Passe</label>
            <input type="password" placeholder="Password" name="password">

            <button class="buttonco" type="submit" name="connexion">connexion</button>

        </form>
    </main>
</body>
</html>