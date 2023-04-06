<?php
require_once('libraries/database.php');

class Model
{
    protected $pdo;
    protected $table;
    protected $supprime;
    protected $where;

    public function __construct()
    {
        $this->pdo = getPdo();
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