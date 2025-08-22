<?php 

$error ="";
$success = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $X = $_POST['email'];
    $Y = $_POST['password'];

    if(empty($X) || empty($Y)){
        $error = "All fields are required";
    }
    
    if ($error == "" && (!strpos($X, "@") || !strpos($X, "."))){
        $error = "Email must contain @ and .";
    }

    if($error == "" && strlen($Y) < 8) {
        $error = "Password must be at least 8 chars";
    }
    
    if($error == ""){
        $success = "Form Submitted Sccessfully!!";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <h2> Login Form</h2>

        <?php if ($success != "") echo "<small style='color:green;'>$success</small>"?>

    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="text" name="email">
        <?php if ($error != "") echo "<small style='color:red;'>$error</small>"?>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" name="password">
        
        <br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>