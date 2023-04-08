<?php

require('libraries/utils.php');
require_once('libraries/autoload.php');
session_start();


$userModel = new User();

$user_id = $_GET['id'];
$message = '';

//recuperer le profil à éditer
$user = $userModel->find($user_id);

//recuperer les roles
$allroles = $userModel->findRoles();




//update le profil
if (isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["password"])) {


    //recupérer une image 
    $name_image = "avatar";
    require_once('recupImage.php');

    // sécurité
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);




    if (isset($_POST["submit"]) && $_SESSION['role'] < 3) {
        $passwordHash = $user['password'];

        if (!empty($pseudo) || !empty($email) || !empty($password)) {
            if (password_verify($password, $passwordHash)) {


                if (in_array($extension, $tabExtension) && $size <= $tailleMax && $error == 0) {
                    $file = $user_id . "." . $extension;
                    $avatar = $file;
                    move_uploaded_file($tmp_name, "public/assets/img/users/$file");

                    $userModel->update($pseudo, $email, $user_id, $avatar);
                    $user = $userModel->find($user_id);
                    redirect("index.php");
                } else {
                    $message = 'Veuillez uploadez une image avec une taille inférieure à 4MO';
                }
            } else {
                $message = "Mauvais mot de passe";

            }
        } else {
            $message = "Un des champs est vide";

        }
    } else {

        $role_id = $_POST["role"];
        if (isset($_POST["submitAdmin"])) {

            if (!empty($pseudo) || !empty($email)) {
                if (in_array($extension, $tabExtension) && $size <= $tailleMax && $error == 0) {
                    $file = $user_id . "." . $extension;
                    $avatar = $file;
                    move_uploaded_file($tmp_name, "public/assets/img/users/$file");
                    $userModel->updateRoles($pseudo, $email, $user_id, $avatar, $role_id);
                    $user = $userModel->find($user_id);
                    redirect("admin.php");
                } else {
                    $message = 'Veuillez uploadez une image avec une taille inférieure à 4MO';
                }

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