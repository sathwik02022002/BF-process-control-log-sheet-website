<?php 

require_once("connect.php");
//require_once("connect.php");
   //$query1="select * from executivename";
   //$stmt1 = oci_parse ($conn,$query1);
   //oci_execute($stmt1);
   $names=array("sathwik","shashank","pavan","ahmed");
   //while (($row = oci_fetch_array($stmt, OCI_BOTH)) != false) 
      //{
        //$name = $row['NAME'];
        //array_push($names,$name);
      //}
$shift = $_GET['shift'];
$tdate = $_GET['tdate'];
$bf = $_GET['bf'];
$query = " select TDATE,EXECUTIVE,APPS1,APPS2,DBS1,DBS2,DCS1,DCS2,DEV,LAB,APPSTORE,DCSTORE,FIRE,NW,L2PC,BHSI,CR,REMOTE from hardware where SHIFT='".$shift."' and TDATE='".$tdate."'and BF='".$bf."'";
$stmt = oci_parse ($conn, $query);
oci_execute($stmt, OCI_DEFAULT);
if (($row = oci_fetch_array($stmt, OCI_BOTH)) != false)
{   
            $tdate1=$row['TDATE'];
            $executive=$row['EXECUTIVE'];
            $apps1=$row['APPS1'];
            $apps2=$row['APPS2'];
            $dbs1=$row['DBS1'];
            $dbs2=$row['DBS2'];
            $dcs1=$row['DCS1'];
            $dcs2=$row['DCS2'];
            $dev=$row['DEV'];
            $lab=$row['LAB'];
            $appstore=$row['APPSTORE'];
            $dcstore=$row['DCSTORE'];
            $fire=$row['FIRE'];
            $nw=$row['NW'];
            $l2pc=$row['L2PC'];
            $bhsi=$row['BHSI'];
            $cr=$row['CR'];
            $remote=$row['REMOTE'];
            
}
$query1 = " select XML,MIMIC,L2HMI,L1OPC,L2SERVICE,L3ERP,BF1,TEMP,ACSTATUS,UPS,BACKUP,HOUR,MIN,REMARK from application_environment where SHIFT='".$shift."' and TDATE='".$tdate."'and BF='".$bf."'";
$stmt1 = oci_parse ($conn, $query1);
oci_execute($stmt1, OCI_DEFAULT);
if (($row = oci_fetch_array($stmt1, OCI_BOTH)) != false)
{   
            $xml=$row['XML'];
            $mimic=$row['MIMIC'];
            $l2hmi=$row['L2HMI'];
            $l1opc=$row['L1OPC'];
            $l2service=$row['L2SERVICE'];
            $l3erp=$row['L3ERP'];
            $bf1=$row['BF1'];
            $temp=$row['TEMP'];
            $acstatus=$row['ACSTATUS'];
            $ups=$row['UPS'];
            $backup=$row['BACKUP'];
            $hour=$row['HOUR'];
            $min=$row['MIN'];
            if($row['REMARK']!='#')
            {
                $remark=$row['REMARK'];
            }
            else{
                $remark='';
            }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
    <style>
     *{
         box-sizing:border-box;
     }
     html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background:#a7c7ec;
}
     .parent{
       display:flex;
     }
     .child{
        padding:2em;
        border: 5px solid black;
     }
     h1,h2{
       text-align:center;
       text-decoration-line:underline;
     }
     h3{
       text-decoration-line:underline;
       text-decoration-style:double;
       font-family:"Times New Roman";
     }
     
     input{
       height:20px;
       flex:0 0 200px;
       margin-left:10px;
     }
     button{
       margin-top: 5px;
       padding-top:5px;
       padding-right: 20px;
       padding-left:20px;
       text-align:center;
       
    }
    button,a{
        color:white;
    }
     div>table{
       float:left;
     }
     a{
       text-decoration:none !important;
    }
    a:hover{
      color:white !important;
      text-decoration:none !important;
      cursor:pointer !important;
    }
    table,th,td{
        border: solid;
        background-color:#d3dae0;
    }
    select{
      width:100px;
    }
    .row{
     display:flex;
    }
    .column
    {
      flex:50%;;
      padding:5px;
    }
    #steel{
        position:absolute;
        top:10px;
        left:265px;
    }
    #blast{
        
        position:absolute !important;
        top:10px !important;
        right:260px !important;
    
    }
     </style>
