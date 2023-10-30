<?php
namespace App\Models;

use CodeIgniter\Model;

class MAdminongkir extends Model
{
    
    protected $table = 't_marmutben_ongkir';
    public function getListOngkir()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_ongkir 
            ORDER BY wilayah ASC, wilayah_kecil ASC
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    function logRecord($type, $menu, $item, $log){
        // Contoh menjalankan kueri SQL SELECT
        $this->db->query("
        INSERT INTO `t_marmutben_log` (type, menu, item, log)
        VALUES ('$type', '$menu', '$item', '$log')
        ");

        return "success";
    }

    public function importCSVDataToDatabase($tempFilePath, $tableName) {
        $fileContents = file_get_contents($tempFilePath);
        if ($fileContents) {
            $rows = str_getcsv($fileContents, "\n");
    
            foreach ($rows as $row) {
                $data = str_getcsv($row, ";");
    
                if (count($data) == 5) {
                    $wilayah = $data[0];
                    $wilayahKecil = $data[1];
                    $ongkirCod = $data[2];
                    $ongkirOjol = $data[3];
                    $ongkirKaLogistik = $data[4];
    
                    $this->db->query("
                        INSERT INTO $tableName (wilayah, wilayah_kecil, ongkir_cod, ongkir_ojol, ongkir_ka_logistik) 
                        VALUES ('$wilayah', '$wilayahKecil', '$ongkirCod', '$ongkirOjol', '$ongkirKaLogistik')
                    ");
                }
            }
    
            return true; // Import berhasil
        }
        return false; // Error saat membaca file
    }
    

    function deleteAllOngkir(){
        // Contoh menjalankan kueri SQL SELECT
        $this->db->query("
            DELETE FROM t_marmutben_ongkir
        ");

        return "success";
    }
    
}
