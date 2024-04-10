<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="x-icon" href="au.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve List</title>
    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[6]; 
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
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .banner {
    width: 100%;
    height: 100vh;
    background-color: lightblue;
    
}
.navbar {
    width: 85%;
    margin: auto;
    padding: 5px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.logo {
    width: 100px;
    cursor: pointer;
}
img {
    width: 60px;
}
.navbar ul li {
    list-style: none;
    display: inline-block;
    margin: 0 20px;
    position: relative;
}
.navbar ul li a {
    text-decoration: none;
    color: black;
    text-transform: uppercase;
}
.navbar ul li::after {
    content: '';
    height: 3px;
    width: 0%;
    background: #009688;
    position: absolute;
    left: 0;
    bottom: -10px;
    transition: 0.5s;
}
.navbar ul li:hover::after {
    width: 100%;
}
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td, h2{
            padding: 15px;
            border-bottom: 1px solid black;
            font-size: 20px;
            text-align: center;
            border: 1px solid black;
            
            
        }
        th {
            background-color: black;
            background-color: blue;
        }
        tr:hover {
            background-color: white;
        }
        .scrollable-table {
            max-height: 500px;
            overflow-y: auto;
        }
        /* Style for search bar */
        
    .search-container {
        margin-top: 20px;
        text-align: right;
    }

    .search-container input[type=text] {
        padding: 10px;
        margin: 5px;
        width: 200px;
        box-sizing: border-box;
        border: 1px solid #ccc; 
        border-radius: 5px; 
        outline: none; 
    }

    .search-container button {
        padding: 10px;
        background-color: blue;
        color: white;
        border: none;
        border-radius: 5px; /* Add border radius */
        cursor: pointer;
    }

    /* Style button on hover */
    .search-container button:hover {
        background-color: darkblue;
    }
</style>

    </style>
</head>
<body>
<div class="banner">
        <div class="navbar">
            <img src="au.png" alt="logo">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="admin.php">Reservation List</a></li>
                <li><a href="loginpage.php">Log out</a></li>
                
            </ul>
        </div>
    <h2>Reserved Books</h2>
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search...">
        <button onclick="searchTable()">Search</button>
    </div>
    
    <div class="scrollable-table">
        <table>
            <thead>
                <tr>
                    <th>Accession No.</th>
                    
                    
                    <th>Name</th>
                    <th>LRN ID</th>
                    <th>Grade&Section</th>
                    <th>Adviser</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>User Type</th>
                    <th>Student Type</th>
                    <th>Faculty Type</th>
                    <th>Date Borrowed</th>
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
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['accessionNo'] . "</td>";
                        
                        
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
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='15'>No Reserve Books</td></tr>";
                }

                
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>
