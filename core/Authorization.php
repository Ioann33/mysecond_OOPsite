<?php


class Authorization
{
    /**
     * @var DataBase
     */
    protected $db;

    /**
     * authorization constructor.
     */
    public function __construct()
    {
        $this->db = new DataBase();
    }


    /**
     * check input user on the match with default user
     * @param $user // input user
     * @return boolean
     */
    public function checkUser($user){
        $userFromDataBase = $this->db->getUserByEmail($user['email']);
        if (!$userFromDataBase){
            return false;
        }else{
            $passHash = md5($user['pass']);
            if ($passHash === $userFromDataBase['password']){
                return true;

            }else{
                return false;
            }
        }
    }
}