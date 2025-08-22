<?php
include 'db.php';

$donor = null;

// Check if ID is provided
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $sql = "SELECT * FROM donations WHERE id = $id";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0) {
        $donor = $result->fetch_assoc();
    }
}

// Handle form submission
if(isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $payment = $_POST['payment'];
    $trn_id = $_POST['trn-id'];
    $donation_date = $_POST['donation-date'];
    $donation_time = $_POST['donation-time'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $anonymous = $_POST['anonymous'];

    $update_sql = "UPDATE donations SET 
        name='$name', email='$email', amount='$amount', payment_method='$payment', 
        `transaction_id`='$trn_id', donation_date='$donation_date', donation_time='$donation_time',
        phone='$phone', address='$address', anonymous='$anonymous'
        WHERE id=$id";

    if($conn->query($update_sql)) {
        $message = "Donation updated successfully!";
    } else {
        $message = "Error updating donation: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Donation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { max-width: 400px; margin: 20px auto; padding: 10px; }
        label { display: block; margin-top: 10px; }
        input, select, textarea, button { width: 100%; padding: 5px; margin-top: 3px; }
        span { color: red; }
        .radio-group { display: flex; gap: 10px; margin-top: 5px; }
        .radio-group input { margin-right: 5px; }
        button { margin-top: 15px; }
        .message { text-align: center; color: green; margin-top: 10px; }
    </style>
</head>
<body>

<?php if($donor): ?>
    <?php if(isset($message)) echo "<p class='message'>$message</p>"; ?>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $donor['id']; ?>">

        <label>Name: <span>*</span></label>
            <input type="text" name="name" value="<?php echo isset($donor['name']) ? htmlspecialchars($donor['name']) : ''; ?>" required>

        <label>Email: <span>*</span></label>
            <input type="email" name="email" value="<?php echo isset($donor['email']) ? htmlspecialchars($donor['email']) : ''; ?>" required>

        <label>Donation Amount: <span>*</span></label>
            <input type="number" name="amount" value="<?php echo isset($donor['amount']) ? htmlspecialchars($donor['amount']) : ''; ?>" required>

        <label>Payment Method: <span>*</span></label>
            <select name="payment" required>
                <option value="bKash" <?php if(isset($donor['payment_method']) && $donor['payment_method']=='bKash') echo 'selected'; ?>>bKash</option>
                <option value="Nagad" <?php if(isset($donor['payment_method']) && $donor['payment_method']=='Nagad') echo 'selected'; ?>>Nagad</option>
                <option value="Card" <?php if(isset($donor['payment_method']) && $donor['payment_method']=='Card') echo 'selected'; ?>>Card</option>
                <option value="Bank" <?php if(isset($donor['payment_method']) && $donor['payment_method']=='Bank') echo 'selected'; ?>>Bank</option>
            </select>

        <label>Transaction ID: <span>*</span></label>
            <input type="text" name="trn-id" value="<?php echo isset($donor['transaction_id']) ? htmlspecialchars($donor['transaction_id']) : ''; ?>" required>

        <label>Donation Date: <span>*</span></label>
            <input type="date" name="donation-date" value="<?php echo isset($donor['donation_date']) ? htmlspecialchars($donor['donation_date']) : ''; ?>" required>

        <label>Donation Time: <span>*</span></label>
            <input type="time" name="donation-time" value="<?php echo isset($donor['donation_time']) ? htmlspecialchars($donor['donation_time']) : ''; ?>" required>

        <label>Phone (optional)</label>
            <input type="tel" name="phone" value="<?php echo isset($donor['phone']) ? htmlspecialchars($donor['phone']) : ''; ?>">

        <label>Address (optional)</label>
            <textarea name="address" rows="3"><?php echo isset($donor['address']) ? htmlspecialchars($donor['address']) : ''; ?></textarea>

        <label>Anonymous Donation</label>
        <div class="radio-group">
                <label><input type="radio" name="anonymous" value="YES" <?php if(isset($donor['anonymous']) && $donor['anonymous']=='YES') echo 'checked'; ?>> YES</label>
                <label><input type="radio" name="anonymous" value="NO" <?php if(isset($donor['anonymous']) && $donor['anonymous']=='NO') echo 'checked'; ?>> NO</label>
        </div>

        <button type="submit" name="update">Update Donation</button>
    </form>

<?php else: ?>
    <p style="text-align:center;">No donation found for this ID.</p>
<?php endif; ?>

</body>
</html>
