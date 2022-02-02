<?php

  $serverName = "10.251.225.115";

  $connectionInfo = array("Database"=>"Autoelevadores_test", "UID"=>"ssavoc", "PWD"=>"Argentina2021", "CharacterSet"=>"UTF-8");
  $conn = sqlsrv_connect($serverName, $connectionInfo);

  if( !$conn ) {

    echo "Connection could not be established.<br />";
    die(print_r( sqlsrv_errors(), true));

  } else {

    echo "Connection established.<br />";

    $SELECT = "SELECT TOP 1 * FROM AUTO_1 ORDER BY id DESC";

    $stmt = sqlsrv_query($conn,$SELECT);
  
    while ($row = sqlsrv_fetch_array($stmt)) {
      if ($row > 0) {
        if($row[1] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgoalto.html'</script>";
        } else if($row[2] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgoalto.html'</script>";
        } else if($row[3] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgoalto.html'</script>";
        } else if ($row[7] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgoalto.html'</script>";
        } else if ($row[4] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgobajo.html'</script>";
        } else if ($row[5] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgobajo.html'</script>";
        } else if ($row[6] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgobajo.html'</script>";
        } else if($row[8] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgoalto.html'</script>";
        } else if ($row[9] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgoalto.html'</script>";
        } else if ($row[10] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgoalto.html'</script>";
        } else if ($row[11] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgobajo.html'</script>";
        } else if ($row[12] == 0) {
          echo "<script>window.location = 'http://localhost/avisos/riesgobajo.html'</script>";
        } else {
          echo "<script>window.location = 'http://localhost/avisos/mpofinalizado.html'</script>";
        }
      } else {
        echo "No hay resultados.";
      }
    }

    $UPDATE = "UPDATE HABILITACION SET habilitado='0'";

    $stmt = sqlsrv_query($conn,$UPDATE);
  }

?>