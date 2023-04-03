<?php

session_start();

require('models/database.php');

$article_id = null;

// Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
if (!empty($_GET['article_id']) && ctype_digit($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
}

// Recuperer l'article e question
$resultats = $pdo->prepare("SELECT * from articles JOIN users ON users.id = articles.author WHERE id_article = :article_id");
$resultats->execute(['article_id' => $article_id]);
$article = $resultats->fetch();




// Compter le nombre de like
$likes = $pdo->prepare('SELECT id_article FROM like_article WHERE id_article = ?');
$likes->execute(array($article['id_article']));
$likes = $likes->rowCount();
$dislikes = $pdo->prepare('SELECT id_article FROM dislike WHERE id_article = ?');
$dislikes->execute(array($article['id_article']));
$dislikes = $dislikes->rowCount();

//Voir si l'article est liké
if(isset($_SESSION['id'])){
$check_like = $pdo->prepare('SELECT id_article FROM like_article WHERE id_article = ? AND id_user = ?');
$check_like->execute(array($article_id, $_SESSION['id']));


//Voir si l'article est non liké

$check_dislike = $pdo->prepare('SELECT id_article FROM dislike WHERE id_article = ? AND id_user = ?');
$check_dislike->execute(array($article_id, $_SESSION['id']));


//Voir si l'article est en favori
$checkfav = $pdo->prepare('SELECT id_article FROM favourites WHERE id_user = ? AND id_article = ?');
$checkfav->execute(array($_SESSION['id'], $article_id));

}



$pageTitle = $article['title'];
ob_start();
require('templates/articles/article.html.php');
require('comments.php');
$pageContent = ob_get_clean();



require('templates/layout.html.php');

?>