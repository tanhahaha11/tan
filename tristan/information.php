<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="information.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td, h2{
            padding: 15px;
            border-bottom: 1px solid #ddd;
            font-size: 20px;
            text-align: center;
        }
        th {
            background-color: lightblue;
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
    <h2>Reserved Books</h2>
    <!-- Add Search Bar -->
    <div>
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for titles...">
    </div>
    <!-- End Search Bar -->
    <div class="scrollable-table">
        <table>
            <thead>
                <tr>
                    <th>Accession No.</th>
                    <th>Author</th>
                    <th>ID</th>
                    <th>Book ID</th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Section</th>
                    <th>LRN</th>
                    <th>Title</th>
                    <th>User Type</th>
                    <th>Student Type</th>
                    <th>Faculty Type</th>
                    <th>Date Borrowed</th>
                    <th>Date Due</th>
                    <th>Date Returned</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tantan";

                
                $conn = new mysqli($servername, $username, $password, $dbname);

                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                
                $sql = "SELECT * FROM reservations";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['accessionNo'] . "</td>";
                        echo "<td>" . $row['contact'] . "</td>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['productId'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['grade'] . "</td>";
                        echo "<td>" . $row['section'] . "</td>";
                        echo "<td>" . $row['adviser'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['userType'] . "</td>";
                        echo "<td>" . $row['studentType'] . "</td>";
                        echo "<td>" . $row['facultyType'] . "</td>";
                        echo "<td>" . $row['dateBorrowed'] . "</td>"; 
                        echo "<td>" . $row['dateDue'] . "</td>";
                        echo "<td>" . $row['dateReturned'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='15'>No Reserved Books</td></tr>";
                }

                
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function searchTable() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[8]; // Change index based on the column you want to search (0-based index)
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
