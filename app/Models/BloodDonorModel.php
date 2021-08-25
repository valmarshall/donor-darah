<?php

namespace App\Models;

use CodeIgniter\Model;

class BloodDonorModel extends Model
{
    protected $table = 'blood_donor';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_blood_group', 'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'nohp', 'image', 'password', 'status_aktif'];

    public function getBloodDonor($nik = false)
    {
        if ($nik == false) {
            return $this->findAll();
        }

        return $this->where(['nik' => $nik])->first();
    }
}
