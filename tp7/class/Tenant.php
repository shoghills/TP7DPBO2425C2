<?php
require_once 'config/db.php';

class Tenant {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllTenants() {
        $stmt = $this->db->query("SELECT * FROM tenant");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // CREATE
    public function createTenant($name, $email, $phone) {
        $stmt = $this->db->prepare("INSERT INTO tenant (name, email, phone) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $phone]);
    }

    // UPDATE
    public function updateTenant($id, $name, $email, $phone) {
        $stmt = $this->db->prepare("UPDATE tenant SET name = ?, email = ?, phone = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $phone, $id]);
    }

    // DELETE
    public function deleteTenant($id) {
        $stmt = $this->db->prepare("DELETE FROM tenant WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getTenantById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tenant WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>