</head>
<body class="bg-dark">

        
    
<div style="text-align:center; background-color:white; border:5px outset #2f76c7e3; width:60%;"><img id="steel" src="VSP.jpeg" alt="Vizag Steel Plant" height="110" width="100" ><h1 sytle="font-size:30px;"><em> <b><u>Vizag Steel Plant</u><b></em></h1><img id="blast" src="download.jpg" alt="Vizag Steel Plant" height="110" width="100" style="text-align:center;" >

<h2><em><b><u>BF Process Control System Log</u></b></em></h2>
</div>
<br>
<br>
    <form action="" method="post">
      <div>
    <table class="table" >
   
      <tr><th><label for="birthday">Date: </label></th>
    <td><input type="text" id="birthday" class="form-control"  name="date" value="<?php echo ($tdate1)?>" size="6" readonly></td>
    </tr>
    <tr>
      <th><label for="shift">Shift:   </label></th>
      <td><select name="shift" id="shift">
      <option value="<?php echo $shift?>"><?php echo $shift?></option>
                
      </select>
    </td>
    </tr>
    <tr>
      <th><label for="bf">BF:   </label></th>
      <td><select name="bf" id="bf">
      <option value="<?php echo $bf?>"><?php echo $bf?></option>
                
      </select>
    </td>
    </tr>
      <tr>
        <th><label for="executive">Service Executive name: </label></th>
        <td><select name="executive" id="executive">
        <option value="<?php echo $executive?>"><?php echo $executive?></option>
          
        </select>
    </td>
    </tr>
    </table>
    </div>
    
    
    <h2>BF Status</h2>
    <br>
    
    <table class="table">
    <tr><div style="text-align:center"><span style="font-size:30px;"><em>&emsp;&emsp;&emsp;<u>Hardware</u>  &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;   <u>Application</u></em></span> </div></tr>
  </table>
  <div class="row">
      <div class="column">
    <table>
    <tr>
    
              <th><label for="apps1">App Server 1 :</label></th>
              <td><select name="apps1" id="apps1">
                <option value="<?php echo $apps1?>"><?php echo $apps1?></option>
                
              </select>
          
            </td>
    </tr>
    <tr>
    
    <th><label for="apps2">App Server 2 :</label></th>
    <td><select name="apps2" id="apps2">
    <option value="<?php echo $apps2?>"><?php echo $apps2?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dbs1">DB Server 1 :</label></th>
    <td><select name="dbs1" id="dbs1">
    <option value="<?php echo $dbs1?>"><?php echo $dbs1?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dbs2">DB Server 2 :</label></th>
    <td><select name="dbs2" id="dbs2">
    <option value="<?php echo $dbs2?>"><?php echo $dbs2?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dcs1">DC Server 1 :</label></th>
    <td><select name="dcs1" id="dcs1">
    <option value="<?php echo $dcs1?>"><?php echo $dcs1?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dcs2">DC Server 2 :</label></th>
    <td><select name="dcs2" id="dcs2">
    <option value="<?php echo $dcs2?>"><?php echo $dcs2?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dev">Dev PC :</label></th>
    <td><select name="dev" id="dev">
    <option value="<?php echo $dev?>"><?php echo $dev?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="lab">Lab PC :</label></th>
    <td><select name="lab" id="lab">
    <option value="<?php echo $lab?>"><?php echo $lab?></option>
      
    </select>

  </td>
</tr>
    </table>
    </div>
<div class="column">
    <table> 
        
<tr>
    
    <th><label for="appstore">App Storage :</label></th>
    <td><select name="appstore" id="appstore">
    <option value="<?php echo $appstore?>"><?php echo $appstore?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dcstore">DC Storage :</label></th>
    <td><select name="dcstore" id="dcstore">
    <option value="<?php echo $dcstore?>"><?php echo $dcstore?></option>
    
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="fire">Firewall :</label></th>
    <td><select name="fire" id="fire">
    <option value="<?php echo $fire?>"><?php echo $fire?></option>
      

  </td>
