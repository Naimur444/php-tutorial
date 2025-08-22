<?php
include 'db.php';

$donor = null;

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $sql = "SELECT name, amount FROM donations WHERE id = $id";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0){
         $donor = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find Donors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 300px;
            margin: 20px auto;
            padding: 10px;
        }
        input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }
        h1 {
            text-align: center;
        }
        .donor-card {
            max-width: 300px;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>
<body>

    <h1>Find Donors</h1>
    <form action="" method="get">
        <input type="number" name="id" placeholder="Enter Donation ID" required>
        <input type="submit" value="Search">
    </form>

    <?php if($donor): ?>
        <div class="donor-card">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($donor['name']); ?></p>
            <p><strong>Amount:</strong> ৳<?php echo htmlspecialchars($donor['amount']); ?></p>
        </div>
    <?php elseif(isset($_GET['id'])): ?>
        <p class="message">No donors found with ID <?php echo intval($_GET['id']); ?></p>
    <?php endif; ?>

</body>
</html>
