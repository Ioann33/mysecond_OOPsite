<?php


class Main implements actionable
{
    /**
     * contain articles and users
     * @var DataBase
     */
    protected $db;

    /**
     * template for not auth user
     * @var View
     */
    protected $view;

    /**
     * template for auth user
     * @var View
     */
    protected $viewAuth;

    /**
     * process user validation an authorization
     * @var authorization
     */
    protected $authorization;

    /**
     * validation user data
     * @var Validation
     */
    protected $validation;

    /**
     * Main constructor.
     */
    public function __construct()
    {
        $this->db = new DataBase();
        $this->view = new View();
        $this->viewAuth = new View('authTemplate');
        $this->authorization = new Authorization();
        $this->validation = new Validation();
    }

    /**
     * show all articles in the main page
     */
    public function index()
    {
        $articles = $this->db->showAllArticles();
        if (empty($articles)){
            $articles = [];
        }
        $this->view->render('index', ['articles'=>$articles]);
    }

    /**
     * show page log in user
     */
    public function logIn(){
        $articles = $this->db->showAllArticles();
        if (empty($articles)){
            $articles = [];
        }
        $this->viewAuth->render('logIn', ['articles'=>$articles]);
    }


    /**
     * calls registration form
     */
    public function regForm(){
        $this->view->render('regForm',['errors'=>[]]);
    }

    /**
     * calls authorization form
     */
    public function authForm(){
        session_start();
        $errors = [];
        if (!empty($_SESSION['errors'])){
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }
        $success = '';
        if (!empty($_SESSION['success'])){
            $success = $_SESSION['success'];
            unset($_SESSION['success']);
        }
        $this->view->render('authForm',['errors'=>$errors, 'success'=>$success]);
    }

    /**
     * add new user
     */
    public function registrationUser(){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $res = $this->db->addUser(['email'=>$email,'pass'=>$pass]);
        if ($res === true){
            session_start();
            $_SESSION['success'] = 'Successful registration!';
            Rout::redirect(Rout::url('authForm'));
        }
        if ($res === 1062){
            $error = ['user with such name is exist!'];
            $this->view->render('regForm',['errors'=>$error]);
        }
    }

    /**
     * make process authorization user
     */
    public function authUser(){
        $user = $_POST;
        $email = $user['email'];
        $userAuth = $this->db->getUserByEmail($email);
        $userId = $userAuth['id'];

        if (!$user){
            $errors = ['No user data in request'];
        }else{
            $errors = $this->validation->validateUser($user);
        }
        if (count($errors) == 0){
            $check = $this->authorization->checkUser($user);
            if (!$check){
                $errors = ['invalid login or password'];
            }
        }

        if (count($errors)>0){
            session_start();
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            Rout::redirect(Rout::url('authForm'));
        }else{
            session_destroy();
            session_start();
            $_SESSION['userId'] = $userId;
            Rout::redirect(Rout::url('logIn'));
        }
    }

    /**
     * delete article by id from data base
     */
    public function deleteArticle(){
        $index =(int) $_GET['mess'];
        $this->db->deleteArticle($index);
        $articles = $this->db->showAllArticles();
        if (empty($articles)){
            $articles = [];
        }
        $this->viewAuth->render('logIn', ['articles'=>$articles]);
    }

    /**
     * calls from for filling content Article
     */
    public function createArticleForm(){
        session_start();
        $userId =(int) $_SESSION['userId'];
        $userName = $this->db->getUserById($userId);
        $this->viewAuth->render('createArticle',['userId'=>$userId,'userName'=>$userName]);
    }


    /**
     * process inserting article the data base with input content
     */
    public function saveArticle(){
        $name = $_POST['name'];
        $content = $_POST['text'];
        $autor = $_POST['autor'];
        $create_data = $_POST['create_data'];
        $res = $this->db->addArticle(['name'=>$name, 'content'=>$content, 'autor'=>$autor, 'create_data'=>$create_data]);
        if ($res === true){
            Rout::redirect(Rout::url('logIn'));
        }else{
            exit($res);
        }
    }
}