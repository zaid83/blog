<?php
session_start();

if ($_SESSION['id']) {

    require('libraries/utils.php');
    require_once('libraries/models/Article.php');
    $message = '';

    $articleModel = new Article();
    $user_id = $_SESSION['id'];

    if (isset($_POST["title"]) && isset($_POST["content"])) {


        // post Image
        $name_image = 'img_article';
        require('recupImage.php');

        //security
        $author = $_SESSION['id'];
        $title = htmlspecialchars($_POST["title"]);
        $content = htmlspecialchars($_POST["content"]);


        if (isset($_POST["submit"])) {

            if (empty($title) || empty($content)) {
                $message = 'Un des champs est vide';

            } else if (strlen($title) >= 80) {
                $message = "Le titre fait plus de 80 caractères";
            } else if (strlen($content) <= 200) {
                $message = "L'article fait moins de 200 caractères";
            } else if (!in_array($extension, $tabExtension) && $size > $tailleMax && $error > 1) {
                $message = "L'image est pas valable";

            } else {
                $uniqueName = uniqid('', true);
                $file = $uniqueName . "." . $extension;
                $img_article = $file;
                move_uploaded_file($tmp_name, "public/assets/img/articles/$file");

                $articleModel->add($title, $img_article, $content, $author);
                redirect("index.php");
            }
        }
    }
}



$pageTitle = "Poster un article";

renderHTML("templates/articles/postArticle.html", compact('pageTitle', 'message'));





?>