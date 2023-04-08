<?php

namespace Controllers;

class Favourite extends Controller
{

    protected $modelName = \MODELS\Favourite::class;

    public function addOrRemove()
    {


        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $getid = (int) $_GET['id'];
            $sessionid = $_SESSION['id'];
            $checkfav = $this->model->check($getid, $sessionid);

            if ($checkfav->rowCount() == 1) {
                $this->model->delFav($sessionid, $getid);
                \Http::redirect("index.php?controller=article&task=showArticle&article_id=" . $getid);
            } else {

                $this->model->add($sessionid, $getid);
                \Http::redirect('index.php?controller=article&task=showArticle&article_id=' . $getid);

            }
        }
    }

    public function list()
    {



        $sessionid = $_SESSION['id'];
        $articles = $this->model->find($sessionid);


        if ($articles) {
            $pageTitle = "Mes favoris";
            $subheading = "Liste de mes favoris";
            $pageTitle2 = "Liste de mes favoris";
            $pageFav = true;



            \Renderer::renderHTML(
                'templates/articles/myfavourites.html',
                compact('pageTitle', 'subheading', 'pageTitle2', 'pageFav', 'articles')
            );

        } else {
            $error = "Pas de favoris";
            \Renderer::renderHTML('templates/articles/noArticles.html', compact('error'));
        }
    }
}