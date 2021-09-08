<?php

namespace App\Models;

use CodeIgniter\Model;

class HospitalModel extends Model
{
    protected $table = 'hospital';
    protected $useTimestamps = true;
    protected $allowedFields = ['hospital', 'slug', 'address', 'map'];

    public function getHospital($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
