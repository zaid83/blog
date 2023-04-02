<?php



$supprime = $_GET['supprime'];
$del = $pdo->prepare('DELETE FROM articles WHERE id_articles = ?');
$del->execute([$article_id]);


?>