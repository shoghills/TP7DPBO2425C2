<?php
// File: index.php (FINAL STRUCTURE)
require_once 'class/Room.php';
require_once 'class/Tenant.php';
require_once 'class/Payment.php';

$room = new Room();
$tenant = new Tenant();
$payment = new Payment();

// --- (Logika CRUD Tetap Sama) ---
if (isset($_POST['rent'])) {
    $payment->rentRoom($_POST['room_id'], $_POST['tenant_id'], 0); 
    header('Location: ?page=payments');
    exit;
}
if (isset($_GET['checkout'])) {
    $payment->checkoutRoom($_GET['checkout']);
    header('Location: ?page=rooms');
    exit;
}
if (isset($_POST['create_room'])) {
    $room->createRoom($_POST['room_number'], $_POST['floor'], $_POST['price'], $_POST['type']);
    header('Location: ?page=rooms');
    exit;
}
if (isset($_POST['update_room'])) {
    $room->updateRoom($_POST['id'], $_POST['room_number'], $_POST['floor'], $_POST['price'], $_POST['type'], $_POST['available']);
    header('Location: ?page=rooms');
    exit;
}
if (isset($_GET['delete_room'])) {
    $room->deleteRoom($_GET['delete_room']);
    header('Location: ?page=rooms');
    exit;
}
if (isset($_POST['create_tenant'])) {
    $tenant->createTenant($_POST['name'], $_POST['email'], $_POST['phone']);
    header('Location: ?page=tenants');
    exit;
}
if (isset($_POST['update_tenant'])) {
    $tenant->updateTenant($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone']);
    header('Location: ?page=tenants');
    exit;
}
if (isset($_GET['delete_tenant'])) {
    $tenant->deleteTenant($_GET['delete_tenant']);
    header('Location: ?page=tenants');
    exit;
}
if (isset($_GET['delete_payment'])) {
    $payment->deletePayment($_GET['delete_payment']);
    header('Location: ?page=payments');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apartment Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container"> <?php include 'view/header.php'; ?>
        
        <nav style="display: flex;">
            <a href="?page=rooms">Rooms</a>
            <a href="?page=tenants">Tenants</a>
            <a href="?page=payments">Payments</a>
        </nav>

        <main>
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == 'rooms') include 'view/rooms.php'; 
                elseif ($page == 'tenants') include 'view/tenants.php';
                elseif ($page == 'payments') include 'view/payments.php';
                elseif ($page == 'edit_room' && isset($_GET['id'])) include 'view/edit_room.php';
                elseif ($page == 'edit_tenant' && isset($_GET['id'])) include 'view/edit_tenant.php';
            } else {
                // Tampilkan halaman default (misalnya halaman sambutan jika tidak ada page)
                echo '<h2>Welcome to Apartment Management Dashboard</h2><p>Pilih menu di atas untuk memulai pengelolaan.</p>';
            }
            ?>
        </main>
        <?php include 'view/footer.php'; ?>
    </div> </body>
</html>