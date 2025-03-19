<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test_db"; // Ensure this matches your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $query = trim($_POST["query"]);

    // Restrict dangerous queries (optional)
    $restricted = ["DROP DATABASE", "DROP USER"];
    foreach ($restricted as $term) {
        if (stripos($query, $term) !== false) {
            die("❌ Error: Unsafe SQL command detected!");
        }
    }

    // Execute the query
    if ($result = $conn->query($query)) {
        // Handle different query types
        if (stripos($query, "CREATE TABLE") !== false) {
            echo "✅ Table created successfully!";
        } elseif (stripos($query, "INSERT INTO") !== false) {
            echo "✅ Data inserted successfully! Rows affected: " . $conn->affected_rows;
        } elseif (stripos($query, "UPDATE") !== false) {
            echo "✅ Data updated successfully! Rows affected: " . $conn->affected_rows;
        } elseif (stripos($query, "DELETE") !== false) {
            echo "✅ Data deleted successfully! Rows affected: " . $conn->affected_rows;
        } elseif (stripos($query, "DROP TABLE") !== false) {
            echo "✅ Table dropped successfully!";
        } elseif (stripos($query, "SHOW TABLES") !== false) {
            // Display all tables in the database
            echo "<h3>Tables in Database:</h3><ul>";
            while ($row = $result->fetch_array()) {
                echo "<li>" . $row[0] . "</li>";
            }
            echo "</ul>";
        } else {
            // Display table data for SELECT queries
            if ($result instanceof mysqli_result) {
                echo "<table border='1'><tr>";
                while ($column = $result->fetch_field()) {
                    echo "<th>{$column->name}</th>";
                }
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>{$value}</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "✅ Query executed successfully.";
            }
        }
    } else {
        echo "❌ SQL Error: " . $conn->error;
    }
}

$conn->close();
?>