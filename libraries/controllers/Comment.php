<?php

namespace Controllers;

class Comment extends Controller
{
    protected $modelName = \MODELS\Comment::class;

    public function postComment()
    {

        if (isset($_POST['submit_commentaire'])) {
            if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
                $user_id = $_SESSION['id'];
                $commentaire = htmlspecialchars($_POST['commentaire']);
                if (strlen($commentaire) > 5) {

                    $this->model->add($user_id, $this->article_id, $commentaire);
                    $msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
                } else {
                    $msg = "<span style='color:red'>Le commentaire doit faire au moins de 5 caractères </span>";
                }
            } else {
                $msg = " <span style='color:red'>Le champs de commentaire est vide </span>";
            }
        }
    }

    public function renderComment()
    {

        //nb of comments
        $nbcomments = $this->model->countByArticle($this->article_id);

        //render comments 
        $comments = $this->model->findByArticle($this->article_id);


        require('templates/comments/comments.html.php');
    }

    public function delComment()
    {
        if (isset($_GET['supprime_coms'])) {
            $this->model->del($_GET['supprime_coms']);
            \Http::redirect('/blog/user/allList');
        }
    }

    public function delCommentByID(){

        if (isset($_GET['supprime_coms']))  {
            $this->model->delCommentByID($_GET['supprime_coms']);
            \Http::redirect('/blog/index.php');
            
        }
    }
}
