<?php

     $mpo1 = $_POST["mpo1"];
     $mpo2 = $_POST["mpo2"];

// $host = 'localhost';
// $dbusername = 'root';
// $dbpassword = '';
// $dbname = 'autoelevadores';

// $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
// if(mysqli_connect_error())
// {
//   die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
// }
// else
// {
//   $INSERT = "INSERT INTO tabla1 (mpo1,mpo2) VALUES(?,?)";

//   $stmt=$conn->prepare($INSERT);
//   $stmt->bind_param("ii",$mpo1,$mpo2);
//   $stmt->execute();
  
//   echo "<script>window.location = 'http://localhost/mpo_2.html'</script>";

//   $stmt->close();
//   $conn->close();
// }

     $serverName = "10.251.225.115";

     $connectionInfo = array("Database"=>"Autoelevadores_test", "UID"=>"ssavoc", "PWD"=>"Argentina2021", "CharacterSet"=>"UTF-8");
     $conn = sqlsrv_connect($serverName, $connectionInfo);

     if( !$conn ) {

          echo "Connection could not be established.<br />";
          die(print_r( sqlsrv_errors(), true));

     }else{
          echo "Connection established.<br />";

          $INSERT = "INSERT INTO TABLA_MPO_1 (mpo_1,mpo_2) VALUES(?,?)";

          // PETICION QUE USABA EN CASO QUE USE UNA SOLA TABLA: AUTO_1
          // $INSERT = "INSERT INTO AUTO_1 (mpo_1,mpo_2) VALUES(?,?)";

          $params = array($mpo1,$mpo2);

          $stmt = sqlsrv_query($conn, $INSERT, $params);

          echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/mpo_2.html'</script>";

          $stmt->close();
          $conn->close();
     }

?>