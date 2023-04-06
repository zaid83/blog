<?php
/**
 * Return connexion to database;
 * @return PDO
 */

function getPdo(): PDO
{
  $pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);

  return $pdo;
}

/***
 * USERS
 */

/**
 * Find All Users
 */
function findAllUsers()
{
  $pdo = getPdo();
  $showUsers = $pdo->prepare("SELECT * from users INNER JOIN roles r ON r.id_role = users.role_user ORDER BY pseudo ASC");
  $showUsers->execute();
  $listusers = $showUsers->fetchAll();
  return $listusers;

}


function countAllUsers()
{
  $pdo = getPdo();
  $nbusers = $pdo->prepare("SELECT * from users");
  $nbusers->execute();
  $nbusers = $nbusers->rowCount();
  return $nbusers;
}




/**
 * Select User to Edit
 */
function findUser($iduser)
{
  $pdo = getPdo();
  $resultats = $pdo->prepare("SELECT * from users  WHERE id = :user_id");
  $resultats->execute(['user_id' => $iduser]);
  $user = $resultats->fetch();
  return $user;
}

/**
 * Update User
 */

function updateUser($pseudo, $email, $user_id, $avatar)
{
  $pdo = getPdo();
  $query = $pdo->prepare('UPDATE users SET pseudo = :pseudo, email = :email, avatar = :avatar  WHERE id = :user_id ');
  $query->execute(compact('pseudo', 'email', 'user_id', 'avatar'));
}

/**
 * Update User with roles
 */

function updateUserRoles($pseudo, $email, $user_id, $avatar, $role_id)
{
  $pdo = getPdo();
  $query2 = $pdo->prepare('UPDATE users SET pseudo = :pseudo, email = :email, avatar = :avatar, role_user = :role_id  WHERE id = :user_id ');
  $query2->execute(compact('pseudo', 'email', 'user_id', 'avatar', 'role_id'));
}



/**
 * Select All roles
 */
function findRoles()
{
  $pdo = getPdo();
  $res = $pdo->prepare("SELECT * from roles");
  $res->execute();
  $allroles = $res->fetchAll();
  return $allroles;
}


/**
 * Sign up User
 * 
 */

function addUser(string $pseudo, string $password, string $email, string $token): void
{
  $pdo = getPdo();
  $insert = $pdo->prepare("
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

function connectUser(string $email)
{
  $pdo = getPdo();
  $login = $pdo->prepare('SELECT * FROM users WHERE email = :email');
  $login->bindValue('email', $email);
  $login->execute();
  $res = $login->fetch(PDO::FETCH_ASSOC);
  return $res;
}