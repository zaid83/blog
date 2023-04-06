<?php
require_once('libraries/database.php');

class ModelLike
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = getPdo();
    }

    /***
     * Verifiy if is was dislike or like
     */

    public function check($article, $user)
    {
        $check = $this->pdo->prepare("SELECT id_article FROM {$this->table} WHERE id_article = ? AND id_user = ?");
        $check->execute(array($article, $user));
        return $check;
    }


    /**
     * Count dislikes or likes
     *@return int
     */

    public function count($id)
    {
        $count = $this->pdo->prepare("SELECT id_article FROM {$this->table} WHERE id_article = ?");
        $count->execute([$id]);
        $count = $count->rowCount();
        return $count;
    }


    /**
     * Insert Likes or Dislikes
     */
    public function insert(int $article, int $user)
    {

        $ins = $this->pdo->prepare("INSERT INTO {$this->table} (id_article, id_user) VALUES (?, ?)");
        $ins->execute(array($article, $user));
    }



    /**
     * Delete likes or dislikes
     * 
     */
    public function del(int $article, int $user)
    {

        $del = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id_article = ? AND id_user = ?");
        $del->execute(array($article, $user));
    }


}