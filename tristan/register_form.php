<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="x-icon" href="au.png">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   <link rel="stylesheet" href="main.css">

</head>
<style>
   .form-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
    background: #eee;
    background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url(background.jpg);
    background-size: cover;
    background-position: center;   
}
.form-container form {
   position: relative;
   background-color: hsla(0, 0%, 10%, .1);
   border: 2px solid white;
   margin-inline: 1.5rem;
   padding: 2.5rem 1.5rem;
   border-radius: 1rem;
   backdrop-filter: blur(3px);
   width: 40rem;
   height: cover;
}
.form-container form h3 {
    font-size: 30px;
    text-transform: uppercase;
    margin-bottom: 2rem;
    color: white;
}
.form-container form input,
.form-container form select{
   row-gap: 1.75rem;
   margin-bottom: 1.5rem;
   grid-template-columns: max-content 1fr;
   align-items: center;
   column-gap: .75rem;
   font-size: 23px;
   border-bottom: 2px solid white;
   backdrop-filter: blur(3px);

}
.form-container form p {
   margin-top: 10px;
   font-size: 25px;
   color: white;
}
.form-container form p a {
   color: crimson; 
}
</style>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">Student</option>
         
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>

</div>

</body>
</html>