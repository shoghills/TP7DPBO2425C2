<?php
require_once 'config/db.php';
require_once 'Room.php';

class Payment {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllPayments() {
        // Mengambil semua data pembayaran, menggabungkannya dengan nama penyewa dan nomor kamar
        $stmt = $this->db->query("SELECT p.*, r.room_number, t.name 
                                  FROM payment p
                                  JOIN rooms r ON p.room_id = r.id 
                                  JOIN tenant t ON p.tenant_id = t.id
                                  ORDER BY p.payment_date DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPaymentById($id) {
        $stmt = $this->db->prepare("SELECT * FROM payment WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rentRoom($room_id, $tenant_id, $amount) {
        // Logika untuk mencatat pembayaran sewa (mirip dengan 'meminjam')
        $stmt = $this->db->prepare("INSERT INTO payment (room_id, tenant_id, amount, payment_date) VALUES (?, ?, ?, CURDATE())");
        
        // Cek apakah kamar tersedia
        $roomData = $this->db->query("SELECT available, price FROM rooms WHERE id = $room_id")->fetch();
        
        if ($roomData['available'] == 1) { // 1 = Tersedia (TRUE)
            $room = new Room();
            // Perbarui status kamar menjadi TIDAK TERSEDIA (FALSE/0)
            $room->updateAvailability($room_id, 0); 
            
            // Gunakan harga dari database sebagai default jumlah pembayaran
            // Catatan: Anda mungkin ingin membiarkan $amount tetap digunakan jika ingin memasukkan jumlah manual
            $final_amount = $roomData['price']; 
            
            return $stmt->execute([$room_id, $tenant_id, $final_amount]);
        }
        return false;
    }

    public function deletePayment($id) {
        $stmt = $this->db->prepare("DELETE FROM payment WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Untuk simulasi 'Mengosongkan Kamar' (mirip dengan 'mengembalikan')
    public function checkoutRoom($room_id) {
        $room = new Room();
        // Perbarui status kamar menjadi TERSEDIA (TRUE/1)
        return $room->updateAvailability($room_id, 1);
    }
}
?>