<?php
namespace App\Models;

use CodeIgniter\Model;

class MAdminsettings extends Model
{
    protected $table = 't_marmutben_config';
    public function getListConfig()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_config
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();
        return $results;
    }

    public function insertConfig($emailNotifications){
        // Contoh menjalankan kueri SQL SELECT
        $this->db->query("
            INSERT INTO `t_marmutben_config` (`type`, `value`) 
            VALUE ('Email Notifications', '$emailNotifications')
        ");

        return "success";
    }

    public function updateConfig($emailNotifications){
        // Contoh menjalankan kueri SQL SELECT
        $this->db->query("
            UPDATE `t_marmutben_config` SET `value` = '$emailNotifications' 
            WHERE id = 1
        ");

        return "success";
    }

    function logRecord($type, $menu, $item, $log){
        // Contoh menjalankan kueri SQL SELECT
        $this->db->query("
        INSERT INTO `t_marmutben_log` (type, menu, item, log)
        VALUES ('$type', '$menu', '$item', '$log')
        ");

        return "success";
    }
    
}
