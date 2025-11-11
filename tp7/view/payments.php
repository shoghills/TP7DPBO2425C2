<?php
// File: view/payments.php (UPDATED)
?>
<h3>Payment History</h3>
<table border="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Room Number</th>
            <th>Tenant Name</th>
            <th>Amount (Rp)</th>
            <th>Payment Date</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($payment->getAllPayments() as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['room_number'] ?></td>
        <td><?= $p['name'] ?></td>
        <td><?= number_format($p['amount'], 0, ',', '.') ?></td>
        <td><?= $p['payment_date'] ?></td>
        <td class="table-actions text-center">
            <a href="?delete_payment=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data pembayaran ini? Menghapus pembayaran TIDAK akan mengubah status kamar.');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3 class="mt-20">Rent a Room</h3>
<form method="POST">
    <label>Room:</label>
    <select name="room_id" required>
        <?php foreach ($room->getAllRooms() as $r): ?>
            <?php if ($r['available']): ?>
                <option value="<?= $r['id'] ?>"><?= $r['room_number'] ?> (<?= $r['type'] ?>) - Rp.<?= number_format($r['price'], 0, ',', '.') ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <label>Tenant:</label>
    <select name="tenant_id" required>
        <?php foreach ($tenant->getAllTenants() as $t): ?>
            <option value="<?= $t['id'] ?>"><?= $t['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="rent">Rent Room</button>
</form>