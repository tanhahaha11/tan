<?php



$adminerror = '';
    
    if(isset($_POST['submit_admin'])){
        $adminuser = $_POST['adminuser'];
        $adminpass = $_POST['adminpass'];
    
        if($adminuser == 'admin' && $adminpass == 'admin123'){
            header("Location: home.html");
            exit();
        } else {
            $adminerror = "The Username or Password is Incorrect.";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="x-icon" href="au.png">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
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
   height: 520px;
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
      <h3>Admin Log in</h3>
      <?php if(isset($adminerror)): ?>
                <p class="msg-error"><?php echo $adminerror; ?></p><br>
            <?php endif; 
      ?>
      <input type="text" name="adminuser" required placeholder="enter your email">
      <input type="password" name="adminpass" required placeholder="enter your password">
      <input type="submit" name="submit_admin" value="login now" class="form-btn">
     
   </form>
   
</div>

</body>
</html>