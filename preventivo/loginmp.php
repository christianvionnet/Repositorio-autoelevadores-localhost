<?php

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$host = 'localhost';
$dbusername = 'sysadmin';
$dbpassword = '123456';
$dbname = 'login';

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
if(!$conn)
{
  die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
}


$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '".$usuario."' and contraseña = '".$contraseña."'");
$nr = mysqli_num_rows($query);

if($nr == 1)
{
  header("Location: menump.html");

}
else if ($nr == 0)
{
  header("Location: indexmperror.html");
}

mysqli_free_result($query);
mysqli_close($conn);

?>
