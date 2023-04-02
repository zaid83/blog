<?php


require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
session_start();
if (isset($_GET['type'], $_GET['id']) and !empty($_GET['type']) and !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['type'];
    $sessionid = $_SESSION['id'];
    $check = $pdo->prepare('SELECT id_article FROM articles WHERE id_article = ?');
    $check->execute(array($getid));
    if ($check->rowCount() == 1) {
        if ($gett == 1) {
            $check_like = $pdo->prepare('SELECT id_article FROM like_article WHERE id_article = ? AND id_user = ?');
            $check_like->execute(array($getid, $sessionid));
            $del = $pdo->prepare('DELETE FROM dislike WHERE id_article = ? AND id_user = ?');
            $del->execute(array($getid, $sessionid));
            if ($check_like->rowCount() == 1) {
                $del = $pdo->prepare('DELETE FROM like_article WHERE id_article = ? AND id_user = ?');
                $del->execute(array($getid, $sessionid));
            } else {
                $ins = $pdo->prepare('INSERT INTO like_article (id_article, id_user) VALUES (?, ?)');
                $ins->execute(array($getid, $sessionid));
            }

        } elseif ($gett == 2) {
            $check_like = $pdo->prepare('SELECT id_article FROM dislike WHERE id_article = ? AND id_user = ?');
            $check_like->execute(array($getid, $sessionid));
            $del = $pdo->prepare('DELETE FROM like_article WHERE id_article = ? AND id_user = ?');
            $del->execute(array($getid, $sessionid));
            if ($check_like->rowCount() == 1) {
                $del = $pdo->prepare('DELETE FROM dislike WHERE id_article = ? AND id_user = ?');
                $del->execute(array($getid, $sessionid));
            } else {
                $ins = $pdo->prepare('INSERT INTO dislike (id_article, id_user) VALUES (?, ?)');
                $ins->execute(array($getid, $sessionid));
            }
        }
        header('Location: article.php?article_id=' . $getid);
    } else {
        exit('Erreur fatale. <a href="index.php">Revenir à l\'accueil</a>');
    }
} else {
    exit('Erreur fatale. <a href="index.php">Revenir à l\'accueil</a>');
}











?>