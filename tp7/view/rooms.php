<?php
// File: view/rooms.php (UPDATED)
?>
<h3>Room List</h3>
<table border="0"> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Room Number</th>
            <th>Type</th>
            <th>Floor</th>
            <th>Price</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($room->getAllRooms() as $r): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><?= $r['room_number'] ?></td>
        <td><?= $r['type'] ?></td>
        <td><?= $r['floor'] ?></td>
        <td>Rp. <?= number_format($r['price'], 0, ',', '.') ?></td>
        <td class="text-center">
            <span class="btn btn-warning btn-sm <?= $r['available'] ? 'btn-success' : 'btn-danger' ?>">
                <?= $r['available'] ? 'Available' : 'Occupied' ?>
            </span>
        </td>
        <td class="table-actions text-center">
            <a href="?page=edit_room&id=<?= $r['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="?delete_room=<?= $r['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kamar ini?');">Delete</a>
            <?php if (!$r['available']): ?>
                <a href="?checkout=<?= $r['id'] ?>" class="btn btn-sm btn-success">Checkout</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3 class="mt-20">Add New Room (Create)</h3>
<form method="POST">
    <label>Room Number:</label><input type="text" name="room_number" required>
    <label>Type:</label><input type="text" name="type" required>
    <label>Floor:</label><input type="number" name="floor" required>
    <label>Price (Rp):</label><input type="number" name="price" required>
    <button type="submit" name="create_room">Add Room</button>
</form>