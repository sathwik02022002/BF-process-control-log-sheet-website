<?php 

session_start();
if($_SESSION["name"])
{


                include 'connect.php';
                $query = " select * from hardware ";
                $stmt = oci_parse ($conn, $query);
	             oci_execute($stmt,OCI_DEFAULT);
}
else{
    header("location:index.php");
}                


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="common.css">

<style>
    html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background:#a7c7ec;
}
    button,a{
        color:white;
    }
    .heading{
        font-weight:bold;
    }
    table,th,td{
        border: 1px solid black;
        
    }
    th{
       color:black !important;
    }
    #right
    {
        position:absolute;
        top:157px;
        right:60px;
    }
    #right1
    {
        position:absolute;
        top:155px;
        right:150px;
        color:white;
        background-color:#444dc2;
        border:none;
        border-radius:25px;
        text-align:center;
    }
    a{
       text-decoration:none !important;
    }
    a:hover{
      color:white !important;
      text-decoration:none !important;
      cursor:pointer !important;
    }
    
    #blast{
        
        position:absolute !important;
        top:5px !important;
        right:55px !important;
    
    }
    #steel{
        position:absolute;
        top:10px;
        left:85px;
    }
    .container
    {
        position:absolute;
        top:5px;

    }
</style>
<title>View Records</title>
</head>
<body class="bg-dark">

<div class="container">
    <div class="container">
    
    <div style="text-align:center; background-color:white; border:5px outset #2f76c7e3;"><img id="steel" src="VSP.jpeg" alt="Vizag Steel Plant" height="110" width="100" style="text-align:center;" ><h1 sytle="font-size:30px;"><em> <b><u>Vizag Steel Plant</u><b></em></h1><img id="blast" src="download.jpg" alt="Blast furnace" height="120" width="100" style="text-align:center;" >

   <h2><em><b><u>BF Process Control System Log</u></b></em></h2>
</div>
    <br>
    <button class="btn btn-primary"><a href="insert.php">Create</a></button>
    <?php 
    if($_SESSION["name"])
    {
    ?>
    <input type="text" value="Hello <?php echo $_SESSION["name"]?>!!" id="right1" size="35" readonly>
    <?php
    }
    ?>
    <button class="btn btn-danger" id="right"><a href="logout.php">Logout</a></button>
    
    <br>
    <br>
    <!--<marquee>-->
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table" id="customers" bordercolor="#ffffff">
                        <tr class="heading">
                            <th> Date </th>
                            <th> Shift </th>
                            <th> BF </th>
                            <th> Executive Name </th>
                            <th> Read </th>
                            <th> Update </th>
                            <th> Delete </th>
                        </tr>

                        <?php 
                           while (($row = oci_fetch_array($stmt, OCI_BOTH)) != false) 
                                
                               // while ($row = oci_fetch_array($stmt))
                                {
                                    $shift = $row['SHIFT'];
                                    $tdate = $row['TDATE'];
                                    $nameexecutive = $row['EXECUTIVE'];
                                    $bf=$row['BF'];
                                    
                        ?>
                                <tr>
                                    <td><?php echo $tdate ?></td>
                                    <td><?php echo $shift ?></td> 
                                    <td><?php echo $bf?></td>
                                    <td><?php echo $nameexecutive ?></td>
                                    <td><button class="btn btn-primary btn-block"><a href="read.php?shift=<?php echo $shift ?>&tdate=<?php echo $tdate?>&bf=<?php echo $bf?>">Read</a></button></td>
                                    <td><button class="btn btn-primary btn-block"><a href="update.php?shift=<?php echo $shift ?>&tdate=<?php echo $tdate?>&bf=<?php echo $bf?>">Update</a></button></td>
                                    <td><button class="btn btn-primary btn-block"><a href="delete.php?shift=<?php echo $shift ?>&tdate=<?php echo $tdate?>&bf=<?php echo $bf?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a></button></td>
                                </tr>        
                        <?php 
                                }  
                        ?>                                                                    
                               

                    </table>

                </div>

            </div>
        </div>
    <!--</marquee>-->
    </div>
</div>
</body>
</html>












 