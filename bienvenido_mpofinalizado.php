<?php
	$conexion=mysqli_connect('localhost','sysadmin','123456','Autoelevadores');
?>

<!DOCTYPE html>

<html>
  <head>
    <title>MPO LINDE R-20 Bienvenida - MPO finalizado</title>

    <meta charset="utf-8" />
    <meta name="author" content="Christian Vionnet" />
    <meta
      name="description"
      content="Mantenimiento por operario autoelevador"
    />
    <meta
      name="keywords"
      content="mantenimiento, operario, autoelevador, linde, scania"
    />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta
      http-equiv="refresh"
      content="10;URL=http://SSA1014.global.scd.scania.com/scania/mpofinalizado.html"
    />

    <link rel="icon" href="/imagen/scania_symbol.png" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://static.scania.com/resources/fonts/scania-sans/scania-sans.css"
    />
  </head>
  <body>
    <div class="body-container">
      <header>
        <div class="header">
          <h1 class="title flex">MPO LINDE E-30</h1>
          <img class="logo flex" alt="logo scania" src="/imagen/scania2.png" />
        </div>
      </header>

      <main class="flex">
        <div class="main">
          <h2 class="welcomeMessage">
            ¡HOLA!
            <?php
            $sql="SELECT nombre FROM usuario_activo";
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)) {
          ?>
            <p><?php echo $mostrar['nombre'] ?></p>
          <?php
            }
          ?>
          </h2>
        </div>
      </main>

      <footer>
        <div class="footer">Scania Argentina © 2021</div>
      </footer>
      <script src="setInterval.js">
      </script>
    </div>
  </body>
</html>
