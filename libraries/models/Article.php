<?php

namespace Models;

require_once('libraries/models/Model.php');


class Article extends Model
{

    protected $table = "articles";
    protected $where = "id_article";




    /**
     * Return all valid articles
     * @return array
     */

    public function findAllValid()
    {

        $resultats = $this->pdo->query("SELECT * from articles JOIN users ON users.id = articles.author WHERE valid = 1 ORDER BY date_article DESC");
        $articles = $resultats->fetchAll();
        return $articles;
    }


    /**
     *  Return one article
     * @return array
     */


    public function find(int $id)
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

    public function select(int $id)
    {

        $resultats = $this->pdo->prepare("SELECT * from articles JOIN users ON users.id = articles.author WHERE id_article = :article_id");
        $resultats->execute(['article_id' => $id]);
        return $resultats;
    }



    /**
     *  Update article
     *@return void
     */

    public function update(string $title, string $img_article, string $content, int $article_id)
    {

        $query = $this->pdo->prepare('UPDATE articles SET title = :title, img_article = :img_article, content = :content, date_article = NOW(), valid = 1 WHERE id_article = :article_id ');
        $query->execute(compact('title', 'img_article', 'content', 'article_id'));
    }




    /**
     * return list of articles by user
     * @return array
     */

    public function findAllByUser(int $userid)
    {

        $resultats = $this->pdo->prepare("SELECT * from articles INNER JOIN states s ON s.id_valid = articles.valid  WHERE author = ? ORDER BY date_article DESC");
        $resultats->execute([$userid]);
        $listarticles = $resultats->fetchAll();
        return $listarticles;
    }

    /**
     * Add new article
     * @return void
     */
    public function add(string $title, string $img_article, string $content, string $author)
    {

        $query = $this->pdo->prepare('INSERT INTO articles SET title = :title, img_article = :img_article, content = :content, date_article = NOW(), author = :author');
        $query->execute(compact('title', 'img_article', 'content', 'author'));
    }

    /**
     * Resend article
     * @return void
     */
    public function resend(string $title, string $img_article, string $content, int $article_id, string $signal)
    {

        $query = $this->pdo->prepare('UPDATE articles SET title = :title, img_article = :img_article, content = :content, date_article = NOW(), valid = 2, Signalements = :signal WHERE id_article = :article_id ');
        $query->execute(compact('title', 'img_article', 'content', 'article_id', 'signal'));
    }


    /**
     * Edit article
     * @return void
     */
    public function edit(string $title, string $img_article, string $content, int $article_id)
    {

        $query = $this->pdo->prepare('UPDATE articles SET title = :title, img_article = :img_article, content = :content, date_article = NOW(), valid = 3 WHERE id_article = :article_id ');
        $query->execute(compact('title', 'img_article', 'content', 'article_id'));
    }

    /**
     * Find articles in validation
     * 
     */
    public function inValidation()
    {
        $resultats = $this->pdo->query("SELECT * from articles JOIN users ON users.id = articles.author WHERE valid = 3");
        $articles = $resultats->fetchAll();
        return $articles;
    }
}