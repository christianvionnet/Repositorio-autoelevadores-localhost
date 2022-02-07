<?php

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
//   $sql = "SELECT * FROM tabla3 ORDER BY id DESC LIMIT 1";
//   $result = $conn->query($sql);

//   if ($result->num_rows > 0) 
//   {
//     // output data of each row
//     while($row = $result->fetch_assoc())
//     {
//       if($row["mpo8"] == 0)
//       {
//         echo "<script>window.location = 'http://localhost/avisos/riesgoalto.html'</script>";
//       }
//       else if($row["mpo9"] == 0)
//       {
//           echo "<script>window.location = 'http://localhost/avisos/riesgoalto.html'</script>";
//       }
//       else if($row["mpo10"] == 0)
//       {
//         echo "<script>window.location = 'http://localhost/avisos/riesgoalto.html'</script>";
//       }
//       else if($row["mpo11"] == 0)
//       {
//         echo "<script>window.location = 'http://localhost/avisos/riesgobajo.html'</script>";
//       }
//       else if($row["mpo12"] == 0)
//       {
//         echo "<script>window.location = 'http://localhost/avisos/riesgobajo.html'</script>";
//       }
//       else
//       {
//         echo "<script>window.location = 'http://localhost/avisos/mpofinalizado.html'</script>";
//       }
//     }
//   }
//   else
//   {
//     echo "0 results";
//   }
// }
// $conn->close();

  $serverName = "10.251.225.115";

  $connectionInfo = array("Database"=>"Autoelevadores_test", "UID"=>"ssavoc", "PWD"=>"Argentina2021", "CharacterSet"=>"UTF-8");
  $conn = sqlsrv_connect($serverName, $connectionInfo);

  if( !$conn ) {

    echo "Connection could not be established.<br />";
    die(print_r( sqlsrv_errors(), true));

  } else {

    echo "Connection established.<br />";

    $SELECT = "SELECT TOP 1 * FROM TABLA_MPO_3 ORDER BY id DESC";

    $stmt = sqlsrv_query($conn,$SELECT);
  
    while ($row = sqlsrv_fetch_array($stmt)) {
      
      if ($row > 0) {
        if($row[1] == 0) {
          echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/avisos/riesgoalto.html'</script>";
        } else if ($row[2] == 0) {
          echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/avisos/riesgoalto.html'</script>";
        } else if ($row[3] == 0) {
          echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/avisos/riesgoalto.html'</script>";
        } else if ($row[4] == 0) {
          echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/avisos/riesgobajo.html'</script>";
        } else if ($row[5] == 0) {
          echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/avisos/riesgobajo.html'</script>";
        } else {
          echo "<script>window.location = 'http://SSA1014.global.scd.scania.com/avisos/mpofinalizado.html'</script>";
        }
      } else {
        echo "No hay resultados.";
      }
    }

    $UPDATE = "UPDATE HABILITACION SET habilitado='0'";

    $stmt = sqlsrv_query($conn,$UPDATE);
  }

?>