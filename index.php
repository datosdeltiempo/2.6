<?php @include('include_header.php');?>
<?php 
error_reporting(0);ini_set('error_reporting', E_ALL);error_reporting(0);
//--- deshabilito los errores
?>
<html>
<head>
<title>Datos del tiempo 2.6</title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252" />
<link rel="shortcut icon" href="/mini_logo.ico" type="image/ico">
<link rel="icon" href="/mini_logo.ico" type="image/ico">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="javascript.js"></script>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body onLoad="myFunction()"><hr>
<h1 class="h1"><strong>Datos de tiempo 2.6</strong></h1>
<h2><img src="mini_logo.ico" width="16" height="15">MAXIMA FM Rio Tercero 97.1 MHz. <hr></h2>
<hr><?php echo $div_actualizar;?> <a href="https://home.openweathermap.org/users/sign_up" target="_blank" class="btn">Obtener api</a> <a href="configurar.php" class="btn">Configurar</a><hr>
<br><hr>Esta pagina actualiza los datos cada 15 minutos.<br>
<p><a class="btn" onclick="javascript:window.location.reload();">Actualizar ahora</a></p>
&Uacute;ltima actualizaci&oacute;n fu&eacute; a las: <?php include('include_body.php');?>

<hr>
<a href="http://www.riotercero.tk/radit.php" target="_blank">Visite nuestra pagina web</a> MAXIMA FM 97.1 Rio Tercero, C&oacute;rdoba, Argentina.
</body>
</html>
