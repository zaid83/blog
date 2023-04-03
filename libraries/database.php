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

 function findArticle(int $id){
$pdo = getPdo();
$resultats = $pdo->prepare("SELECT * from articles JOIN users ON users.id = articles.author WHERE id_article = :article_id");
$resultats->execute(['article_id' => $id]);
$article = $resultats->fetch();
return $article;
 }


 /*****
  * LIKES
  */

 /**
  * return number of likes
  *@return int
  */

  function countLikes($id){
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

  function countDislikes($id){
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
 * @return boolean
 */

 function checkLike(int $article, int $user){
$pdo = getPdo();
$check_like = $pdo->prepare('SELECT id_article FROM like_article WHERE id_article = ? AND id_user = ?');
$check_like->execute(array($article, $user));
return $check_like;
 }

 /**
 * Verify if article was unliked
 * @return boolean
 */

 function checkDislike(int $article, int $user){
    $pdo = getPdo();
 $check_dislike = $pdo->prepare('SELECT id_article FROM dislike WHERE id_article = ? AND id_user = ?');
$check_dislike->execute(array($article, $user));
return $check_dislike;
 }

  /**
 * Verify if article was favourite
 * @return boolean
 */

 function checkFav(int $article, int $user){
    $pdo = getPdo();
 $checkfav = $pdo->prepare('SELECT id_article FROM favourites WHERE id_article = ? AND id_user = ?');
$checkfav->execute(array($article, $user));
return $checkfav;
 }


 /**
  * Sign up User
  * 
  */

function addUser($pseudo, $password, $email, $token):void
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