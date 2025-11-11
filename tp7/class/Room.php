<?php
require_once 'config/db.php';

class Room {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllRooms() {
        $stmt = $this->db->query("SELECT * FROM rooms");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRoomById($id) {
        $stmt = $this->db->prepare("SELECT * FROM rooms WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStock($id, $stock) {
        $stmt = $this->db->prepare("UPDATE rooms SET available = ? WHERE id = ?");
        return $stmt->execute([$available, $id]);
    }
    // CREATE
    public function createRoom($room_number, $floor, $price, $type) {
        $stmt = $this->db->prepare("INSERT INTO rooms (room_number, floor, price, type) VALUES (?, ?, ?, ?)");
        // Default available = TRUE
        return $stmt->execute([$room_number, $floor, $price, $type]);
    }

    // UPDATE
    public function updateRoom($id, $room_number, $floor, $price, $type, $available) {
        $stmt = $this->db->prepare("UPDATE rooms SET room_number = ?, floor = ?, price = ?, type = ?, available = ? WHERE id = ?");
        return $stmt->execute([$room_number, $floor, $price, $type, $available, $id]);
    }
    
    // DELETE
    public function deleteRoom($id) {
        $stmt = $this->db->prepare("DELETE FROM rooms WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Method untuk update availability (dipertahankan untuk fitur sewa)
    public function updateAvailability($id, $available) {
        $stmt = $this->db->prepare("UPDATE rooms SET available = ? WHERE id = ?");
        return $stmt->execute([$available, $id]);
    }
}
?>