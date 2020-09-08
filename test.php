<html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "11235813";
    $dbname = "information_schema";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT COUNT(COLUMN_NAME)
FROM INFORMATION_SCHEMA.COLUMNS
WHERE
    TABLE_SCHEMA = 'teachers'
    AND TABLE_NAME = 'Teachers'";

    $result = $conn->query($sql);
    // var_dump($result);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_array()) {
            echo $row["COUNT(COLUMN_NAME)"];
        }
    }
    $conn->close();
?>
</html>

