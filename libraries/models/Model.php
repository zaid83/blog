<?php
require_once('libraries/database.php');

abstract class Model
{
    protected $pdo;
    protected $table;
    protected $supprime;
    protected $where;

    public function __construct()
    {
        $this->pdo = getPdo();
    }



    /***
     * List all articles, comments or users
     */

    public function findAll()
    {

        if ($this->table == 'comments') {
            $showAll = $this->pdo->prepare("SELECT * from {$this->table} JOIN users  ON users.id = comments.id_user JOIN articles  ON articles.id_article = comments.id_article");
        }
        if ($this->table == 'articles') {
            $showAll = $this->pdo->query("SELECT * from {$this->table} a JOIN states s ON a.valid = s.id_valid ORDER BY date_article DESC");


        }
        if ($this->table == 'users') {
            $showAll = $this->pdo->prepare("SELECT * from {$this->table} INNER JOIN roles r ON r.id_role = users.role_user ORDER BY pseudo ASC");
        }
        $showAll->execute();
        $listAll = $showAll->fetchAll();
        return $listAll;

    }


    public function del(int $supprime)
    {
        $del = $this->pdo->prepare("DELETE FROM  {$this->table} WHERE {$this->where} = ?");
        $del->execute([$supprime]);
    }

    /** *
     * NB Comments,articles or users
     */

    public function countAll()
    {
        //Nb comments
        $nb = $this->pdo->prepare("SELECT * from {$this->table}");
        $nb->execute();
        $nb = $nb->rowCount();
        return $nb;
    }

}