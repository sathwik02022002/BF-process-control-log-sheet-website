 <?php
 $conn = oci_connect("system","tiger","XE");
 
 if (!$conn){  
    die(oci_parse_error($conn));       
 }  


 //if ($conn){
   // echo "connection successfull";
//}else{

   // die(oci_parse_error($conn));
//}
?>