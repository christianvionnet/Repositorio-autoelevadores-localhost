<?php

// $mpo3 = $_POST['mpo3'];
// $mpo4 = $_POST['mpo4'];
// $mpo5 = $_POST['mpo5'];
// $mpo6 = $_POST['mpo6'];
// $mpo7 = $_POST['mpo7'];

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
//  $INSERT = "INSERT INTO tabla2(mpo3, mpo4, mpo5, mpo6, mpo7) VALUES(?,?,?,?,?)";

//   $stmt=$conn->prepare($INSERT);
//   $stmt->bind_param("iiiii",$mpo3,$mpo4,$mpo5,$mpo6,$mpo7);
//   $stmt->execute();
  
//   echo "<script>window.location = 'http://localhost/mpo_3.html'</script>";

//   $stmt->close();
//   $conn->close();
// }

  $mpo3 = $_POST['mpo3'];
  $mpo4 = $_POST['mpo4'];
  $mpo5 = $_POST['mpo5'];
  $mpo6 = $_POST['mpo6'];
  $mpo7 = $_POST['mpo7'];

  $serverName = "10.251.225.115";

  $connectionInfo = array("Database"=>"Autoelevadores_test", "UID"=>"ssavoc", "PWD"=>"Argentina2021", "CharacterSet"=>"UTF-8");
  $conn = sqlsrv_connect($serverName, $connectionInfo);

  if( !$conn ) {

    echo "Connection could not be established.<br />";
    die(print_r( sqlsrv_errors(), true));

  }else{
    echo "Connection established.<br />";

    // $INSERT = "INSERT INTO TABLA_MPO_2 (mpo_3,mpo_4,mpo_5,mpo_6,mpo_7) VALUES(?,?,?,?,?)";

    $UPDATE = "UPDATE AUTO_1 SET [mpo_3] = $mpo3, [mpo_4] = $mpo4, [mpo_5] = $mpo5, [mpo_6] = $mpo6, [mpo_7] = $mpo7";

    $params = array($mpo3,$mpo4,$mpo5,$mpo6,$mpo7);

    $stmt = sqlsrv_query($conn, $UPDATE, $params);

    echo "<script>window.location = 'http://localhost/mpo_3.html'</script>";

    $stmt->close();
    $conn->close();
  }

?>