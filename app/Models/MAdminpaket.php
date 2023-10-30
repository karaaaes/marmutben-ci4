<?php
namespace App\Models;

use CodeIgniter\Model;

class MAdminpaket extends Model
{
    protected $table = 't_marmutben_paket';
    public function getListPaket()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_paket 
            ORDER BY jenis ASC 
            LIMIT 6
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
    
                if (count($data) == 6) {
                    $jenis = $data[0];
                    $anakan = $data[1];
                    $remaja = $data[2];
                    $indukJantan = $data[3];
                    $indukBuntingan = $data[4];
                    $grosir = $data[5];
    
                    // Buat array data untuk insert
                    $insertData = [
                        'jenis' => $jenis,
                        'anakan' => $anakan,
                        'remaja' => $remaja,
                        'induk_jantan' => $indukJantan,
                        'induk_buntingan' => $indukBuntingan,
                        'grosir' => $grosir,
                    ];
    
                    // Insert data ke tabel database
                    $builder = $this->db->table($tableName);
                    $builder->insert($insertData);
                }
            }
    
            return true; // Import berhasil
        }
    
        return false; // Error saat membaca file
    }
    
    
    public function checkPaket($idPaket){
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_paket  
            WHERE id = '$idPaket'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }
    
    public function deletePaket($idPaket){
        $this->db->query("
            DELETE FROM t_marmutben_paket 
            WHERE id = '$idPaket'
        ");

        return "success";
    }

    public function deleteAllPaket(){
        $this->db->query("
            DELETE FROM t_marmutben_paket 
        ");

        return "success";
    }

    
}
