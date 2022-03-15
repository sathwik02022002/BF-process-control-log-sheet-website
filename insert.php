<?php 
  session_start();
  if($_SESSION["name"])
  {
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
      }
      else{
        header("location:index.php");
      }
?>

<!DOCTYPE html>
   <html>
   <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
table,th,td{
        border:solid;
        background-color:#d3dae0;
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
    a{
       text-decoration:none !important;
    }
    a:hover{
      color:white !important;
      text-decoration:none !important;
      cursor:pointer !important;
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

<script type=text/javascript>
  function diffe(){
    var e =document.getElementById("shutdown");
    var struser = e.options[e.selectedIndex].text;
    if(struser == "no")
    {

      document.getElementById("hr").value=0;
      document.getElementById("min").value=0;
    }
    else
    {
      document.getElementById("hr").value=' ';
      document.getElementById("min").value=' ';
    }
  }
  </script>
   </head>
   <body class="bg-dark">
  
    
   <div style="text-align:center; background-color:white; border:5px outset #2f76c7e3; width:60%;"><img id="steel" src="VSP.jpeg" alt="Vizag Steel Plant" height="110" width="100" style="text-align:center;" ><h1 sytle="font-size:30px;"><em> <b><u>Vizag Steel Plant</u><b></em></h1><img id="blast" src="download.jpg" alt="Vizag Steel Plant" height="110" width="100" style="text-align:center;" >

   <h2><em><b><u>BF Process Control System Log </u></b></em></h2>
</div>
<br>
<br>
   <form action="insert1.php" method="post">
    <table class="table" >
   
      <tr><th><label for="birthday">Date: </label></th>
    <td><input type="date" id="birthday" class="form-control" 
     name="date" required></td>
    </tr>
    <tr>
      <th><label for="shift">Shift:   </label></th>
      <td><select name="shift" id="shift">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="G">G</option>
      </select>
    </td>
    </tr>
    <tr>
      <th><label for="bf">BF:   </label></th>
      <td><select name="bf" id="bf">
                <option value="BF1">BF1</option>
                <option value="BF2">BF2</option>
                <option value="BF3">BF3</option>
      </select>
    </td>
    </tr>
      <tr>
        <th><label for="executive">Service Executive name: </label></th>
        <td><select name="executive" id="executive">
          <option value="<?php echo $names[0]?>"><?php echo $names[0]?></option>
          <option value="<?php echo $names[1]?>"><?php echo $names[1]?></option>
          <option value="<?php echo $names[2]?>"><?php echo $names[2]?></option>
          <option value="<?php echo $names[3]?>"><?php echo $names[3]?></option>
        </select>
    </td>
    </tr>
    </table>
    
    
    
    <h2><b>BF Status<b></h2>
    <br>
    <table class="table">
    <tr><div style="text-align:center"><span style="font-size:30px;"><em>&emsp;&emsp; &emsp;<u>Hardware</u> &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;   <u>Application</u></em></span> </div></tr>
  </table>
    <div class="row">
      <div class="column">
        <table>
    <tr>
    
              <th><label for="apps1">App Server 1 :</label></th>
              <td><select name="apps1" id="apps1">
                <option value="ok">Ok</option>
                <option value="running">Running</option>
                <option value="other">Other</option>
              </select>
          
            </td>
    </tr>
    <tr>
    
    <th><label for="apps2">App Server 2 :</label></th>
    <td><select name="apps2" id="apps2">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dbs1">DB Server 1 :</label></th>
    <td><select name="dbs1" id="dbs1">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dbs2">DB Server 2 :</label></th>
    <td><select name="dbs2" id="dbs2">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dcs1">DC Server 1 :</label></th>
    <td><select name="dcs1" id="dcs1">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dcs2">DC Server 2 :</label></th>
    <td><select name="dcs2" id="dcs2">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dev">Dev PC :</label></th>
    <td><select name="dev" id="dev">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="lab">Lab PC :</label></th>
    <td><select name="lab" id="lab">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
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
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="dcstore">DC Storage :</label></th>
    <td><select name="dcstore" id="dcstore">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="fire">Firewall :</label></th>
    <td><select name="fire" id="fire">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="nw">N/W Switch :</label></th>
    <td><select name="nw" id="nw">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="l2pc">L2 HMI PC :</label></th>
    <td><select name="l2pc" id="l2pc">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="bhsi">BHSI PC :</label></th>
    <td><select name="bhsi" id="bhsi">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="cr">C/R L2 PC :</label></th>
    <td><select name="cr" id="cr">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="remote">Remote PC :</label></th>
    <td><select name="remote" id="remote">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
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
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="mimic">MIMIC :</label></th>
    <td><select name="mimic" id="mimic">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="l2hmi">L2 HMI :</label></th>
    <td><select name="l2hmi" id="l2hmi">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="l1opc">L1 OPC Link :</label></th>
    <td><select name="l1opc" id="l1opc">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="l2service">L2 Services :</label></th>
    <td><select name="l2service" id="l2service">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="l3erp">L3/ERP Link :</label></th>
    <td><select name="l3erp" id="l3erp">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="bf1">BF1 Portal :</label></th>
    <td><select name="bf1" id="bf1">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
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
          <td><input type="text" placeholder="Enter value in degree celcius" name="temp" maxlength="2" required></td>
    </tr>
    <tr>
    
    <th><label for="acstatus">A/C Status :</label></th>
    <td><select name="acstatus" id="acstatus">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="ups">UPS/Power supply status :</label></th>
    <td><select name="ups" id="ups">
      <option value="ok">Ok</option>
      <option value="running">Running</option>
      <option value="other">Other</option>
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="backup">Backup taken  :</label></th>
    <td><select name="backup" id="backup">
      <option value="yes">yes</option>
      <option value="no">no</option>
      
    </select>

  </td>
</tr>
<tr>
    
    <th><label for="shutdown">System Shutdown  :</label></th>
    <td><select name="shutdown" id="shutdown" onchange="diffe();">
      <option value="yes">yes</option>
      <option value="no" selected>no</option>
      
    </select>

  </td>
</tr>
  <tr>
          <th><label for="system">System downtime :</label></th>
          <td><input type="text" placeholder="Hours" name="hr" value="0" id="hr" required>
          <label for="system">hours</label>
          <input type="text" placeholder="Minutes" name="min"  value="0" id="min" required>
          <label for="system">min</label></td>

    </tr>
    <tr>
          <th><label for="remark">Remarks(not mandatory) :</label></th>
          <td><input type="text" name="remark" size="30" ></td>
      
    </tr>

    </table>
    
    <button type="submit" class="btn btn-danger btn-large "><a href="display.php" style="text-decoration:none">Back</a></button>
    <button type="reset" class="btn btn-warning btn-large ">Clear</button>                                      
  <button type="submit" class="btn btn-success btn-large " name="submit">Create</button>
  <br>
  <br>
  </form>
  </div>
  </body>
  
  </html>









    

            

