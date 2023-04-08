<?php

require_once("libraries/utils.php");
require_once('libraries/autoload.php');

$userModel = new User();

$message = "";
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $userModel->connect($email);

    if ($res) {

        $passwordHash = $res['password'];
        if (password_verify($password, $passwordHash)) {

            session_start();

            $_SESSION['id'] = $res['id'];
            $_SESSION['pseudo'] = $res['pseudo'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['avatar'] = $res['avatar'];
            $_SESSION['token'] = $res['token'];
            $_SESSION['role'] = $res['role_user'];


            redirect('index.php');
        } else {
            $message = "Mot de passe invalide";
        }
    } else {
        $message = "Identifiants invalides";
    }
}


$pageTitle = "Connexion";

renderHTML(
    'templates/login/login.html',
    compact('message', 'pageTitle')
);

?>