<?php
include 'connect.php';
session_start();
if($_SESSION["name"])
{
if(isset($_GET['shift']) && isset($_GET['tdate']) && isset($_GET['bf'])){
    $shift=$_GET['shift'];
    $tdate=$_GET['tdate'];
    $bf=$_GET['bf'];
    $query1="DELETE from application_environment where SHIFT='".$shift."' AND TDATE='".$tdate."' AND BF='".$bf."'";
    $stmt1 = oci_parse ($conn,$query1);
    oci_execute($stmt1);
    $query="DELETE from hardware where SHIFT='".$shift."' AND TDATE='".$tdate."' AND BF='".$bf."'";
    $stmt = oci_parse ($conn,$query);
    oci_execute($stmt);
    
    if($stmt && $stmt1){
        oci_commit($conn);
        header('location:display.php');
    }else{
        die(oci_parse_error($conn));
    }
}
else
{
    echo "Not changing";
}
}
else{
    header("location:index.php");
}
?>
<!DOCTYPE html>
   <html>
   <head></head>
   <body>
       <h1><?php echo $shift?></h1>
       <h1><?php echo $tdate?></h1>
       <h1><?php echo $bf?></h1>
</body>
</html>