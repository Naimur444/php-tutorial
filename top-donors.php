<?php
include 'db.php';

$sql = "SELECT name, amount, anonymous FROM donations
        WHERE DATE(donation_date) = CURDATE() - INTERVAL 1 DAY
        AND anonymous = 'NO' ORDER BY amount DESC LIMIT 1";

$result = $conn->query($sql);
$donor = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Donors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        .donor-card {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 15px;
            margin-top: 20px;
        }
        h2 {
            margin: 0 0 10px 0;
        }
        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <?php if($donor): ?>
        <div class="donor-card">
            <h2>Yesterday's Top Donor</h2>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($donor['name']); ?></p>
            <p><strong>Amount:</strong> <?php echo htmlspecialchars($donor['amount']); ?></p>
        </div>
    <?php else: ?>
        <p>No donations yesterday</p>
    <?php endif; ?>

</body>
</html>
