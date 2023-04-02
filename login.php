<?php
require_once("libraries/database.php");
require_once("libraries/utils.php");

$pdo = getPdo();
$message = "";
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $login->bindValue('email', $email);
    $login->execute();
    $res = $login->fetch(PDO::FETCH_ASSOC);

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