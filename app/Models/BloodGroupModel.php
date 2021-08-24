<?php

namespace App\Models;

use CodeIgniter\Model;

class BloodGroupModel extends Model
{
    protected $table = 'blood_group';
    protected $useTimestamps = true;
    protected $allowedFields = ['blood_group', 'slug'];

    public function getBloodGroup($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
