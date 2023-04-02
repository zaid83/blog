<?php
require('models/database.php');

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
            echo "Connexion réussie !";
            session_start();

            $_SESSION['id'] = $res['id'];
            $_SESSION['pseudo'] = $res['pseudo'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['avatar'] = $res['avatar'];
            $_SESSION['token'] = $res['token'];
            $_SESSION['role'] = $res['role'];
            header("Location:index.php");
        } else {
            $message = "Identifiants invalides";
        }
    } else {
        $message = "Identifiants invalides";
    }
}


$pageTitle = "Connexion";
ob_start();
require('templates/login/login.html.php');
$pageContent = ob_get_clean();



require('templates/layout.html.php');

?>