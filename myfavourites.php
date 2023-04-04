<?php
session_start();


require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
$sessionid = $_SESSION['id'];
$resultats = $pdo->prepare("SELECT * from favourites f INNER JOIN articles a ON a.id_article = f.id_article  JOIN users ON users.id = f.id_user  WHERE users.id = ? ORDER BY date_article DESC");
$resultats->execute([$sessionid]);
$articles = $resultats->fetchAll();
if ($articles) {
    $pageTitle = "Mes favoris";
    $subheading = "Liste de mes favoris";
    $pageTitle2 = "Liste de mes favoris";
    $pageFav = true;



    renderHTML(
        'templates/articles/myfavourites.html',
        compact('pageTitle', 'subheading', 'pageTitle2', 'pageFav', 'articles')
    );

} else {
    $error = "Pas de favoris";
    renderHTML('noArticles', compact('error'));
}