<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mkategori extends Model
{
    // protected $table = 'my_table';

    public function getKategoriMarmut($categoriesId)
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT a.*, b.categories FROM `t_marmutben_products` as a
            LEFT JOIN t_marmutben_categories as b on a.categories_marmut = b.id
            WHERE a.categories_marmut = $categoriesId 
            ORDER BY id DESC 
            LIMIT 6
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
    }

    public function checkCategories($categoriesId)
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT id, categories FROM t_marmutben_categories 
            WHERE id = $categoriesId
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
    }

    public function getTotalItems($categories) {
        // Menggunakan query builder untuk menjalankan kueri SQL
        $query = $this->db->query(
            "SELECT COUNT(*) as total FROM t_marmutben_products WHERE categories_marmut = ?",
            [$categories]
        );
    
        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
    
        if (!empty($results)) {
            return $results[0]['total'];
        } else {
            return 0;
        }
    }

    public function getKategoriMarmutDetail($categoriesId, $offset, $itemsPerPage){
        // Contoh menjalankan kueri SQL SELECT
        $nativeQuery = "SELECT a.*, b.categories FROM `t_marmutben_products` as a 
        LEFT JOIN t_marmutben_categories as b on a.categories_marmut = b.id 
        WHERE a.categories_marmut = $categoriesId 
        ORDER BY a.id DESC 
        LIMIT $itemsPerPage OFFSET $offset";

        $query = $this->db->query($nativeQuery);

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
        
    }
    
}
