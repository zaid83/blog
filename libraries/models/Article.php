<?php

require_once('libraries/models/Model.php');
class Article extends Model
{

    /**
     * Return all articles
     * @return array
     */

    public function findAllArticles()
    {

        $resultats = $this->pdo->query("SELECT * from articles a JOIN states s ON a.valid = s.id_valid ORDER BY date_article DESC");
        $articles = $resultats->fetchAll();
        return $articles;
    }




    /**
     * Return all valid articles
     * @return array
     */

    public function findAllArticlesValid()
    {

        $resultats = $this->pdo->query("SELECT * from articles JOIN users ON users.id = articles.author WHERE valid = 1 ORDER BY date_article DESC");
        $articles = $resultats->fetchAll();
        return $articles;
    }


    public function findArticle(int $id)
    {

        $resultats = $this->pdo->prepare("SELECT * from articles JOIN users ON users.id = articles.author WHERE id_article = :article_id");
        $resultats->execute(['article_id' => $id]);
        $article = $resultats->fetch();
        return $article;
    }

    /**
     *  Find one article
     *
     */

    public function selectArticle(int $id)
    {

        $resultats = $this->pdo->prepare("SELECT * from articles JOIN users ON users.id = articles.author WHERE id_article = :article_id");
        $resultats->execute(['article_id' => $id]);
        return $resultats;
    }




    /**
     * Count all articles
     * 
     */

    public function countAllArticles()
    {

        $nbArticles = $this->pdo->prepare("SELECT * from articles");
        $nbArticles->execute();
        $nbArticles = $nbArticles->rowCount();
        return $nbArticles;
    }

    /**
     *  Return one article
     * @return array
     */




    /**
     *  Update article
     *
     */

    public function updateArticle($title, $img_article, $content, $article_id)
    {

        $query = $this->pdo->prepare('UPDATE articles SET title = :title, img_article = :img_article, content = :content, date_article = NOW(), valid = 1 WHERE id_article = :article_id ');
        $query->execute(compact('title', 'img_article', 'content', 'article_id'));
    }




    /***
     * return list of articles by user
     */

    public function findAllArticlesByUser($userid)
    {

        $resultats = $this->pdo->prepare("SELECT * from articles INNER JOIN states s ON s.id_valid = articles.valid  WHERE author = ? ORDER BY date_article DESC");
        $resultats->execute([$userid]);
        $listarticles = $resultats->fetchAll();
        return $listarticles;
    }

    /***
     * Add new article
     */
    public function addArticle($title, $img_article, $content, $author)
    {

        $query = $this->pdo->prepare('INSERT INTO articles SET title = :title, img_article = :img_article, content = :content, date_article = NOW(), author = :author');
        $query->execute(compact('title', 'img_article', 'content', 'author'));

    }

    /***
     * Resend article
     */
    public function resendArticle($title, $img_article, $content, $article_id, $signal)
    {

        $query = $this->pdo->prepare('UPDATE articles SET title = :title, img_article = :img_article, content = :content, date_article = NOW(), valid = 2, Signalements = :signal WHERE id_article = :article_id ');
        $query->execute(compact('title', 'img_article', 'content', 'article_id', 'signal'));

    }






}