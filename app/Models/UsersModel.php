<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'admin_users';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_role', 'username', 'password', 'nama', 'email', 'image', 'tempat_lahir', 'tanggal_lahir', 'bio'];

    public function getUser($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }

        return $this->where(['username' => $username])->first();
    }
}