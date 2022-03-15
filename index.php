<?php 
 require_once("connect.php");
 $query="select * from login";
 $stmt = oci_parse ($conn,$query);
 oci_execute($stmt);
 $flag=1;
 $msg="";
 session_start();
 if(isset($_POST['username']) && isset($_POST['password']))
 {
     $username=$_POST['username'];
     $password=$_POST['password'];
     while (($row = oci_fetch_array($stmt, OCI_BOTH)) != false) 
                                
     // while ($row = oci_fetch_array($stmt))
      {
          $uusername = $row['USERNAME'];
          $ppassword = $row['PASSWORD'];
          if($username=== $uusername && $password===$ppassword)
          {
              $_SESSION["name"]=$row['NAME'];
              $flag=0;
              
          }
      }
      if($flag==1){
         $msg="Invalid Username or Password!!";
         $_SESSION["error"]=$msg;
         //header("location:login.html");
     }
     else
     {
        header("location:display.php");
     }    
 }
 
    
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="login_signup.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
   </head>
   <body>
   
      <div class="wrapper">
        <img src="VSP.jpeg" alt="Vizag steel plant" height="90" width="150" style="text-align: center;">
        
        <form action="" method="post">
        <br>
   <div style="text-align:center;  text-decoration-thickness: auto; font-size: 20px;">BF Process Control System Log Sheet</div>
   <br>
   <div style="text-align:center;  text-decoration-thickness: auto; font-size: 30px;">Login</div>
   <br>
   <?php
    if(isset($_SESSION["error"]))
    {
      $error=$_SESSION["error"];
      echo "<span> $error </span>";
    }
  ?>
  <br>
        <div class="form-group">
    <label >Email address</label>
    
    <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" name="username" required>
    
  </div>
  <br>
  <div class="form-group">
    <label>Password</label>
    
    <input type="password" class="form-control" placeholder="Password" name="password" required>
    
    
  </div>
  <br>
  
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
  <br>
  <div class="signup-link">
                     Not a member? <a href="signup.php">Signup now</a>
                  </div>
</form>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
         
      </script>
   </body>
</html>
<?php
unset($_SESSION["error"])
?>