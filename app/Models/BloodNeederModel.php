<?php

namespace App\Models;

use CodeIgniter\Model;

class BloodNeederModel extends Model
{
    protected $table = 'blood_needer';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_blood_group', 'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'kota', 'provinsi', 'kecamatan', 'negara', 'jenis_kelamin', 'agama', 'status', 'id_hospital', 'nohp', 'donored_by'];

    public function getBloodeNeeder($nik = false)
    {
        if ($nik == false) {
            return $this->findAll();
        }

        return $this->where(['nik' => $nik])->first();
    }
}
