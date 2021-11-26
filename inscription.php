<?php 
session_start();
$bdd = mysqli_connect('localhost','root','root','moduleconnexion');
mysqli_set_charset($bdd, 'utf8');
$message = "";
 if(isset($_SESSION['login'])){
  header("location: index.php");
 }
if(!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) 
{
    $login= $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $loginverif= mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login='$login'  ");
    $result = mysqli_fetch_all($loginverif);
    if(count($result) == 1){ 
      $message = "ce login existe deja";}
    else if($_POST['password']==$_POST['confirmPassword']){
        $requete = mysqli_query($bdd, "INSERT INTO utilisateurs(login,prenom,nom,password) VALUE ('$login','$prenom','$nom','$password')");
        header('Location: connexion.php');
        var_dump($requete);
    }
    else{
        $message = "mot de passe différent";
    }
    
}else{
  $message = "veuillez remplir tous les champs";
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

<body class="body_inscription">
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
                        <a href="connexion.php">connexion</a>';
                    }
            ?>
               
            
            <div class="animation start-home"></div>

        </nav>
    </header>
  <main>
    <form action= "" method= "post" class="moduleinscri">
        
        <h1 class="titi">S'INSCRIRE</h1>
        
        <div class="inputs">
          <input type="text" name="nom" placeholder="Nom">
          <input type="text" name="prenom" placeholder="Prenom">
          <input type="text" name="login" placeholder="Login">
          <input type="password" name="password" placeholder="Mot de passe">
          <input type="password" name="confirmPassword" placeholder="confirmer le mot de passe">
        </div>
        
        <div>
          <button class="bubu" name="connection" type="submit">Se connecter</button>
        </div>
        <p>
          <?php 
            echo $message;
          ?>
        </p>

        
    </form>
  </main>
</body>
</html>