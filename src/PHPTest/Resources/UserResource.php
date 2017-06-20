<?php

namespace PHPTest\Resources;
class UserResource extends \PHPTest\AbstractResource {



    public function get($id = null) {
        if ($id === null) {
            $stm =$this->getEntityManager()
                ->query("SELECT id,name,email FROM users");

        } else {
            $stm = $this->getEntityManager()
                ->query("SELECT id,name,email FROM users WHERE id = :id",['id' => $id]);
        }
        while($user = $stm->fetchObject("\\PHPTest\\Entities\\User")) {
            $users[] = $user;
        }
        return $users;
    }

    public function getByEmailAndPassword($email,$password) {
            $users = $this->getEntityManager()
                ->query("SELECT id,name,email FROM users WHERE email = :email and password = :pass",['email' => $email,'pass'=>$password])
                ->fetchObject("\\PHPTest\\Entities\\User");
        return $users;
    }

    public function getByEmailOrName($term){
        $stm = $this->getEntityManager()
                ->query("SELECT id,name,email FROM users WHERE LOWER(name) LIKE :name or LOWER(email) LIKE :email",['name' => strtolower("%$term%"), 'email' => strtolower("%$term%")]);
        while($user = $stm->fetchObject("\\PHPTest\\Entities\\User")) {
            $users[] = $user;
        }

        return $users;
    }

}