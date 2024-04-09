<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Customers</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>View All Customers</h1>
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

        // Query to fetch all customers
        $sql = "SELECT * FROM customers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<h2>Name: " . $row["name"] . "</h2>";
                echo "<p>Email: " . $row["email"] . "</p>";
                echo "<p>Current Balance: " . $row["current_balance"] . "</p>";
                // You can add more fields as per your database schema
                echo "</div>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>

    </main>
    <footer>
        <p>&copy; 2024 NIO Bank</p>
    </footer>
</body>

</html>