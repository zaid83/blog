<?php

namespace Models;


abstract class ModelLike
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    /**
     *Verifiy if is was dislike or like
     *@return bool
     */

    public function check(int $article, int $user)
    {
        $check = $this->pdo->prepare("SELECT id_article FROM {$this->table} WHERE id_article = ? AND id_user = ?");
        $check->execute(array($article, $user));
        return $check;
    }


    /**
     * Count dislikes or likes
     *@return int
     */

    public function count(int $id)
    {
        $count = $this->pdo->prepare("SELECT id_article FROM {$this->table} WHERE id_article = ?");
        $count->execute([$id]);
        $count = $count->rowCount();
        return $count;
    }


    /**
     * Insert Likes or Dislikes
     * @return void
     */
    public function insert(int $article, int $user)
    {

        $ins = $this->pdo->prepare("INSERT INTO {$this->table} (id_article, id_user) VALUES (?, ?)");
        $ins->execute(array($article, $user));
    }



    /**
     * Delete likes or dislikes
     * @return void
     */
    public function del(int $article, int $user)
    {

        $del = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id_article = ? AND id_user = ?");
        $del->execute(array($article, $user));
    }


}