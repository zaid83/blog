<?php

require_once('libraries/models/Model.php');
class Favourite extends Model
{


    /***
     * Render favourites
     */

    public function find(int $iduser)
    {

        $resultats = $this->pdo->prepare("SELECT * from favourites f INNER JOIN articles a ON a.id_article = f.id_article  JOIN users ON users.id = f.id_user  WHERE users.id = ? ORDER BY date_article DESC");
        $resultats->execute([$iduser]);
        $articles = $resultats->fetchAll();
        return $articles;
    }

    /***
     * Delete favourites
     */
    public function delFav(int $iduser, int $article)
    {

        $del = $this->pdo->prepare('DELETE FROM favourites WHERE id_article = ? AND id_user = ?');
        $del->execute(array($article, $iduser));
    }

    /***
     * Add favourites
     */
    public function add(int $iduser, int $article)
    {

        $ins = $this->pdo->prepare('INSERT INTO favourites (id_user, id_article) VALUES (?, ?)');
        $ins->execute(array($iduser, $article));
    }

    /**
     * Verify if article was favourite
     * 
     */

    public function check(int $article, int $user)
    {
        $pdo = getPdo();
        $checkfav = $pdo->prepare('SELECT id_article FROM favourites WHERE id_article = ? AND id_user = ?');
        $checkfav->execute(array($article, $user));
        return $checkfav;
    }




}