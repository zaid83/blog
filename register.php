<?php


require('models/database.php');

$message = '';

if (isset($_POST["pseudo"]) && isset($_POST["email"])) {


    function valid_donnees($donnees)
    {
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }

    $pseudo = valid_donnees($_POST["pseudo"]);
    $email = valid_donnees($_POST["email"]);
    $password = $_POST["password"];
    $token = uniqid();


    if (isset($_POST["submit"])) {

        if (empty($pseudo) || empty($email) || empty($password)) {
            $message = 'Un des champs est vide';
        } else if (strlen($pseudo) >= 20 || strlen($pseudo) <= 4) {
            $message = "Le pseudo doit faire entre 4 et 20 caractères";
        } else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $insert = $pdo->prepare("
                INSERT INTO users(pseudo, password, email, token)
                VALUES(:pseudo, :password, :email, :token)");
            $insert->bindParam(':pseudo', $pseudo);
            $insert->bindParam(':password', $password);
            $insert->bindParam(':email', $email);
            $insert->bindParam(':token', $token);
            $insert->execute();
            //On renvoie l'utilisateur vers la page de remerciement
            header("Location:login.php");
        }
    }
}



$pageTitle = "Inscription";
ob_start();
require('templates/login/register.html.php');
$pageContent = ob_get_clean();



require('templates/layout.html.php');