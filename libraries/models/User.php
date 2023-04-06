<?php

require_once('libraries/models/Model.php');
class User extends Model
{
    protected $table = "users";
    protected $where = "id";
    /**
     * Find All Users
     */
    public function findAll()
    {

        $showUsers = $this->pdo->prepare("SELECT * from users INNER JOIN roles r ON r.id_role = users.role_user ORDER BY pseudo ASC");
        $showUsers->execute();
        $listusers = $showUsers->fetchAll();
        return $listusers;

    }


    public function countAll()
    {

        $nbusers = $this->pdo->prepare("SELECT * from users");
        $nbusers->execute();
        $nbusers = $nbusers->rowCount();
        return $nbusers;
    }




    /**
     * Select User to Edit
     */
    public function find($iduser)
    {

        $resultats = $this->pdo->prepare("SELECT * from users  WHERE id = :user_id");
        $resultats->execute(['user_id' => $iduser]);
        $user = $resultats->fetch();
        return $user;
    }

    /**
     * Update User
     */

    public function update($pseudo, $email, $user_id, $avatar)
    {

        $query = $this->pdo->prepare('UPDATE users SET pseudo = :pseudo, email = :email, avatar = :avatar  WHERE id = :user_id ');
        $query->execute(compact('pseudo', 'email', 'user_id', 'avatar'));
    }

    /**
     * Update User with roles
     */

    public function updateRoles($pseudo, $email, $user_id, $avatar, $role_id)
    {

        $query2 = $this->pdo->prepare('UPDATE users SET pseudo = :pseudo, email = :email, avatar = :avatar, role_user = :role_id  WHERE id = :user_id ');
        $query2->execute(compact('pseudo', 'email', 'user_id', 'avatar', 'role_id'));
    }



    /**
     * Select All roles
     */
    public function findRoles()
    {

        $res = $this->pdo->prepare("SELECT * from roles");
        $res->execute();
        $allroles = $res->fetchAll();
        return $allroles;
    }


    /**
     * Sign up User
     * 
     */

    public function add(string $pseudo, string $password, string $email, string $token): void
    {

        $insert = $this->pdo->prepare("
INSERT INTO users(pseudo, password, email, token)
VALUES(:pseudo, :password, :email, :token)");
        $insert->bindParam(':pseudo', $pseudo);
        $insert->bindParam(':password', $password);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':token', $token);
        $insert->execute();

    }



    /**
     * Sign in User
     * 
     */

    public function connect(string $email)
    {

        $login = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $login->bindValue('email', $email);
        $login->execute();
        $res = $login->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function check($column, $params)
    {

        $compare = $this->pdo->prepare('SELECT ' . $column . ' FROM users WHERE ' . $column . ' = ?');
        $compare->execute([$params]);
        $res = $compare->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


}