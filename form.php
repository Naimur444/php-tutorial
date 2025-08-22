<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 10px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select, textarea, button {
            width: 100%;
            padding: 5px;
            margin-top: 3px;
        }
        span {
            color: red;
        }
        .radio-group {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }
        button {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <form action="donate.php" method="POST">
        <h1>Donation Form</h1>

        <label>Name: <span>*</span></label>
        <input type="text" name="name" required>

        <label>Email: <span>*</span></label>
        <input type="email" name="email" required>

        <label>Donation Amount: <span>*</span></label>
        <input type="number" name="amount" required>

        <label>Payment Method: <span>*</span></label>
        <select name="payment" required>
            <option value="bKash">bKash</option>
            <option value="Nagad">Nagad</option>
            <option value="Card">Card</option>
            <option value="Bank">Bank</option>
        </select>

        <label>Transaction ID: <span>*</span></label>
        <input type="text" name="trn-id" required>

        <label>Donation Date: <span>*</span></label>
        <input type="date" name="donation-date" required>

        <label>Donation Time: <span>*</span></label>
        <input type="time" name="donation-time" required>

        <label>Phone (optional)</label>
        <input type="tel" name="phone">

        <label>Address (optional)</label>
        <textarea name="address" rows="3"></textarea>

        <label>Anonymous Donation</label>
        <div class="radio-group">
            <label><input type="radio" name="anonymous" value="YES" required> YES</label>
            <label><input type="radio" name="anonymous" value="NO"> NO</label>
        </div>

        <button type="submit">Donate</button>
    </form>
</body>
</html>
