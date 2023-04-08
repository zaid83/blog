<?php

require('libraries/utils.php');
require_once('libraries/autoload.php');

session_start();

$articleModel = new Article();
$article_id = null;
$message = '';

// Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
if (!empty($_GET['article_id']) && ctype_digit($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
}

//recuperer l'article à éditer
$article = $articleModel->find($article_id);

//update l'article 
if (isset($_POST["title"]) && isset($_POST["content"])) {


    $title = htmlspecialchars($_POST["title"]);
    $content = htmlspecialchars($_POST["content"]);




    if (isset($_POST["submit"])) {

        // if you are not in Page of Validations
        if (!isset($_GET['validate'])) {
            // post Image
            $name_image = 'img_article';
            require('recupImage.php');

            //if you are a user and want edit your not valid article 
            if ($_SESSION['role'] == 1) {
                $uniqueName = uniqid('', true);
                $file = $uniqueName . "." . $extension;
                $img_article = $file;
                move_uploaded_file($tmp_name, "public/assets/img/articles/$file");
                $articleModel->edit($title, $img_article, $content, $article_id);
                redirect("mesArticles.php");

            } else {

                if (in_array($extension, $tabExtension) && $size <= $tailleMax && $error == 0) {
                    $uniqueName = uniqid('', true);
                    $file = $uniqueName . "." . $extension;
                    $img_article = $file;
                    move_uploaded_file($tmp_name, "public/assets/img/articles/$file");
                    $articleModel->update($title, $img_article, $content, $article_id);
                    redirect("mesArticles.php");
                } else {
                    $message = 'Veuillez uploadez une image avec une taille inférieure à 4MO';
                }
            }
        }
        // if you are in PAge of Validations
        else {
            $img_article = $_POST['img_article'];
            $articleModel->update($title, $img_article, $content, $article_id);
            redirect("index.php");

        }
    }



    if (isset($_POST["submit3"]) && $_SESSION['role'] > 1 && isset($_GET['validate'])) {

        $img_article = $_POST['img_article'];
        //renvoyer l'article 
        $signal = htmlspecialchars($_POST["sign_article"]);
        $articleModel->resend($title, $img_article, $content, $article_id, $signal);
        redirect("index.php");
    }





}


$pageTitle = "Publier un Article";
renderHTML('templates/articles/editArticle.html', compact('article', 'pageTitle', 'message'));



?>