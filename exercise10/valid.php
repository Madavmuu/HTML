<?php

$errors = array();

$username   = $_POST['username'];
$password   = $_POST['password'];
$fullname   = $_POST['fullname'];
$cardnumber = $_POST['cardnumber'];
$email      = $_POST['email'];
$phone      = $_POST['phone'];

if (!preg_match("/^[A-Za-z0-9_]{3,20}$/", $username)) {
    $errors[] = "Invalid username.";
}

if (!preg_match("/^.{6,}$/", $password)) {
    $errors[] = "Password must contain at least 6 characters.";
}

if (!preg_match("/^[A-Za-z ]+$/", $fullname)) {
    $errors[] = "Invalid full name.";
}

if (!preg_match("/^[0-9]{16}$/", $cardnumber)) {
    $errors[] = "Credit card number must contain exactly 16 digits.";
}

if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/", $email)) {
    $errors[] = "Invalid email format.";
}

if (!preg_match("/^[0-9]{10}$/", $phone)) {
    $errors[] = "Invalid phone number.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            padding: 25px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }

        h2 {
            color: green;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        td:first-child {
            font-weight: bold;
            background-color: #f5f5f5;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

<?php

if (empty($errors)) {

    echo "<h2>Registration Successful!</h2>";

    echo "<p>All details are valid.</p>";

    echo "<table>";

    echo "<tr>";
    echo "<td>User Name</td>";
    echo "<td>" . htmlspecialchars($username) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Password</td>";
    echo "<td>" . htmlspecialchars($password) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Full Name</td>";
    echo "<td>" . htmlspecialchars($fullname) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Credit Card Number</td>";
    echo "<td>" . htmlspecialchars($cardnumber) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Email Address</td>";
    echo "<td>" . htmlspecialchars($email) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Phone Number</td>";
    echo "<td>" . htmlspecialchars($phone) . "</td>";
    echo "</tr>";

    echo "</table>";

} else {

    echo "<h2 class='error'>Validation Errors</h2>";

    foreach ($errors as $error) {
        echo "<p class='error'>" . htmlspecialchars($error) . "</p>";
    }

}

?>

</div>

</body>
</html>