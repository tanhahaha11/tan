<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1000px; /* Adjusted width */
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Added to handle horizontal overflow */
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px; /* Increased padding for better spacing */
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reservation Details</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Section</th>
                    <th>Adviser</th>
                    <th>Contact Number</th>
                    <th>Title of Book</th>
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
                // Establish connection to the database
                $pdo = new PDO('mysql:host=localhost;dbname=tristan', 'root', '');
                // Fetch data from the database
                $stmt = $pdo->query('SELECT * FROM reservations');
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['grade']}</td>";
                    echo "<td>{$row['section']}</td>";
                    echo "<td>{$row['adviser']}</td>";
                    echo "<td>{$row['contact']}</td>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['userType']}</td>";
                    echo "<td>{$row['studentType']}</td>";
                    echo "<td>{$row['facultyType']}</td>";
                    echo "<td>{$row['dateBorrowed']}</td>";
                    echo "<td>{$row['accessionNo']}</td>";
                    echo "<td>{$row['dateDue']}</td>";
                    echo "<td>{$row['dateReturned']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
