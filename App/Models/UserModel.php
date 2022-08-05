<?php

namespace App\Models;

use App\Config\Model;

class UserModel extends Model
{
    public function getAll()
    {
        return $this->db->from('users')
                ->select(['id', 'username', 'email'])
                ->first();
    }

    public function searchById(int $id)
    {
        return $this->db->from('users')
                ->where('id')->is($id)
                ->select(['id', 'username', 'email'])
                ->first();
    }

    public function store(string $email, string $username, string $password) {
        if(!isset($email) || !isset($password) || !isset($username) || !$username || !$email || !$password){
            return false;
        } else {
            if(
                $this->db->from('users')
                    ->where('email')->is($email)
                    ->select(['id'])
                    ->first()
                == 
                false
            ) {
                $this->db->insert([
                    'email' => $email,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                ])->into('users'); 
                return true;
            } else {
                return false;
            }
        }
    }

    public function check(string $email, string $password) {
        if(!isset($email) || !isset($password) || !$email || !$password){
            return false;
        } else {
            $user = $this->db->from('users')
                        ->where('email')->is($email)
                        ->select(['id', 'username', 'email', 'password'])
                        ->first();

            if($user && password_verify($password, $user->password)) {
                return $user;
            } else {
                return false;
            }
        }
    }
}