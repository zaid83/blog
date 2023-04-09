<?php

namespace Controllers;


class User extends Controller
{
    protected $modelName = \MODELS\User::class;

    public function allList()
    {
        $articleModel = new \MODELS\Article();
        $commentModel = new \MODELS\Comment();

        //All articles
        $listarticles = $articleModel->findAll();

        //Nb articles
        $nbArticles = $articleModel->countAll();

        //All users
        $listusers = $this->model->findAll();

        //NB users
        $nbUsers = $this->model->countAll();

        //All comments
        $listComs = $commentModel->findAll();

        //Nb comments
        $nbComs = $commentModel->countAll();


        $pageTitle = "Administrateur";
        $subheading = "Controle Admin";



        if ($_SESSION['role'] == 3) {
            \Renderer::renderHTML(
                'templates/login/admin.html',
                compact('pageTitle', 'nbArticles', 'listarticles', 'listComs', 'listusers', 'nbUsers', 'nbComs', 'subheading')
            );
        } else {
            \http::redirect('logout.php');
        }
    }

    public function delUser()
    {

        if (isset($_GET['supprime_user'])) {
            $user = $this->model->find($_GET['supprime_user']);
            unlink("public/assets/img/users/" . $user['avatar'] . "");
            $this->model->del($_GET['supprime_user']);
            \Http::redirect('index.php?controller=user&task=allList');
        }
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        \Http::redirect('index.php?controller=user&task=login');
    }

    public function login()
    {
        $message = "";
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $res = $this->model->connect($email);

            if ($res) {

                $passwordHash = $res['password'];
                if (password_verify($password, $passwordHash)) {

                    session_start();

                    $_SESSION['id'] = $res['id'];
                    $_SESSION['pseudo'] = $res['pseudo'];
                    $_SESSION['email'] = $res['email'];
                    $_SESSION['avatar'] = $res['avatar'];
                    $_SESSION['token'] = $res['token'];
                    $_SESSION['role'] = $res['role_user'];


                    \Http::redirect('index.php');
                } else {
                    $message = "Mot de passe invalide";
                }
            } else {
                $message = "Identifiants invalides";
            }
        }


        $pageTitle = "Connexion";

