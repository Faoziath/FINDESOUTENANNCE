<?php
if(isset ($_POST['submit'])){


    $nom = $_POST['noms'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $contacts = $_POST['contacts'];
    $password = $_POST['password'];


    if(!empty($_POST['noms']) && $_POST['prenom'] && $_POST ['email'] && $_POST['contacts']&& $_POST ['password'] ){

        try{

            $connect = new PDO("mysql:host=localhost;dbname=agri-sem","root","");
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO inscription(noms,prenom,email,contacts,password)
            VALUES ('$_POST[noms]', '$_POST[prenom]', '$_POST[email]', '$_POST[contacts]', '$_POST[password]')";
            $requete =$connect->prepare($sql);
            $requete->execute();


        }catch(PDOException $e) {
            echo "Error: ".$e-> getMessage();
        }
        echo "Votre message a été recu";
    } else {
        echo "Message non parvenu";
    }

}
?>
