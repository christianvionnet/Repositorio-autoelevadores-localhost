<?php

// $mpo8 = $_POST['mpo8'];
// $mpo9 = $_POST['mpo9'];
// $mpo10 = $_POST['mpo10'];
// $mpo11 = $_POST['mpo11'];
// $mpo12 = $_POST['mpo12'];

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
//   $INSERT = "INSERT INTO tabla3(mpo8, mpo9, mpo10, mpo11, mpo12) VALUES(?,?,?,?,?)";

//   $stmt=$conn->prepare($INSERT);
//   $stmt->bind_param("iiiii",$mpo8,$mpo9,$mpo10,$mpo11,$mpo12);
//   $stmt->execute();
  
//   echo "<script>window.location = 'http://localhost/formulariofinal_1.php'</script>";

//   $stmt->close();
//   $conn->close();
// }

  $mpo8 = $_POST["mpo8"];
  $mpo9 = $_POST["mpo9"];
  $mpo10 = $_POST["mpo10"];
  $mpo11 = $_POST["mpo11"];
  $mpo12 = $_POST["mpo12"];

  $serverName = "10.251.225.115";

  $connectionInfo = array("Database"=>"Autoelevadores_test", "UID"=>"ssavoc", "PWD"=>"Argentina2021", "CharacterSet"=>"UTF-8");
  $conn = sqlsrv_connect($serverName, $connectionInfo);

  if( !$conn ) {

    echo "Connection could not be established.<br />";
    die(print_r( sqlsrv_errors(), true));

  }else{
    echo "Connection established.<br />";

    // PETICION QUE USABA EN CASO QUE USE UNA SOLA TABLA: AUTO_1
    // $UPDATE = "UPDATE AUTO_1 SET [mpo_8] = $mpo8, [mpo_9] = $mpo9, [mpo_10] = $mpo10, [mpo_11] = $mpo11, [mpo_12] = $mpo12";

    $INSERT = "INSERT INTO TABLA_MPO_3 (mpo_8,mpo_9,mpo_10,mpo_11,mpo_12) VALUES(?,?,?,?,?)";
    $params = array($mpo8,$mpo9,$mpo10,$mpo11,$mpo12);
    $stmt = sqlsrv_query($conn, $INSERT, $params);

    // FORMULARIO QUE USABA EN CASO QUE USE UNA SOLA TABLA: AUTO_1
    // echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/formulariofinal_sqlserver.php'</script>";

     echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/formulariofinal_1.php'</script>";
    // $stmt->close();

    $UPDATE = "UPDATE HABILITACION SET habilitado = '1'";
    $stmt = sqlsrv_query($conn, $UPDATE);
    // $stmt->close();

    $UPDATE = "UPDATE NUEVO_TURNO SET activo = '0'";
    $stmt = sqlsrv_query($conn, $UPDATE);
    $stmt->close();


    $conn->close();
  }

?>