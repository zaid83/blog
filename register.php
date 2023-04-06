<?php

require('libraries/utils.php');
require_once('libraries/models/User.php');
$userModel = new User();

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
        // VERIFICATIONS



        $res = $userModel->check('email', $email);
        $res2 = $userModel->check('pseudo', $pseudo);



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
        else {

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $userModel->add($pseudo, $password, $email, $token);
            header("Location:login.php");

        }

    }
}


$pageTitle = "Inscription";
renderHTML(
    'templates/login/register.html',
    compact('pageTitle', 'message')
);