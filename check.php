<?php 

 require_once("connect.php");
$msg="";
$flag=1;
session_start();
 if(isset($_POST['name'])&& isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword']))
 {
     $name=$_POST['name'];
     $username=$_POST['username'];
     $password=$_POST['password'];
     $repassword=$_POST['repassword'];
     if($password != $repassword)
     {
        
        $msg="Password is not equal Please recheck!!!";
        $_SESSION["error"]=$msg;
     }
     else{
        $query="insert into login (NAME,USERNAME,PASSWORD) values ('$name','$username','$password')";
        $stmt = oci_parse ($conn,$query);
        oci_execute($stmt);
        $flag=0;
        $msg="Account created";
        $_SESSION["error"]=$msg;
     }
   }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
p{
  color:black;
}
</style>
</head>
<body>

<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <p><?php echo $msg?></p>
</div>

</body>
</html>
<?php
     if($flag==0)
     {
        
        header("location:index.php"); 
     }
     else{
      header("location:signup.php");
     }

 
 
?>