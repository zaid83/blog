<?php

session_start();


require_once('libraries/utils.php');
require_once('libraries/models/Article.php');
require_once('libraries/models/Comment.php');
require_once('libraries/models/Like.php');
require_once('libraries/models/Dislike.php');
require_once('libraries/models/Favourite.php');

$articleModel = new Article();
$commentModel = new Comment();
$likeArticle = new Like();
$dislikeArticle = new Dislike();
$favArticle = new Favourite();

$article_id = null;

// Mais si il y'en a un et que c'est un nombre entier
if (!empty($_GET['article_id']) && ctype_digit($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
}

// Recuperer l'article en question
$article = $articleModel->find($article_id);


// Compter le nombre de like
$likes = $likeArticle->count($article_id);

//Compter le nombre de dislikes
$dislikes = $dislikeArticle->count($article_id);
$check_like = '';
$check_dislike = '';
$checkfav = '';

if (isset($_SESSION['id'])) {
    //Voir si l'article est liké
    $check_like = $likeArticle->check($article_id, $_SESSION['id']);

    //Voir si l'article est non liké
    $check_dislike = $dislikeArticle->check($article_id, $_SESSION['id']);

    //Voir si l'article est en favori
    $checkfav = $favArticle->check($article_id, $_SESSION['id']);

}

$pageTitle = $article['title'];



renderHTML(
    'templates/articles/article.html',
    compact('article', 'likes', 'dislikes', 'check_like', 'check_dislike', 'checkfav', 'pageTitle')
);
require('comments.php');
?>