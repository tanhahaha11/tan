<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .scrollable-table {
            max-height: 500px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <h2>All Orders</h2>
    <div class="scrollable-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Section</th>
                    <th>Adviser</th>
                    <th>Contact</th>
                    <th>Title</th>
                    <th>User Type</th>
                    <th>Student Type</th>
                    <th>Faculty Type</th>
                    <th>Date Borrowed</th>
                    <th>Accession No.</th>
                    <th>Date Due</th>
                    <th>Date Returned</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database configuration
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tantan";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Select all data from the reservations table
                $sql = "SELECT * FROM reservations";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['productId'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['grade'] . "</td>";
                        echo "<td>" . $row['section'] . "</td>";
                        echo "<td>" . $row['adviser'] . "</td>";
                        echo "<td>" . $row['contact'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['userType'] . "</td>";
                        echo "<td>" . $row['studentType'] . "</td>";
                        echo "<td>" . $row['facultyType'] . "</td>";
                        echo "<td>" . $row['dateBorrowed'] . "</td>";
                        echo "<td>" . $row['accessionNo'] . "</td>";
                        echo "<td>" . $row['dateDue'] . "</td>";
                        echo "<td>" . $row['dateReturned'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='15'>No orders found</td></tr>";
                }

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
