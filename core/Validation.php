<?php


class Validation
{
    /**
     * check user on validation
     * @param $user
     * @return array
     */
    function validateUser($user){
        $errors = [];
        if ($user['email']===''){
            $errors[] = 'login mast not be empty';
        }
        if ($user['pass']===''){
            $errors[] = 'pass mast not be empty';
        }
        return $errors;
    }
}