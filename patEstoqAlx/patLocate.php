<?php
// Replace these with your database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pgdatabase";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$searchValue = isset($_POST['patNumber']) ? $_POST['patNumber'] : '';

// Assuming you have a table named 'your_table' with columns 'column1', 'column2', etc.
    $sql = "SELECT id, item, marca, modelo, condicao FROM patrimonio WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchValue);
    
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Output data of each row
        $row = $result->fetch_assoc();
        $value1 = $row['id'];
        $value2 = $row['item'];
        $value3 = $row['marca'];
        $value4 = $row['modelo'];
        $value5 = $row['condicao'];
    } else {
        echo "0 results";
    }
    
    $stmt->close();
    $conn->close();
    ?>
