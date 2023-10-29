<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mpaket extends Model
{
    // protected $table = 'my_table';

    public function getPaketMarmut()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_paket 
            ORDER BY jenis ASC
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
    }
}
