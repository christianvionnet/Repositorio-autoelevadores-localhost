<?php
 
$activo = $_POST['activo'];

$serverName = "10.251.225.115";

$connectionInfo = array( "Database"=>"Autoelevadores_test", "UID"=>"ssavoc", "PWD"=>"Argentina2021", "CharacterSet"=>"UTF-8");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( !$conn ) {

  echo "Connection could not be established.<br />";
  die( print_r( sqlsrv_errors(), true));

} else {

  $UPDATE = "UPDATE NUEVO_TURNO SET activo = '1'";

  $stmt = sqlsrv_query($conn, $UPDATE);

  echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/index.html'</script>";

}

?>
