<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table = 'admin_roles';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_role', 'role', 'slug'];

    public function getRole($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
