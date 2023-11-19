<?php
// Step 1: Create a MySQL connection
$servername = "your_mysql_server";
$username = "your_mysql_username";
$password = "your_mysql_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Fetch data from the math table
$sql = "SELECT x, y FROM math";
$result = $conn->query($sql);

// Step 3: Perform the addition of x and y values
$sum = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sum += $row['x'] + $row['y'];
    }
}

// Step 4: Display the result in an HTML page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Addition</title>
</head>
<body>
    <h1>Sum of x and y values in the math table: <?php echo $sum; ?></h1>
</body>
</html>

<?php
// Close the MySQL connection
$conn->close();
?>
