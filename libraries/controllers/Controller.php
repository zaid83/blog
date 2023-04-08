<?php
namespace Controllers;

class Controller
{
    protected $article_id;
    protected $model;
    protected $modelName;

    public function __construct()
    {

        if (!empty($_GET['article_id']) && ctype_digit($_GET['article_id'])) {
            $this->article_id = $_GET['article_id'];
        }
        $this->model = new $this->modelName();
    }
}