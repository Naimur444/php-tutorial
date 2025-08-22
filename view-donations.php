<?php
include 'db.php';

// Handle deletion if delete_id is set
if(isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM donations WHERE id = $delete_id");
    header("Location: view-donations.php");
    exit;
}

// Fetch all donations
$result = $conn->query("SELECT * FROM donations ORDER BY donation_date DESC, donation_time DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Donations</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f0f0f0; }
        a.button { padding: 5px 10px; text-decoration: none; background: #007bff; color: #fff; border-radius: 3px; }
        a.button:hover { background: #0056b3; }
        a.button.delete { background: #dc3545; }
        a.button.delete:hover { background: #a71d2a; }
    </style>
</head>
<body>

<h1>All Donations</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Amount</th>
        <th>Payment</th>
        <th>Transaction ID</th>
        <th>Date</th>
        <th>Time</th>
        <th>Anonymous</th>
        <th>Actions</th>
    </tr>
    <?php if($result->num_rows > 0): ?>
        <?php while($donor = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $donor['id']; ?></td>
                <td><?php echo htmlspecialchars($donor['name']); ?></td>
                <td><?php echo htmlspecialchars($donor['email']); ?></td>
                <td>৳<?php echo htmlspecialchars($donor['amount']); ?></td>
                <td><?php echo htmlspecialchars($donor['payment_method']); ?></td>
                <td><?php echo htmlspecialchars($donor['transaction_id']); ?></td>
                <td><?php echo htmlspecialchars($donor['donation_date']); ?></td>
                <td><?php echo htmlspecialchars($donor['donation_time']); ?></td>
                <td><?php echo htmlspecialchars($donor['anonymous']); ?></td>
                <td>
                    <a class="button" href="edit.php?id=<?php echo $donor['id']; ?>">Edit</a>
                    <a class="button delete" href="view-donations.php?delete_id=<?php echo $donor['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="10">No donations found.</td></tr>
    <?php endif; ?>
</table>

<p><a href="form.php">Add New Donation</a></p>

</body>
</html>
