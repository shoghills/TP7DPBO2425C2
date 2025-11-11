<?php
// File: view/tenants.php (UPDATED)
?>
<h3>Tenant List</h3>
<table border="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tenant->getAllTenants() as $t): ?>
    <tr>
        <td><?= $t['id'] ?></td>
        <td><?= $t['name'] ?></td>
        <td><?= $t['email'] ?></td>
        <td><?= $t['phone'] ?></td>
        <td class="table-actions text-center">
            <a href="?page=edit_tenant&id=<?= $t['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="?delete_tenant=<?= $t['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus penyewa ini?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3 class="mt-20">Add New Tenant (Create)</h3>
<form method="POST">
    <label>Name:</label><input type="text" name="name" required>
    <label>Email:</label><input type="email" name="email">
    <label>Phone:</label><input type="text" name="phone">
    <button type="submit" name="create_tenant">Add Tenant</button>
</form>