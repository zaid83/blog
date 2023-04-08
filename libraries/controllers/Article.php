<?php

namespace Controllers;

class Article extends Controller
{
    protected $modelName = \MODELS\Article::class;

    public function index()
    {
        //SHOW ALL ARTICLES VALID

        //SELECT ALL VALID ARTICLES
        $articles = $this->model->findAllValid();
        // RENDER PAGE
        if ($articles) {
            $pageTitle = "Accueil";
            \Renderer::renderHTML(
                'templates/index.html',
                compact('articles', 'pageTitle')
            );
        } else {
            $error = "Pas d'articles";
            \Renderer::renderHTML('templates/articles/noArticles.html');
        }
    }

    public function showArticle()
    {

        $likeArticle = new \MODELS\Like();
        $dislikeArticle = new \MODELS\Dislike();
        $favArticle = new \MODELS\Favourite();

        // Recuperer l'article en question
        $article = $this->model->find($this->article_id);


        // Compter le nombre de like
        $likes = $likeArticle->count($this->article_id);

        //Compter le nombre de dislikes
        $dislikes = $dislikeArticle->count($this->article_id);
        $check_like = '';
        $check_dislike = '';
        $checkfav = '';

        if (isset($_SESSION['id'])) {
            //Voir si l'article est liké
            $check_like = $likeArticle->check($this->article_id, $_SESSION['id']);

            //Voir si l'article est non liké
            $check_dislike = $dislikeArticle->check($this->article_id, $_SESSION['id']);

            //Voir si l'article est en favori
            $checkfav = $favArticle->check($this->article_id, $_SESSION['id']);

        }

        $pageTitle = $article['title'];



        \Renderer::renderHTML(
            'templates/articles/article.html',
            compact('article', 'likes', 'dislikes', 'check_like', 'check_dislike', 'checkfav', 'pageTitle')
        );

    }

    public function likeArticle()
    {

        $likeArticle = new \MODELS\Like();
        $dislikeArticle = new \MODELS\Dislike();

        if (isset($_GET['type'], $_GET['id']) and !empty($_GET['type']) and !empty($_GET['id'])) {
            $getid = (int) $_GET['id'];
            $gett = (int) $_GET['type'];
            $sessionid = $_SESSION['id'];

            //find an article
            $check = $this->model->select($getid);

            // if exist
            if ($check->rowCount() == 1) {

                // if click on likes
                if ($gett == 1) {
                    $check_like = $likeArticle->check($getid, $sessionid);
                    $dislikeArticle->del($getid, $sessionid);

                    //if like exist
                    if ($check_like->rowCount() == 1) {
                        $dislikeArticle->del($getid, $sessionid);
                    } else {
                        $likeArticle->insert($getid, $sessionid);
                    }

                    // if click on dislikes
                } elseif ($gett == 2) {
                    $check_dislike = $dislikeArticle->check($getid, $sessionid);
                    $likeArticle->del($getid, $sessionid);
                    if ($check_dislike->rowCount() == 1) {
                        $dislikeArticle->del($getid, $sessionid);
                    } else {
                        $dislikeArticle->insert($getid, $sessionid);
                    }
                }
                \Http::redirect('article.php?article_id=' . $getid);
            } else {
                exit('Erreur fatale. <a href="index.php">Revenir à l\'accueil</a>');
            }
        } else {
            exit('Erreur fatale. <a href="index.php">Revenir à l\'accueil</a>');
        }


    }


    public function delArticle()
    {

        if (isset($_GET['supprime_article'])) {
            $articles = $this->model->find($_GET['supprime_article']);
            unlink("public/assets/img/articles/" . $articles['img_article'] . "");
            $this->model->del($_GET['supprime_article']);
            \Http::redirect('index.php');
        }
    }
}