<?php

require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
session_start();

//tous les articles

$showArticles = $pdo->prepare("SELECT * from articles INNER JOIN states s ON s.id_valid = articles.valid ORDER BY date_article DESC");
$showArticles->execute();
$listarticles = $showArticles->fetchAll();

//nb articles
$nbArticles = $pdo->prepare("SELECT * from comments");
$nbArticles->execute();
$nbArticles = $nbArticles->rowCount();

//tous les users

$showUsers = $pdo->prepare("SELECT * from users INNER JOIN roles r ON r.id_role = users.role_user ORDER BY pseudo ASC");
$showUsers->execute();
$listusers = $showUsers->fetchAll();

//nb utilisateurs
$nbUsers = $pdo->prepare("SELECT * from users");
$nbUsers->execute();
$nbUsers = $nbUsers->rowCount();

//tous les comments
$showComs = $pdo->prepare("SELECT * from comments c JOIN users u ON u.id = c.id_user JOIN articles a ON a.id_article = c.id_article");
$showComs->execute();
$listComs = $showComs->fetchAll();

//nb comments
$nbComs = $pdo->prepare("SELECT * from comments");
$nbComs->execute();
$nbComs = $nbComs->rowCount();


$pageTitle = "Administrateur";
$subheading = "Controle Admin";

renderHTML(
    'templates/login/admin.html',
    compact('articles')
);

?>