        \Renderer::renderHTML(
            'templates/login/login.html',
            compact('message', 'pageTitle')
        );

    }

    public function register()
    {
        $message = '';

        if (isset($_POST["pseudo"]) && isset($_POST["email"])) {

            function valid_donnees($donnees)
            {
                $donnees = trim($donnees);
                $donnees = stripslashes($donnees);
                $donnees = htmlspecialchars($donnees);
                return $donnees;
            }

            $pseudo = valid_donnees($_POST["pseudo"]);
            $email = valid_donnees($_POST["email"]);
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
            $token = "";
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);


            if (isset($_POST["submit"])) {

                // VERIFICATIONS
                $res = $this->model->check('email', $email);
                $res2 = $this->model->check('pseudo', $pseudo);



                if ($res) {
                    $message = "Mail dejà existant";
                } else if ($res2) {
                    $message = "Pseudo dejà existant";
                } else if (empty($pseudo) || empty($email) || empty($password)) {
                    $message = 'Un des champs est vide';
                } else if (strlen($pseudo) >= 10 || strlen($pseudo) <= 4) {
                    $message = "Le pseudo doit faire entre 4 et 10 caractères";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $message = "Ceci n'est pas une adresse email valide";
                } else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                    $message = "Ce password doit avoir au moins une majuscule, une minuscule, un nombre, un caratère speciale et dépasser 8 caractères";
                } else if ($password != $password2) {
                    $message = "Les mots de passe ne matchent pas";
                }


                // INSERT TO DB
                else {

                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $this->model->add($pseudo, $password, $email, $token);
                    \Http::redirect("index.php?controller=user&task=login");

                }

            }
        }


        $pageTitle = "Inscription";
        \Renderer::renderHTML(
            'templates/login/register.html',
            compact('pageTitle', 'message')
        );
    }

    public function editProfil()
    {
        $user_id = $_GET['id'];
        $message = '';

        //recuperer le profil à éditer
        $user = $this->model->find($user_id);

        //recuperer les roles
        $allroles = $this->model->findRoles();




        //update profil
        if (isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["password"])) {


            //Get image
            $upload = \UploadImg::upload('avatar');
            extract($upload);

            // Security
            $pseudo = htmlspecialchars($_POST["pseudo"]);
            $email = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);




            if (isset($_POST["submit"]) && $_SESSION['role'] < 3) {
                $passwordHash = $user['password'];

                if (!empty($pseudo) || !empty($email) || !empty($password)) {
                    if (password_verify($password, $passwordHash)) {


                        if (in_array($extension, $tabExtension) && $size <= $tailleMax && $error == 0) {
                            $file = $user_id . "." . $extension;
                            $avatar = $file;
                            move_uploaded_file($tmp_name, "public/assets/img/users/$file");

                            $this->model->update($pseudo, $email, $user_id, $avatar);
                            if ($_SESSION['id'] == $_GET['id']) {
                                $user = $this->model->find($user_id);
                                $_SESSION['id'] = $user['id'];
                                $_SESSION['avatar'] = $user['avatar'];
                                $_SESSION['pseudo'] = $user['pseudo'];
                                $_SESSION['email'] = $user['email'];
                            }
                            \Http::redirect("index.php");
                        } else {
                            $message = 'Veuillez uploadez une image avec une taille inférieure à 4MO';
                        }
                    } else {
                        $message = "Mauvais mot de passe";

                    }
                } else {
                    $message = "Un des champs est vide";

                }
            } else {

                $role_id = $_POST["role"];
                if (isset($_POST["submitAdmin"])) {

                    if (!empty($pseudo) || !empty($email)) {
                        if (in_array($extension, $tabExtension) && $size <= $tailleMax && $error == 0) {
                            $file = $user_id . "." . $extension;
                            $avatar = $file;
                            move_uploaded_file($tmp_name, "public/assets/img/users/$file");
                            $this->model->updateRoles($pseudo, $email, $user_id, $avatar, $role_id);
                            $user = $this->model->find($user_id);
                            \Http::redirect("index.php?controller=user&task=allList");
                        } else {
                            $message = 'Veuillez uploadez une image avec une taille inférieure à 4MO';
                        }

                    } else {
                        $message = "Un des champs est vide";
                    }
                }
            }
        }




        $pageTitle = "Profil";
        \Renderer::renderHTML(
            'templates/login/profil.html',
            compact('pageTitle', 'user', 'message', 'allroles')
        );
    }

    public function forgotP()
    {


        //message success or not
        $message = "";

        //Verify if submit
        if (isset($_POST['submitPass'])) {
            $email = $_POST['email'];
            if (empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
                $message = "<span style='color:orange'> Veuillez remplir avec un email valide</span>";
            } else {

                $res = $this->model->check('email', $email);

                //if mail exist
                if ($res) {
                    //create a token
                    $string = implode('', array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9')));
                    $token = substr(str_shuffle($string), 0, 20);

                    // insert token in db
                    $this->model->insertToken($email, $token);

                    //Send a link

                    $link = "http://localhost/blog/index.php?controller=user&task=resetPass&token=" . $token;
                    $to = $email;
                    $subject = "Reinitialisation de votre mot de passe";
                    $mess = "<h1>Réinitialisation de votre mot de passe</h1> <p> Pour réinitialiser votre mot de passe, suivre ce lien: <a href='$link'>'$link'</a></p>";

                    // headers
                    $headers = [];
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = 'Content-type: text/html charset=iso-8859-1';
                    $headers[] = 'To: ' . $to . ' <' . $to . '>';
                    $headers[] = 'Mon blog MANGAZ';

                    //send a mail
                    mail($to, $subject, $mess, implode("\r\n", $headers));
                    $message = "<span style='color:lightgreen'>Un lien vous a été envoyé à votre adresse email</span>";


                } else {
                    $message = "<span style='color:orange'>L'adresse email n'existe pas dans la bdd</span>";
                }


            }

        }

        $pageTitle = "Mot de passe oublié";

        \Renderer::renderHTML('templates/login/forgotPass.html', compact("pageTitle", "message"));
    }

    public function resetPass()
    {
        // if empty token
        if (empty($_GET['token'])) {
            echo "Lien Invalide";
            exit();
        }

        $message = '';
        $token = $_GET['token'];

        $res = $this->model->checkTokenValid($token);
        if (!$res) {
            echo "Token invalide";
            exit();
        }

        // token limit in time
        $dateToken = strtotime('+1hours', strtotime($res['token_date']));
        $dateToday = time();

        if ($dateToken < $dateToday) {
            echo "Token expiré";
            exit();
        }




        // if submit 
        if (isset($_POST['submitPass'])) {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            if (empty($password) || empty($password2)) {
                $message = "<span style='color:orange'>Les champs sont vides</span>";
            } else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $message = "<span style='color:orange'>Ce password doit avoir au moins une majuscule, une minuscule, un nombre, un caratère speciale et dépasser 8 caractères </span>";
            } else if ($password != $password2) {
                $message = "<span style='color:orange'>Les mots de passes ne sont pas les mêmes</span>";
            } else {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $this->model->resetPass($token, $password);

                $message = "<span style='color:lightgreen'>Votre mot de passe a été mis a jour</span>";

            }

        }

        $pageTitle = "Renouveller mot de passe";

        \Renderer::renderHTML('templates/login/resetPass.html', compact("pageTitle", "message"));
    }

}