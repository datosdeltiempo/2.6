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
<body>
<hr>
<a href="index.php" title="Ir atras" class="btn">Ir atras</a>
<hr>
<h1 class="h1"><strong>Datos de tiempo 2.6</strong></h1>
<h2><img src="mini_logo.ico" width="16" height="15">MAXIMA FM Rio Tercero 97.1 MHz. </h2>
<hr>
<div id="form-div"><font color="#FFFFFF" size="+3"><strong>Configurar</strong></font><br><br>
  <form id="form" name="conf2" method="post" action="">
  <table width="451">
  <tr>
    <th width="176" align="left">Nombre de la radio:</th>
    <td width="12">&nbsp;</td>
   <?php if(empty($lines2["0"])){ $pnombre=$nombre; } else { $pnombre=$lines2["0"];} ?>
    <td><input name="nombre" type="text" onFocus="this.value='<?php echo $pnombre;?>'" onBlur="if(this.value=='')this.value='<?php echo $pnombre;?>'" value="<?php echo $pnombre;?>"/></td>
  </tr>
  <tr>
    <th align="left">Pagina web:</th>
    <td>&nbsp;</td>
    <?php if(empty($lines2["1"])){ $pweb=$web; } else { $pweb=$lines2["1"];} ?>
    <td><input name="web" type="text" onFocus="this.value='<?php echo $pweb;?>'" onBlur="if(this.value=='')this.value='<?php echo $pweb;?>'" value="<?php echo $pweb;?>"/></td>
  </tr>
  <tr>
    <th align="left">Frecuencia</th>
    <td>&nbsp;</td>
    <?php if(empty($lines2["2"])){ $frec=$frecuencia; } else { $frec=$lines2["2"];} ?>
    <td><input name="frecuencia" type="text" onFocus="this.value='<?php echo $frec;?>'" onBlur="if(this.value=='')this.value='<?php echo $frec;?>'" value="<?php echo $frec;?>"/></td>
  </tr>
  <tr>
    <th align="left"><button class="submit" type="submit">Enviar datos</button></th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
</form> 
</div>
<p>&nbsp;</p>
<p><a href="http://www.riotercero.tk/radit.php" target="_blank">Visite nuestra pagina web</a></p>
<hr>
MAXIMA FM 97.1 Rio Tercero, C&oacute;rdoba, Argentina.
</body>
</html>