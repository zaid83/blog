<?php
require_once('libraries/database.php');

class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = getPdo();
    }




    /***
     * Delete a Element
     */

    function deleteElement(int $supprime, string $table, string $id)
    {
        $pdo = getPdo();
        $del = $pdo->prepare('DELETE FROM ' . $table . ' WHERE ' . $id . ' = ?');
        $del->execute([$supprime]);

    }

}