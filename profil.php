<?php

require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
session_start();


$user_id = $_GET['id'];
$message = '';

//recuperer le profil à éditer
$user = findUser($user_id);

//recuperer les roles
$allroles = findRoles();



//update le profil
if (isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["password"])) {

    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $avatar = htmlspecialchars($_POST["avatar"]);

    if (isset($_POST["submit"]) && $_SESSION['role'] < 3) {
        $passwordHash = $user['password'];

        if (!empty($pseudo) || !empty($email) || !empty($password)) {
            if (password_verify($password, $passwordHash)) {
                updateUser($pseudo, $email, $user_id, $avatar);
                $user = findUser($user_id);
                redirect("index.php");
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
                updateUserRoles($pseudo, $email, $user_id, $avatar, $role_id);
                $user = findUser($user_id);
                redirect("admin.php");

            } else {
                $message = "Un des champs est vide";
            }
        }
    }
}




$pageTitle = "Profil";
renderHTML(
    'templates/login/profil.html',
    compact('pageTitle', 'user', 'message', 'allroles')
);