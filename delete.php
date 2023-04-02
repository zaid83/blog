<?php

require('models/database.php');

if (isset($_GET['supprime_article'])) {
    $supprime = $_GET['supprime_article'];
    $del = $pdo->prepare('DELETE FROM articles WHERE id_article = ?');
    $del->execute([$supprime]);
    header('Location: admin.php');
}

if (isset($_GET['supprime_coms'])) {
    $supprime_comment = $_GET['supprime_coms'];
    $del = $pdo->prepare('DELETE FROM comments WHERE id_comment = ?');
    $del->execute([$supprime_comment]);
    header('Location: admin.php');
}
if (isset($_GET['supprime_user'])) {
    $supprime_user = $_GET['supprime_user'];
    $del = $pdo->prepare('DELETE FROM users WHERE id = ?');
    $del->execute([$supprime_user]);
    header('Location: admin.php');
}
?>