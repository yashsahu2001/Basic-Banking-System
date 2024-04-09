<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Transfer Money</h1>
    </header>
    <main>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $database = "banking_system";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Form submission handling
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $sender_id = $_POST['sender_id'];
            $receiver_id = $_POST['receiver_id'];
            $amount = $_POST['amount'];

            // Validate input (e.g., check if sender has sufficient balance, etc.)

            // Perform money transfer (update sender's and receiver's balances)
            $sql_update_sender_balance = "UPDATE customers SET current_balance = current_balance - $amount WHERE id = $sender_id";
            $sql_update_receiver_balance = "UPDATE customers SET current_balance = current_balance + $amount WHERE id = $receiver_id";

            if ($conn->query($sql_update_sender_balance) === TRUE && $conn->query($sql_update_receiver_balance) === TRUE) {
                echo "Money transferred successfully";
            } else {
                echo "Error: " . $conn->error;
            }
        }

        $conn->close();

        // After performing the money transfer and showing success message
        echo "<p>Money transferred successfully</p>";
        echo "<button onclick='window.print()'>Print Receipt</button>";
        ?>

    </main>
    <footer>
        <p>&copy; 2024 NIO Bank</p>
    </footer>
</body>

</html>