</tr>
<tr>
    
    <th><label for="nw">N/W Switch :</label></th>
    <td><select name="nw" id="nw">
    <option value="<?php echo $nw?>"><?php echo $nw?></option>
     
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="l2pc">L2 HMI PC :</label></th>
    <td><select name="l2pc" id="l2pc">
    <option value="<?php echo $l2pc?>"><?php echo $l2pc?></option>
    
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="bhsi">BHSI PC :</label></th>
    <td><select name="bhsi" id="bhsi">
    <option value="<?php echo $bhsi?>"><?php echo $bhsi?></option>
    
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="cr">C/R L2 PC :</label></th>
    <td><select name="cr" id="cr">
    <option value="<?php echo $cr?>"><?php echo $cr?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="remote">Remote PC :</label></th>
    <td><select name="remote" id="remote">
    <option value="<?php echo $remote?>"><?php echo $remote?></option>
      
    </select>

  </td>
</tr>

    </table>
    </div>
    <div class="column"> 
  <table>
  
<tr>
    
    <th><label for="xml">XML :</label></th>
    <td><select name="xml" id="xml">
    <option value="<?php echo $xml?>"><?php echo $xml?></option>
     
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="mimic">MIMIC :</label></th>
    <td><select name="mimic" id="mimic">
    <option value="<?php echo $mimic?>"><?php echo $mimic?></option>
     
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="l2hmi">L2 HMI :</label></th>
    <td><select name="l2hmi" id="l2hmi">
    <option value="<?php echo $l2hmi?>"><?php echo $l2hmi?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="l1opc">L1 OPC Link :</label></th>
    <td><select name="l1opc" id="l1opc">
    <option value="<?php echo $l1opc?>"><?php echo $l1opc?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="l2service">L2 Services :</label></th>
    <td><select name="l2service" id="l2service">
    <option value="<?php echo $l2service?>"><?php echo $l2service?></option>
     
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="l3erp">L3/ERP Link :</label></th>
    <td><select name="l3erp" id="l3erp">
    <option value="<?php echo $l3erp?>"><?php echo $l3erp?></option>
     
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="bf1">BF1 Portal :</label></th>
    <td><select name="bf1" id="bf1">
    <option value="<?php echo $bf1?>"><?php echo $bf1?></option>
      
    </select>

  </td>
</tr>
</table>
  </div>
  </div>   
  <br>
  <br>
<table class="table">
      <tr><div style="text-align:center"><span style="font-size:30px;"><em><u>Environment</u></em></span></div></tr>
      
      <tr>
          <th><label>Temperature :</label></th>
          <td><input type="text" placeholder="Enter value in degree celcius" name="temp" maxlength="2" value="<?php echo $temp?>" readonly></td>
    </tr>
    <tr>
    
    <th><label for="acstatus">A/C Status :</label></th>
    <td><select name="acstatus" id="acstatus">
    <option value="<?php echo $acstatus?>"><?php echo $acstatus?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="ups">UPS/Power supply status :</label></th>
    <td><select name="ups" id="ups">
    <option value="<?php echo $ups?>"><?php echo $ups?></option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="backup">Backup taken  :</label></th>
    <td><select name="backup" id="backup">
    <option value="<?php echo $backup?>"><?php echo $backup?></option>
      
      
    </select>

  </td>
</tr>
  <tr>
          <th><label for="system">System downtime :</label></th>
          <td><input type="text" placeholder="Hours" name="hr" value="<?php echo $hour?>" readonly>
          <label for="system">hours</label>
          <input type="text" placeholder="Minutes" name="min" value="<?php echo $min?>" readonly>
          <label for="system">min</label></td>

    </tr>
    <tr>
          <th><label for="remark">Remarks(not mandatory) :</label></th>
          <td><input type="text" name="remark" size="30" value="<?php echo $remark?>" readonly></td>
      
    </tr>

    </table>   
                                        
     <button type="submit" class="btn btn-danger btn-large "><a href="display.php">Back</a></button>                                      
     <br>
     <br>
   </form>
   </div>

                        
    
</body>
</html>
