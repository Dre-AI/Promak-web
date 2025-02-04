<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "promak_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve inquiries
$sql = "SELECT * FROM inquiries ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries</title>
</head>
<body>
    <h2>Customer Inquiries</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["message"] ?></td>
            <td><?= $row["created_at"] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
