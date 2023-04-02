<?php

require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
session_start();


$user_id = $_GET['id'];
$message = '';

//recuperer l'article à éditer
$resultats = $pdo->prepare("SELECT * from users  WHERE id = :user_id");
$resultats->execute(['user_id' => $user_id]);
$user = $resultats->fetch();

$res = $pdo->prepare("SELECT * from roles");
$res->execute();
$allroles = $res->fetchAll();



//update l'article 
if (isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["password"])) {

    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $avatar = htmlspecialchars($_POST["avatar"]);

    if (isset($_POST["submit"]) && $_SESSION['role'] < 3) {
        $passwordHash = $user['password'];

        if (!empty($pseudo) || !empty($email) || !empty($password)) {
            if (password_verify($password, $passwordHash)) {
                $query = $pdo->prepare('UPDATE users SET pseudo = :pseudo, email = :email, avatar = :avatar  WHERE id = :user_id ');
                $query->execute(compact('pseudo', 'email', 'user_id', 'avatar'));
                header("Location:index.php");
            } else {
                $message = "Mauvais mot de passe";

            }
        } else {
            $message = "Un des champs est vide";

        }
    } else {

        $role_id = $_POST["role"];
        var_dump($role_id);
        if (isset($_POST["submitAdmin"])) {

            if (!empty($pseudo) || !empty($email)) {
                $query2 = $pdo->prepare('UPDATE users SET pseudo = :pseudo, email = :email, avatar = :avatar, role_user = :role_id  WHERE id = :user_id ');
                $query2->execute(compact('pseudo', 'email', 'user_id', 'avatar', 'role_id'));
                header("Location:admin.php");

            } else {
                $message = "Un des champs est vide";
            }
        }
    }
}




$pageTitle = "Profil";
ob_start();
require('templates/login/profil.html.php');
$pageContent = ob_get_clean();



require('templates/layout.html.php');