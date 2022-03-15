<?php

    require_once("connect.php");
    
    if(isset($_POST['submit']))
    {
           
            $executive=$_POST['executive'];
            $shift=$_POST['shift'];
            $tdate=$_POST['date'];
            $bf=$_POST['bf'];
           $apps1=$_POST['apps1'];
            $apps2=$_POST['apps2'];
            $dbs1=$_POST['dbs1'];
            $dbs2=$_POST['dbs2'];
            $dcs1=$_POST['dcs1'];
            $dcs2=$_POST['dcs2'];
            $dev=$_POST['dev'];
            $lab=$_POST['lab'];
            $appstore=$_POST['appstore'];
            $dcstore=$_POST['dcstore'];
            $fire=$_POST['fire'];
            $nw=$_POST['nw'];
            $l2pc=$_POST['l2pc'];
            $bhsi=$_POST['bhsi'];
            $cr=$_POST['cr'];
            $remote=$_POST['remote'];
            $xml=$_POST['xml'];
            $mimic=$_POST['mimic'];
            $l2hmi=$_POST['l2hmi'];
            $l1opc=$_POST['l1opc'];
            $l2service=$_POST['l2service'];
            $l3erp=$_POST['l3erp'];
            $bf1=$_POST['bf1'];
            $temp=(int)$_POST['temp'];
            $acstatus=$_POST['acstatus'];
            $ups=$_POST['ups'];
            $backup=$_POST['backup'];
            $hour=(int)$_POST['hr'];
            $min=(int)$_POST['min'];
            if($_POST['remark'] != '')
            {
                $remark=$_POST['remark'];
            }
            else{
                $remark='#';
            }
            $query="insert into hardware (SHIFT,TDATE,BF,EXECUTIVE,APPS1,APPS2,DBS1,DBS2,DCS1,DCS2,DEV,LAB,APPSTORE,DCSTORE,FIRE,NW,L2PC,BHSI,CR,REMOTE)
            values( '$shift',TO_DATE('$tdate','YYYY-MM-DD'),'$bf','$executive','$apps1','$apps2','$dbs1','$dbs2','$dcs1','$dcs2' , '$dev' , '$lab' , '$appstore' , '$dcstore' , '$fire' , '$nw' , '$l2pc' , '$bhsi' , '$cr' , '$remote')";
            echo $query;
            $stmt = oci_parse ($conn,$query);
            oci_execute($stmt);
            $query1="insert into application_environment (SHIFT,TDATE,BF,XML,MIMIC,L2HMI,L1OPC,L2SERVICE,L3ERP,BF1,TEMP,ACSTATUS,UPS,BACKUP,HOUR,MIN,REMARK) values ('$shift',TO_DATE('$tdate','YYYY-MM-DD'),'$bf','$xml','$mimic','$l2hmi','$l1opc','$l2service','$l3erp','$bf1',$temp,'$acstatus','$ups','$backup',$hour,$min,'$remark')";
            $stmt1 = oci_parse ($conn,$query1);
            oci_execute($stmt1);
            echo $query1;
            
            if($stmt && $stmt1)
            {
                header("location:display.php");
            }
            else
            {
                echo 'Please Check Your Query ';
            }
        
    }
    else
    {
        header("location:index.php");
    }
    


?>





 