<?php

   //phpinfo();

   /*
   $serverName = "TRITONII\\SQLEXPRESS,1433"; //serverName\instanceName

   $connectionInfo = array( "Database"=>"elec2008");
   $conn = sqlsrv_connect( $serverName, $connectionInfo);
   
   if( $conn ) {
        echo "Connection established.<br />";
   }else{
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
   }

   return ;


   $serverName = "TRITONII\SQLEXPRESS,1433";
   $connectionOptions = array("Database"=>"elec2008",
       "Uid"=>"sa", "PWD"=>"1q2w3e4r5t");
   $conn = sqlsrv_connect($serverName, $connectionOptions);
   if($conn == false)
       die(FormatErrors(sqlsrv_errors()));

   return ; 
    */
    //serverName\instanceName, portNumber (por defecto es 1433)
    $serverName = "TRITONII\SQLEXPRESS"; 
    $connectionInfo = array( "Database"=>"elec2008", "UID"=>"sa", "PWD"=>"1q2w3e4r5t");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn ) {
        echo "Conexión establecida.<br />";
    }else{
        echo "Conexión no se pudo establecer.<br />";
        die( print_r( sqlsrv_errors(), true));
    }
    $query = "SELECT * FROM ELEC_TECNICOS";
    $res =  sqlsrv_query($conn, $query, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET ));
    if (0 !== sqlsrv_num_rows($res)){
        while ($fila = sqlsrv_fetch_array($res)) {
            echo "Personal: ".utf8_encode($fila['Nom_Tecnico'])." "
                .utf8_encode($fila['Cod_Tecnico'])." "
                .utf8_encode($fila['Cod_Tecnico']);
            echo "<br>";
        }
    }
?>