<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mbestseller extends Model
{
    // protected $table = 'my_table';

    public function getBestSeller()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("SELECT a.*, b.jenis_marmut, b.image_marmut, b.categories_marmut, b.harga, c.categories FROM t_marmutben_best_sellers as a 
        LEFT JOIN t_marmutben_products as b on a.marmut_id = b.id 
        LEFT JOIN t_marmutben_categories as c on b.categories_marmut = c.id 
        ORDER BY a.id ASC 
        LIMIT 6");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
    }
}
