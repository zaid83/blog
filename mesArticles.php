<?php
session_start();


require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
$sessionid = $_SESSION['id'];


// FIND ALL ARTICLES BY USER
$listarticles = findAllArticlesByUser($sessionid);


if ($listarticles) {
$pageTitle = "Mes Articles";
$subheading = "liste de mes articles";
$pageTitle2 = "Liste de mes articles";


renderHTML('templates/articles/mesArticles.html',
compact('pageTitle','subheading', 'pageTitle2', 'listarticles'));

}else {
renderHTML('noArticles');
}
