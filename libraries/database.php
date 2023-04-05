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


/*****
 * ARTICLES
 */

/**
 * Return all valid articles
 * @return array
 */

function findAllArticlesValid()
{
  $pdo = getPdo();
  $resultats = $pdo->query("SELECT * from articles JOIN users ON users.id = articles.author WHERE valid = 1 ORDER BY date_article DESC");
  $articles = $resultats->fetchAll();
  return $articles;
}

/**
 *  Return one article
 * @return array
 */

function findArticle(int $id)
{
  $pdo = getPdo();
  $resultats = $pdo->prepare("SELECT * from articles JOIN users ON users.id = articles.author WHERE id_article = :article_id");
  $resultats->execute(['article_id' => $id]);
  $article = $resultats->fetch();
  return $article;
}

/**
 *  Update article
 *
 */

function updateArticle($title, $img_article, $content, $article_id)
{
  $pdo = getPdo();
  $query = $pdo->prepare('UPDATE articles SET title = :title, img_article = :img_article, content = :content, date_article = NOW(), valid = 1 WHERE id_article = :article_id ');
  $query->execute(compact('title', 'img_article', 'content', 'article_id'));
}




/***
 * return list of articles by user
 */

function findAllArticlesByUser($userid)
{
  $pdo = getPdo();
  $resultats = $pdo->prepare("SELECT * from articles INNER JOIN states s ON s.id_valid = articles.valid  WHERE author = ? ORDER BY date_article DESC");
  $resultats->execute([$userid]);
  $listarticles = $resultats->fetchAll();
  return $listarticles;
}

/***
 * Add new article
 */
function addArticle($title, $img_article, $content, $author)
{
  $pdo = getPdo();
  $query = $pdo->prepare('INSERT INTO articles SET title = :title, img_article = :img_article, content = :content, date_article = NOW(), author = :author');
  $query->execute(compact('title', 'img_article', 'content', 'author'));

}

/***
 * Resend article
 */
function resendArticle($title, $img_article, $content, $article_id, $signal)
{
  $pdo = getPdo();
  $query = $pdo->prepare('UPDATE articles SET title = :title, img_article = :img_article, content = :content, date_article = NOW(), valid = 2, Signalements = :signal WHERE id_article = :article_id ');
  $query->execute(compact('title', 'img_article', 'content', 'article_id', 'signal'));

}


/*****
 * LIKES
 */

/**
 * return number of likes
 *@return int
 */

function countLikes($id)
{
  $pdo = getPdo();
  $likes = $pdo->prepare('SELECT id_article FROM like_article WHERE id_article = ?');
  $likes->execute([$id]);
  $likes = $likes->rowCount();
  return $likes;
}

/**
 * return number of dislikes
 *@return int
 */

function countDislikes($id)
{
  $pdo = getPdo();
  $dislikes = $pdo->prepare('SELECT id_article FROM dislike WHERE id_article = ?');
  $dislikes->execute([$id]);
  $dislikes = $dislikes->rowCount();
  return $dislikes;
}


/*****
 * 
 * CHECKING
 */

/**
 * Verify if article was liked
 * 
 */

function checkLike(int $article, int $user)
{
  $pdo = getPdo();
  $check_like = $pdo->prepare('SELECT id_article FROM like_article WHERE id_article = ? AND id_user = ?');
  $check_like->execute(array($article, $user));
  return $check_like;
}

/**
 * Verify if article was unliked
 * 
 */

function checkDislike(int $article, int $user)
{
  $pdo = getPdo();
  $check_dislike = $pdo->prepare('SELECT id_article FROM dislike WHERE id_article = ? AND id_user = ?');
  $check_dislike->execute(array($article, $user));
  return $check_dislike;
}

/**
 * Verify if article was favourite
 * 
 */

function checkFav(int $article, int $user)
{
  $pdo = getPdo();
  $checkfav = $pdo->prepare('SELECT id_article FROM favourites WHERE id_article = ? AND id_user = ?');
  $checkfav->execute(array($article, $user));
  return $checkfav;
}





/***
 * USERS
 */





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


/***
 * COMMENTS
 */


/***
 * Add comments
 */

function addComments(int $user, int $article, string $comments): void
{
  $pdo = getPdo();
  $ins = $pdo->prepare('INSERT INTO comments (id_user, id_article, comments, date_comment) VALUES (?,?,?, NOW())');
  $ins->execute(array($user, $article, $comments));
}

/***
 * Count comments by article
 *@return int
 */

function countComments(int $article)
{
  $pdo = getPdo();
  $count = $pdo->prepare('SELECT COUNT(id_comment) as nbComments from comments WHERE id_article = :article_id');
  $count->execute(['article_id' => $article]);
  $nbcomments = $count->fetch();
  return $nbcomments;
}

/***
 * Render comments by article
 *@return array
 */

function findCommentsByArticle(int $article)
{
  $pdo = getPdo();
  $resultats = $pdo->prepare("SELECT * from comments c JOIN users u ON u.id = c.id_user WHERE id_article = :article_id");
  $resultats->execute(['article_id' => $article]);
  $comments = $resultats->fetchAll();
  return $comments;
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


/****
 * My Favourites
 *
 */



/***
 * Render favourites
 */

function findFavourites(int $iduser)
{
  $pdo = getPdo();
  $resultats = $pdo->prepare("SELECT * from favourites f INNER JOIN articles a ON a.id_article = f.id_article  JOIN users ON users.id = f.id_user  WHERE users.id = ? ORDER BY date_article DESC");
  $resultats->execute([$iduser]);
  $articles = $resultats->fetchAll();
  return $articles;
}

/***
 * Delete favourites
 */
function delFavourites(int $iduser, int $article)
{
  $pdo = getPdo();
  $del = $pdo->prepare('DELETE FROM favourites WHERE id_article = ? AND id_user = ?');
  $del->execute(array($article, $iduser));
}

/***
 * Add favourites
 */
function addFavourites(int $iduser, int $article)
{
  $pdo = getPdo();
  $ins = $pdo->prepare('INSERT INTO favourites (id_user, id_article) VALUES (?, ?)');
  $ins->execute(array($iduser, $article));
}