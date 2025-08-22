<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST" ) {
        // Collect data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $amount = $_POST['amount'];
        $payment_method = $_POST['payment'];
        $transaction_id = $_POST['trn-id'];
        $donation_date = $_POST['donation-date'];
        $donation_time = $_POST['donation-time'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $anonymous = $_POST['anonymous'];

        $sql = "INSERT INTO donations (name, email, amount, payment_method,	transaction_id,	donation_date, donation_time, phone, address, anonymous) 
        VALUES ('$name', '$email', '$amount', '$payment_method', '$transaction_id', '$donation_date', '$donation_time', '$phone', '$address', '$anonymous')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you, $name! Your donation has been received";
    } else {
        echo "Error: " . $conn->error;
    }

}

?>