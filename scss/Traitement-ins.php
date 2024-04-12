<?php
error_reporting(E_ALL);
 ini_set("display_errors",1);
 // CONNEXION A LA BASE DE DONNEES
$bdd = new PDO('mysql:host=localhost;dbname=Inscrit','root','');


// tu peux laisser le controle de isset($_post['ok']) ou bien
// tu peux enléver

if (isset($_POST['ok'])) {
  // ICI ON RECUPERE LES VALEURS DES CHAMPS DU FORMULAIRE
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $contact = htmlspecialchars($_POST['contact']);
	$password = htmlspecialchars($_POST['password']);

  if(isset($nom, $prenom,$email,$contact, $password) AND !empty($_POST['nom'])){

    // VERIFIONS SI L'email que la personne à renseigner existe déjà dans la base de données
    $passwordHash = password_hash($password,PASSWORD_DEFAULT);

    $reqData = $bdd->prepare('SELECT count(*) as count FROM users WHERE email = ?');
    $reqData->execute(array($email));
    $resultat = $reqData->fetch();

    if ($resultat['count'] > 0) {
        echo  'e-mail existe déjà !'; 
      }else{
        // SI l'EMAIL n'exite pas dans la base de données on fait un contrôle 
        // pour savoir si le mot de passe fait 8 caractères

        if (strlen($password) >= 8) {
                // si c'est bon, on insert les informations du formulaire dans la base de données
                $req = $bdd->prepare("INSERT INTO users(nom, prenom,email,contact, password) VALUES (?,?,?,?,?)");
                $req->execute(array($nom, $prenom,$email,$contact,$passwordHash));
                
                echo 'Inscription réussie';
          }else{
          echo 'Mot de passe au moins 8 caractères !';
        }
      }
    }else {
     echo 'Veillez remplir tous les champs !';
    }
}


?>