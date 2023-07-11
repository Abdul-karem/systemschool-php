<!-- Add supject in the index2 supject -->
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $name = $_POST['Subject_Name'];
    $description = $_POST['description'];
    $result = $_POST['result'];

    // Validate and sanitize the data (you can add your own validation logic here)

    // Create a connection to the database
    $conn = mysqli_connect('localhost', 'root', '', 'sestem-school');
    if (!$conn) {
        die('Failed to connect to the database: ' . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO supjects (Subject_Name, description, result) VALUES ('$name', '$description', '$result')";

    // Execute the statement
    if (mysqli_query($conn, $sql)) {
        // Data saved successfully
        echo "Data saved successfully!";
    } else {
        // Failed to save the data
        echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>