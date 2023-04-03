<?php

session_start();


require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();

$article_id = null;

// Mais si il y'en a un et que c'est un nombre entier
if (!empty($_GET['article_id']) && ctype_digit($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
}

// Recuperer l'article en question
$article = findArticle($article_id);


// Compter le nombre de like
$likes = countLikes($article_id);

//Compter le nombre de dislikes
$dislikes = countDislikes($article_id);


if(isset($_SESSION['id'])){
//Voir si l'article est liké
 $check_like = checkLike($article_id, $_SESSION['id']);

//Voir si l'article est non liké
$check_dislike = checkDislike($article_id, $_SESSION['id']);

//Voir si l'article est en favori
$checkfav = checkFav($article_id, $_SESSION['id']);

}

$pageTitle = $article['title'];



renderHTML('templates/articles/article.html',
compact('article','likes','dislikes','check_like', 'check_dislike', 'checkfav','pageTitle'));
require('comments.php');
?>