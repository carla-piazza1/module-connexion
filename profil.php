<?php 
 session_start();
 $bdd = mysqli_connect('localhost','root','root','moduleconnexion');
 mysqli_set_charset($bdd, 'utf8');
 var_dump($_SESSION);

    
 if(isset($_POST['modif'])){
  var_dump($_POST);

  $user_login=$_SESSION['login'];

  $login= $_POST['login'];
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $query = "UPDATE `utilisateurs` SET `login`='$login',`prenom`='$prenom',`nom`='$nom',`password`='$password' WHERE `login`= '$user_login'";
  var_dump($query);
  $update = mysqli_query($bdd,$query );
  $_SESSION['login'] = $login; 
}
  
 if(isset($_SESSION['login']))
 {
   $user_login=$_SESSION['login'];
   echo $user_login; 
   $requete = mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login = '$user_login'");
   $user = mysqli_fetch_all($requete, MYSQLI_ASSOC);
   var_dump($user);
   
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
<body class="body_profil">
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
    <form action= "" method= "post" class="moduleprofil">
        
        <h1 class="modifier">MODIFIER</h1>
        
        <div class="inputs2">
          <input type="text"  name='nom' placeholder="Nom" value="<?php echo $user[0]['nom'];?>">
          <input type="text" name='prenom' placeholder="Prenom" value="<?php echo $user[0]['prenom'];?>">
          <input type="text" name='login' placeholder="Login" value="<?php echo $user[0]['login'];?>">
          <input type="password" name='password' placeholder="Mot de passe" value="<?php echo $user[0]['password'];?>">
          <input type="password" name='confirmPassword' placeholder="confirmer mot passe">
          </div>
        
        <div>
          <button class="bubu" name="modif" type="submit">Modifier</button>
        </div>

        
    </form>
  </main>
</body>
</html>