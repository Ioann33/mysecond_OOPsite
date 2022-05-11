<?php


class DataBase
{
    /**
     * @var mysqli
     */
    private $db;

    private $usersTable = 'users';

    private $articlesTable = 'articles';

    /**
     * DataBase constructor.
     */
    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USER,DB_PASS, DB_NAME);
    }

    /**
     * get all articles data
     * @return mixed
     */
    public function showAllArticles(){

        $sql = "SELECT {$this->articlesTable}.id,{$this->articlesTable}.name,{$this->articlesTable}.content, {$this->usersTable}.email, {$this->articlesTable}.create_at FROM `articles` INNER JOIN users ON {$this->articlesTable}.autor_user_id = {$this->usersTable}.id;";

        $result = $this->db->query($sql);

        if (!$result){
            exit($this->db->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @param array $article ['name'=>'','content'=>'','autor'=>'', 'create_data'=>'']
     * @return bool
     */
    public function addArticle(array $article){
        $sql = "INSERT INTO {$this->articlesTable} (name, content, 	autor_user_id, 	create_at) values ('{$article['name']}','{$article['content']}','{$article['autor']}','{$article['create_data']}');";
        return $this->db->query($sql);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteArticle(int $id){
        $sql = "DELETE FROM {$this->articlesTable} WHERE id = {$id};";
        return $this->db->query($sql);
    }


    /**
     * get all users from DB
     * @return mixed
     */
    public function getAllUsers(){
        $sql = "SELECT * FROM {$this->usersTable}";

        $result = $this->db->query($sql);

        if (!$result){
            exit($this->db->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserByEmail(string $email){
        $sql = "SELECT id, email, password FROM `users` where email = '{$email}';";
        $result = $this->db->query($sql);
        if (!$result){
            exit($this->db->error);
        }
        $res = $result->fetch_all(MYSQLI_ASSOC);
        if ($res){
            return $res[0];
        }else{
            return null;
        }

    }

    /**
     * add new user
     * @param array $user ['email'=>'','password'=>'']
     * @return bool
     */
    public function addUser(array $user){
        $passHash = md5($user['pass']);
        $sql = "INSERT INTO {$this->usersTable} (email, password) values ('{$user['email']}','{$passHash}');";

        $res = $this->db->query($sql);
        if (!$res){
            $error = $this->db->errno;
            if ($error){
                return $error;
            }
        }
        return $res;
    }

    /**
     * return array with user name
     * @param int $id
     * @return mixed
     */
    public function getUserById(int $id){
        $sql = "SELECT email FROM {$this->usersTable} WHERE id = {$id}";
        $result = $this->db->query($sql);
        $userName = $result->fetch_row();
        if (!$result){
            exit($this->db->error);
        }
        return $userName;
    }
}






















