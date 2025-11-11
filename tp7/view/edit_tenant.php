<?php
// File: view/edit_tenant.php
$tenantData = $tenant->getTenantById($_GET['id']);
if (!$tenantData) {
    echo "Tenant not found.";
    exit;
}
?>

<h3>Edit Tenant: <?= $tenantData['name'] ?></h3>
<form method="POST">
    <input type="hidden" name="id" value="<?= $tenantData['id'] ?>">
    
    <label>Name:</label>
    <input type="text" name="name" value="<?= $tenantData['name'] ?>" required><br>
    
    <label>Email:</label>
    <input type="email" name="email" value="<?= $tenantData['email'] ?>"><br>
    
    <label>Phone:</label>
    <input type="text" name="phone" value="<?= $tenantData['phone'] ?>"><br>

    <button type="submit" name="update_tenant">Save Changes</button>
</form>