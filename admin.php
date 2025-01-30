<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diamond";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update reservation status
if (isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $new_status = $_POST['new_status'];

    $sql = "UPDATE reservations SET status = '$new_status' WHERE id = $id";
    $conn->query($sql);

    header("Location: admin.php");
    exit();
}

// Delete reservation
if (isset($_POST['delete_reservation'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM reservations WHERE id = $id";
    $conn->query($sql);

    header("Location: admin.php");
    exit();
}

// Fetch reservations based on status
$pending = $conn->query("SELECT * FROM reservations WHERE status = 'pending'");
$link_sent = $conn->query("SELECT * FROM reservations WHERE status = 'link_sent'");
$paid = $conn->query("SELECT * FROM reservations WHERE status = 'paid'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Diamond Events</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this reservation?");
        }
    </script>
</head>
<body>

    <!-- Navigation -->
    <div class="navbar">
        <div class="logo">Diamond Events - Admin</div>
        <ul>
            <li><a href="index.php">Logout</a></li>
        </ul>
    </div>

    <!-- Pending Reservations -->
    <div class="admin-dashboard">
        <h2>Pending Reservations</h2>
        <?php if ($pending->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Normal Tickets</th>
                        <th>Children Tickets</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $pending->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["naam"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["normal_tickets"]; ?></td>
                            <td><?php echo $row["children_tickets"]; ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="new_status" value="link_sent">
                                    <button type="submit" name="update_status">Send Payment Link</button>
                                </form>
                                <form method="POST" onsubmit="return confirmDelete();">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_reservation">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No pending reservations.</p>
        <?php endif; ?>
    </div>

    <!-- Payment Link Sent -->
    <div class="admin-dashboard">
        <h2>Payment Link Sent</h2>
        <?php if ($link_sent->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Normal Tickets</th>
                        <th>Children Tickets</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $link_sent->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["naam"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["normal_tickets"]; ?></td>
                            <td><?php echo $row["children_tickets"]; ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="new_status" value="pending">
                                    <button type="submit" name="update_status">Move Back to Pending</button>
                                </form>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="new_status" value="paid">
                                    <button type="submit" name="update_status">Mark as Paid</button>
                                </form>
                                <form method="POST" onsubmit="return confirmDelete();">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_reservation">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No reservations with payment link sent.</p>
        <?php endif; ?>
    </div>

    <!-- Paid Reservations -->
    <div class="admin-dashboard">
        <h2>Paid Reservations</h2>
        <?php if ($paid->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Normal Tickets</th>
                        <th>Children Tickets</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $paid->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["naam"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["normal_tickets"]; ?></td>
                            <td><?php echo $row["children_tickets"]; ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="new_status" value="link_sent">
                                    <button type="submit" name="update_status">Move Back to Payment Sent</button>
                                </form>
                                <form method="POST" onsubmit="return confirmDelete();">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_reservation">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No paid reservations.</p>
        <?php endif; ?>
    </div>

</body>
</html>

<?php
$conn->close();
?>
