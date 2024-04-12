<?php
if(isset ($_POST['submit'])){


    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];


    if(!empty($_POST['nom']) && $_POST['email'] && $_POST ['objet'] && $_POST['message']){

        try{

            $connect = new PDO("mysql:host=localhost;dbname=agri-sem","root","");
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO contact(nom,email,objet,message)
            VALUES ('$_POST[nom]', '$_POST[email]', '$_POST[objet]', '$_POST[message]')";
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
