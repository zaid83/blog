<?php

require('libraries/database.php');
require('libraries/utils.php');

$pdo = getPdo();
session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $sessionid = $_SESSION['id'];
    $checkfav = $pdo->prepare('SELECT id_article FROM favourites WHERE id_user = ? AND id_article = ?');
    $checkfav->execute(array($_SESSION['id'], $getid));

    if ($checkfav->rowCount() == 1) {
        $del = $pdo->prepare('DELETE FROM favourites WHERE id_article = ? AND id_user = ?');
        $del->execute(array($getid, $sessionid));
        header('Location: article.php?article_id=' . $getid);
    } else {

        $ins = $pdo->prepare('INSERT INTO favourites (id_user, id_article) VALUES (?, ?)');
        $ins->execute(array($sessionid, $getid));
        header('Location: article.php?article_id=' . $getid);

    }
}