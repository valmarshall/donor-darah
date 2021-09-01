<?php

namespace App\Models;

use CodeIgniter\Model;

class BloodStockModel extends Model
{
    protected $table = 'blood_stock';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_blood_group', 'id_donor', 'status', 'donored_to'];

    public function getBloodStockByDonor($idBloodDonor)
    {
        return $this->getWhere(['id_donor' => $idBloodDonor])->getResultArray();
    }

    public function getBloodStockByGroup($idBloodGroup)
    {
        return $this->getWhere(['id_blood_group' => $idBloodGroup])->getResultArray();
    }
}
