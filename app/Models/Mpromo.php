<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mpromo extends Model
{
    // protected $table = 'my_table';

    public function getListPromo()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_promo 
            ORDER BY id DESC 
            LIMIT 6
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
    }
}
