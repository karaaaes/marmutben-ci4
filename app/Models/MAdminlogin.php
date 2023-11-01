<?php
namespace App\Models;

use CodeIgniter\Model;

class MAdminlogin extends Model
{
    protected $table = 't_marmutben_config';
    public function getAccLogin($username, $password)
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM ".$this->table." 
            WHERE id = 2 
            AND type = '$username' 
            AND value = '$password'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }
}
