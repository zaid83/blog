<?php


require('models/database.php');

$article_id = null;

// Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
if (!empty($_GET['article_id']) && ctype_digit($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
}

if (isset($_POST['submit_commentaire'])) {
    if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
        $user_id = $_SESSION['id'];
        $commentaire = htmlspecialchars($_POST['commentaire']);
        if (strlen($commentaire) > 5) {
            $ins = $pdo->prepare('INSERT INTO comments (id_user, id_article, comments, date_comment) VALUES (?,?,?, NOW())');
            $ins->execute(array($user_id, $article_id, $commentaire));
            $msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";

        } else {
            $msg = "<span style='color:red'>Le commentaire doit faire au moins de 5 caractères </span>";
        }
    } else {
        $msg = " <span style='color:red'>Le champs de commentaire est vide </span>";
    }
}


$count = $pdo->prepare('SELECT COUNT(id_comment) as nbComments from comments WHERE id_article = :article_id');
$count->execute(['article_id' => $article_id]);
$nbcomments = $count->fetch();

$resultats = $pdo->prepare("SELECT * from comments c JOIN users u ON u.id = c.id_user WHERE id_article = :article_id");
$resultats->execute(['article_id' => $article_id]);
$comments = $resultats->fetchAll();



require('templates/comments/comments.html.php');



?>