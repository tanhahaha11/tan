<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productId = $_POST['productId'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $section = $_POST['section'];
    $adviser = $_POST['adviser'];
    $contact = $_POST['contact'];
    $title = $_POST['title'];
    $userType = $_POST['userType'];
    $studentType = isset($_POST['studentType']) ? $_POST['studentType'] : null;
    $facultyType = isset($_POST['facultyType']) ? $_POST['facultyType'] : null;
    $dateBorrowed = $_POST['dateBorrowed'];
    $accessionNo = $_POST['accessionNo'];
   
    
    

   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tantan";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO reservations (productId, name, grade, section, adviser, contact, title, userType, studentType, facultyType, dateBorrowed, accessionNo)
            VALUES ('$productId', '$name', '$grade', '$section', '$adviser', '$contact', '$title', '$userType', '$studentType', '$facultyType', '$dateBorrowed', '$accessionNo')";

    
    if ($conn->query($sql) === TRUE) {
        
        echo "<script>alert('Reservation successful!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="au.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Done!</title>
</head>
<style>
    *{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}
.banner {
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url(background.jpg);
    background-size: cover;
    background-position: center;
}
.navbar {
    width: 85%;
    margin: auto;
    padding: 35px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.logo {
    width: 100px;
    cursor: pointer;
}
img {
    width: 100px;
}
.navbar ul li {
    list-style: none;
    display: inline-block;
    margin: 0 20px;
    position: relative;
}
.navbar ul li a {
    text-decoration: none;
    color: #fff;
    text-transform: uppercase;
    font-size: 100%;
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
.content {
    width: 100%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
    color: #fff;
}
.content h1 {
    font-size: 70px;
    margin-top: 80px;
}
.content p {
    margin: 20px auto;
    font-weight: 100;
    line-height: 25px;
    font-size: 30px;
}
 
</style>
<body>
  <div class="banner">
        <div class="navbar">
            <img src="au.png" alt="logo">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="books.html">Books</a></li>
                <li><a href="Thirdpage.html">About</a></li>
                <li><a href="login_form.php">Log out</a></li>
                
            </ul>
        </div>
  </div>
  <div class="content">
            <h1>Arellano University Jose Rizal Campus</h1>
            <p>Thankyou for your reservations.<br> Open at 6:00 A.M - 6:00 P.M</p>
        </div>
</body>
</html>