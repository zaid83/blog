<?php

require_once('libraries/models/Model.php');
class Comment extends Model
{

    /***
     * Find All Comments
     */

    public function findAllComments()
    {
        $showComs = $this->pdo->prepare("SELECT * from comments c JOIN users u ON u.id = c.id_user JOIN articles a ON a.id_article = c.id_article");
        $showComs->execute();
        $listComs = $showComs->fetchAll();
        return $listComs;
    }

    /** *
     * NB Comments
     */

    public function countComments()
    {
        //Nb comments
        $nbComs = $this->pdo->prepare("SELECT * from comments");
        $nbComs->execute();
        $nbComs = $nbComs->rowCount();
        return $nbComs;
    }


    /***
     * Add comments
     */

    public function addComments(int $user, int $article, string $comments): void
    {
        $ins = $this->pdo->prepare('INSERT INTO comments (id_user, id_article, comments, date_comment) VALUES (?,?,?, NOW())');
        $ins->execute(array($user, $article, $comments));
    }

    /***
     * Count comments by article
     *@return int
     */

    public function countCommentsByArticle(int $article)
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

    public function findCommentsByArticle(int $article)
    {
        $resultats = $this->pdo->prepare("SELECT * from comments c JOIN users u ON u.id = c.id_user WHERE id_article = :article_id");
        $resultats->execute(['article_id' => $article]);
        $comments = $resultats->fetchAll();
        return $comments;
    }

}