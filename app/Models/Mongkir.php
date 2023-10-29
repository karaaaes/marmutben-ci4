<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mongkir extends Model
{
    // protected $table = 'my_table';

    public function getWilayah()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT DISTINCT wilayah FROM t_marmutben_ongkir 
            ORDER BY wilayah ASC
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
    }
}
