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
        $comArticle = new \CONTROLLERS\Comment();

        // Recuperer l'article en question
        $article = $this->model->find($this->article_id);

        if (!$article) {
            $errorPage = "404";
            \Renderer::renderError(compact('errorPage'));
        } else {

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

            $comArticle->postComment();
            $comArticle->renderComment();
        }
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
                        $likeArticle->del($getid, $sessionid);
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
                \Http::redirect("article/showArticle/$getid");
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
            \Http::redirect('/blog/index.php');
        }
    }

    public function postArticle()
    {
        if ($_SESSION['id']) {

            $message = '';
            $user_id = $_SESSION['id'];

            if (isset($_POST["title"]) && isset($_POST["content"])) {


                // post Image
                $upload = \UploadImg::upload('img_article');
                extract($upload);


                //security
                $author = $_SESSION['id'];
                $title = htmlspecialchars($_POST["title"]);
                $content = htmlspecialchars($_POST["content"]);


                if (isset($_POST["submit"])) {

                    if (empty($title) || empty($content)) {
                        $message = "<span style='color:orange'>Un des champs est vide</span>";
                    } else if (strlen($title) >= 80) {
                        $message = "<span style='color:orange'>Le titre fait plus de 80 caractères</span>";
                    } else if (strlen($content) <= 200) {
                        $message = "<span style='color:orange'>L'article fait moins de 200 caractères</span>";
                    } else if (!in_array($extension, $tabExtension) && $size > $tailleMax && $error > 1) {
                        $message = "<span style='color:orange'>L'image est pas valable</span>";
                    } else {
                        $uniqueName = uniqid('', true);
                        $file = $uniqueName . "." . $extension;
                        $img_article = $file;
                        move_uploaded_file($tmp_name, "public/assets/img/articles/$file");

                        $this->model->add($title, $img_article, $content, $author);
                        $message = "<span style='color:lightgreen'>L'artilce est en attente de validation </span>";
                        //  \Http::redirect("index.php");
                    }
                }
            }
        }



        $pageTitle = "Poster un article";

        \Renderer::renderHTML("templates/articles/postArticle.html", compact('pageTitle', 'message'));
    }

    public function validateArticle()
    {


        $articles = $this->model->inValidation();

        if ($_SESSION['role'] > 1) {
            if ($articles) {
                $pageTitle = "Validation des articles";
                \Renderer::renderHTML('templates/articles/validateArticle.html', compact('articles', 'pageTitle'));
            } else {
                $pageTitle = "Validation des articles";
                $error = "Pas d'articles à valider";
                \Renderer::renderHTML('templates/articles/noArticles.html', compact('error', 'pageTitle'));
            }
        } else {

            \Http::redirect('/blog/user/logout');
        }
    }

    public function editArticle()
    {

        $message = '';

        //Get article
        $article = $this->model->find($this->article_id);



        //update l'article 
        if (isset($_POST["title"]) && isset($_POST["content"])) {


            $title = htmlspecialchars($_POST["title"]);
            $content = htmlspecialchars($_POST["content"]);




            if (isset($_POST["submit"])) {

                // if you are not in Page of Validations
                if (!isset($_GET['validate'])) {
                    // post Image
                    $upload = \UploadImg::upload('img_article');
                    extract($upload);

                    //if you are a user and want edit your not valid article 
                    if ($_SESSION['role'] == 1) {
                        $uniqueName = uniqid('', true);
                        $file = $uniqueName . "." . $extension;
                        $img_article = $file;
                        move_uploaded_file($tmp_name, "public/assets/img/articles/$file");
                        $this->model->edit($title, $img_article, $content, $this->article_id);
                        \Http::redirect("/blog/article/listUser");
                    } else {

                        if (in_array($extension, $tabExtension) && $size <= $tailleMax && $error == 0) {
                            $uniqueName = uniqid('', true);
                            $file = $uniqueName . "." . $extension;
                            $img_article = $file;
                            move_uploaded_file($tmp_name, "public/assets/img/articles/$file");
                            $this->model->update($title, $img_article, $content, $this->article_id);
                            \Http::redirect("/blog/article/listUser");
                        } else {
                            $message = 'Veuillez uploadez une image avec une taille inférieure à 4MO';
                        }
                    }
                }
                // if you are in Page of Validations
                else {
                    $img_article = $_POST['img_article'];
                    $this->model->update($title, $img_article, $content, $this->article_id);
                    \Http::redirect("/blog/article/validateArticle");
                }
            }



            if (isset($_POST["submit3"]) && $_SESSION['role'] > 1 && isset($_GET['validate'])) {

                $img_article = $_POST['img_article'];
                //renvoyer l'article 
                $signal = htmlspecialchars($_POST["sign_article"]);
                $this->model->resend($title, $img_article, $content, $this->article_id, $signal);
                \Http::redirect("/blog/index.php");
            }
        }


        $pageTitle = "Publier un Article";
        \Renderer::renderHTML('templates/articles/editArticle.html', compact('article', 'pageTitle', 'message'));
    }

    public function listUser()
    {
        $sessionid = $_SESSION['id'];


        // FIND ALL ARTICLES BY USER
        $listarticles = $this->model->findAllByUser($sessionid);


        if ($listarticles) {
            $pageTitle = "Mes Articles";
            $subheading = "liste de mes articles";
            $pageTitle2 = "Liste de mes articles";



            \Renderer::renderHTML(
                'templates/articles/mesArticles.html',
                compact('pageTitle', 'subheading', 'pageTitle2', 'listarticles')
            );
        } else {
            $error = "Pas d'articles";
            \Renderer::renderHTML('templates/articles/noArticles.html', compact('error'));
        }
    }
}