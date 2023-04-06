<?php

$article_id = null;

if (!empty($_GET['article_id']) && ctype_digit($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
}

if (isset($_POST['submit_commentaire'])) {
    if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
        $user_id = $_SESSION['id'];
        $commentaire = htmlspecialchars($_POST['commentaire']);
        if (strlen($commentaire) > 5) {

            $commentModel->add($user_id, $article_id, $commentaire);
            $msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";

        } else {
            $msg = "<span style='color:red'>Le commentaire doit faire au moins de 5 caractères </span>";
        }
    } else {
        $msg = " <span style='color:red'>Le champs de commentaire est vide </span>";
    }
}

//nb of comments
$nbcomments = $commentModel->countByArticle($article_id);

//render comments 
$comments = $commentModel->findByArticle($article_id);


require('templates/comments/comments.html.php');

?>