<?php
 
// $enable1 = $_POST['enable'];

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

//   $INSERT = "INSERT INTO habilitacion (enable) VALUES(?)";

//   $stmt=$conn->prepare($INSERT);
//   $stmt->bind_param("i",$enable);
//   $stmt->execute();
  
//   echo "<script>window.location = 'http://localhost/scania/mpo_1.html'</script>";

//   $stmt->close();
//   $conn->close();
// }
//  echo "Hola mundo";

$serverName = "10.251.225.115";

$connectionInfo = array( "Database"=>"Autoelevadores_test", "UID"=>"ssavoc", "PWD"=>"Argentina2021", "CharacterSet"=>"UTF-8");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

// $enable1 = $_POST['enable'];


if( !$conn ) {

  echo "Connection could not be established.<br />";
  die( print_r( sqlsrv_errors(), true));

}else{

  echo "Connection established.<br />";

  $SELECT = "SELECT * FROM HABILITACION";

  $stmt = sqlsrv_query($conn,$SELECT);

  $row = sqlsrv_fetch_array($stmt);
  
  if( !$row ) {

    $INSERT = "INSERT INTO HABILITACION (habilitado) VALUES(1)";

    $stmt = sqlsrv_query($conn, $INSERT);

  } else {

    $UPDATE = "UPDATE HABILITACION SET habilitado='1'";

    $stmt = sqlsrv_query($conn,$UPDATE);
  }

  echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/mpo_1.html'</script>";

  $stmt->close();
  $conn->close();
}

?>
