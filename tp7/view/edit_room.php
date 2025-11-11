<?php
// File: view/edit_room.php
$roomData = $room->getRoomById($_GET['id']);
if (!$roomData) {
    echo "Room not found.";
    exit;
}
?>

<h3>Edit Room: <?= $roomData['room_number'] ?></h3>
<form method="POST">
    <input type="hidden" name="id" value="<?= $roomData['id'] ?>">
    <label>Room Number:</label>
    <input type="text" name="room_number" value="<?= $roomData['room_number'] ?>" required><br>
    
    <label>Type:</label>
    <input type="text" name="type" value="<?= $roomData['type'] ?>" required><br>
    
    <label>Floor:</label>
    <input type="number" name="floor" value="<?= $roomData['floor'] ?>" required><br>
    
    <label>Price (Rp):</label>
    <input type="number" name="price" value="<?= $roomData['price'] ?>" required><br>

    <label>Status:</label>
    <select name="available">
        <option value="1" <?= $roomData['available'] == 1 ? 'selected' : '' ?>>Available</option>
        <option value="0" <?= $roomData['available'] == 0 ? 'selected' : '' ?>>Occupied</option>
    </select><br>

    <button type="submit" name="update_room">Save Changes</button>
</form>