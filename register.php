<?php


require('libraries/database.php');
require('libraries/utils.php');
$pdo = getPdo();

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
    $password2 = $_POST["password2"];
    $token = uniqid();
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (isset($_POST["submit"])) {

        $compare = $pdo->prepare('SELECT email FROM users WHERE email = ?');
        $compare->execute([$email]);
        $res = $compare->fetchAll(PDO::FETCH_ASSOC);

        $compare2 = $pdo->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $compare2->execute([$pseudo]);
        $res2 = $compare2->fetchAll(PDO::FETCH_ASSOC);


        // VERIFICATIONS
        if ($res) {
            $message = "Mail dejà existant";
        } else if ($res2) {
            $message = "Pseudo dejà existant";
        } else if (empty($pseudo) || empty($email) || empty($password)) {
            $message = 'Un des champs est vide';
        } else if (strlen($pseudo) >= 10 || strlen($pseudo) <= 4) {
            $message = "Le pseudo doit faire entre 4 et 10 caractères";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Ceci n'est pas une adresse email valide";
        } else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $message = "Ce password doit avoir au moins une majuscule, une minuscule, un nombre, un caratère speciale et dépasser 8 caractères";
        } else if ($password != $password2) {
            $message = "Les mots de passe ne matchent pas";
        }




        // INSERT TO DB
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
    
            header("Location:login.php");
        
}

}




$pageTitle = "Inscription";
renderHTML('templates/login/register.html',
compact('pageTitle','message'));