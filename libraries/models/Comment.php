<?php

namespace Models;

require_once('libraries/models/Model.php');
class Comment extends Model
{


    protected $table = "comments";
    protected $where = "id_comment";


    /***
     * Add comments
     */

    public function add(int $user, int $article, string $comments): void
    {
        $ins = $this->pdo->prepare('INSERT INTO comments (id_user, id_article, comments, date_comment) VALUES (?,?,?, NOW())');
        $ins->execute(array($user, $article, $comments));
    }

    /***
     * Count comments by article
     *@return int
     */

    public function countByArticle(int $article)
    {
        $count = $this->pdo->prepare('SELECT COUNT(id_comment) as nbComments from comments WHERE id_article = :article_id');
        $count->execute(['article_id' => $article]);
        $nbcomments = $count->fetch();
        return $nbcomments;
    }

    /***
     * Render comments by article
     *@return array
     */

    public function findByArticle(int $article)
    {
        $resultats = $this->pdo->prepare("SELECT * from comments c JOIN users u ON u.id = c.id_user WHERE id_article = :article_id");
        $resultats->execute(['article_id' => $article]);
        $comments = $resultats->fetchAll();
        return $comments;
    }
}
