<?php 
namespace App\Models;

use CodeIgniter\Model;
use PHPMailer\PHPMailer\PHPMailer;

class Mmarmut extends Model
{
    // protected $table = 'my_table';

    public function getDetailMarmut($marmutId, $categoriesMarmutId)
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT a.*, b.categories FROM `t_marmutben_products` as a
            LEFT JOIN t_marmutben_categories as b on a.categories_marmut = b.id
            WHERE a.id = $marmutId 
            AND a.categories_marmut = $categoriesMarmutId
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
    }

    public function setEmailNotif()
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT value FROM t_marmutben_config WHERE id = 1
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
    }

    public function checkHitCategories($id_categories)
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT hit FROM t_marmutben_hit
            WHERE categories_id = '$id_categories'  
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
    }

    public function updateHitCategories($update_hit, $id_categories)
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            UPDATE t_marmutben_hit SET `hit` = $update_hit WHERE categories_id = '$id_categories'  
        ");

        if($query){
            return "success";
        }else{
            return "failed";
        }
    }

    public function checkPromo($kode_promo)
    {
        // Contoh menjalankan kueri SQL SELECT
        $query = $this->db->query("
            SELECT * FROM t_marmutben_promo WHERE kode_promo = '$kode_promo'
        ");

        // Mengambil hasil query dalam bentuk array
        $results = $query->getResultArray();

        return $results;
    }

    public function sendEmail($array){
        // Buat pesan email
        $emailMessage = "Halo,\n\n";
        $emailMessage .= "Nama saya ".$array['receiverName']." ingin membeli ". $array['marmutName'] . " " .$array['marmutCategories']." sebanyak ".$array['marmutJumlah']." pcs dan mendapatkan harga Rp. ".$array['marmutHarga'].".\n\nHarga tersebut belum termasuk ongkir.\n\nHubungi saya di \nWhatsapp : ".$array['receiverPhone']." \nLokasi : ".$array['receiverLocation']."\n";
        $emailMessage .= "Terima kasih.";

        // Konfigurasi PHPMailer
        $mail = new PHPMailer();
        
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.rakaeshardiansyah.my.id'; // Sesuaikan dengan SMTP Server Anda
        $mail->SMTPAuth = true;
        $mail->Username = 'marmutben@rakaeshardiansyah.my.id'; // Sesuaikan dengan username email Anda
        $mail->Password = 'kambing123'; // Sesuaikan dengan password email Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Konfigurasi email
        $mail->setFrom('marmutben@rakaeshardiansyah.my.id', 'Marmutben Customer'); // Sesuaikan dengan email Anda
        $mail->addAddress($array['emailNotifications'], 'Recipient Name');
        $mail->Subject = "[BUY] - ".$array['marmutName']." - ".$array['marmutCategories'];
        $mail->Body = $emailMessage;

        // Kirim email
        if ($mail->send()) {
            return 'success';
        } else {
            echo 'Email gagal dikirim: ' . $mail->ErrorInfo;
            return 'failed';
        }
    }

    
}