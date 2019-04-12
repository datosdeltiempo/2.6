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
<a href="index.php" title="Ir atras" class="btn">Ir atras</a> <a href="datemisora.php" title="Datos de la emisora" class="btn">Datos de la emisora</a>
<hr>
<h1 class="h1"><strong>Datos de tiempo 2.6</strong></h1>
<h2><img src="mini_logo.ico" width="16" height="15">MAXIMA FM Rio Tercero 97.1 MHz. </h2>
<hr>
<p>Si no sabe la ID de su ciudad haga <a href="http://www.riotercero.tk/3/" target="_blank">click aqui</a>  si es correcta seleccione su ciudad y se descargar&aacute; un archivo &quot;datos.txt&quot; que podr&aacute; adjuntarlo aqui abajo. &quot;Vea en sus descargas&quot;.</p>
<hr>
<?php
$uploadedfileload="true";
$uploadedfile_size=$_FILES['uploadedfile'][size];
echo $_FILES[uploadedfile][name];
if ($_FILES[uploadedfile][size]>20000){ $msg=$msg."El archivo no es el de la configuracion!<BR>";$uploadedfileload="false";}
if ($_FILES[uploadedfile][name] !="datos.txt") { $msg=$msg." Otros archivos no son permitidos<BR>";$uploadedfileload="false";}
$file_name=$_FILES[uploadedfile][name];$add=$file_name;
if($uploadedfileload=="true"){ 
if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
echo "<script language='javascript'>window.location='configurar.php'</script>";}
else{ echo "Error al subir el archivo";}
} else{ echo $msg; }
?>
<form enctype="multipart/form-data" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="20000" />
<input name="uploadedfile" type="file" />
<input type="submit" value="Subir datos.txt" />
</form> 
<br>
<div id="form-div"><font color="#FFFFFF" size="+3"><strong>Configurar</strong></font><br><br>
  <form id="form" name="conf" method="post" action="">
  <table width="451">
  <tr>
    <th width="141" align="left">API:</th>
    <td width="10">&nbsp;</td>
    <td width="284"><input name="api" type="text" onFocus="this.value='<?php echo $api;?>'" onBlur="if(this.value=='')this.value='<?php echo $api;?>'" value="<?php echo $api;?>" required /></td>
  </tr>
  <tr>
    <th align="left">CIUDAD ID:</th>
    <td>&nbsp;</td>
    <?php if(empty($lines["1"])){ $ciu=$ciudad; } else { $ciu=$lines["1"];} ?>
    <td><input name="ciudad" type="text" onFocus="this.value='<?php echo $ciu;?>'" onBlur="if(this.value=='')this.value='<?php echo $ciu;?>'" value="<?php echo $ciu;?>" required /></td>
  </tr>
  <tr>
    <th align="left">Diferencia + o -</th>
    <td>&nbsp;</td>
    <?php if(empty($lines["2"])){ $dife="0"; } else { $dife=$lines["2"];} ?>
    <td><input name="diferencia" type="text" onFocus="this.value='<?php echo $dife;?>'" onBlur="if(this.value=='')this.value='<?php echo $dife;?>'" value="<?php echo $dife;?>" required /> 
      Default: 0</td>
  </tr>
  <tr>
    <th align="left"><button class="submit" type="submit">Obtener datos</button></th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
</form> 
</div>
<strong>Para los usuarios de RADIT</strong> deben de copiar todo el programa, incluyendo carpetas y archivos.
<br>
Sin dejar ningun elemento sin copiar, para luego pegarlo en la siguiente direcci&oacute;n:<br>
<font color='#33CC00'><?php 
$raditdir=str_replace("/","\\",$_SERVER['DOCUMENT_ROOT']."/");
echo $raditdir;?></font><br>
Repuesta: <?php
$raditdira=str_replace("/","\\",$_SERVER['DOCUMENT_ROOT']."/radit.exe");
if (file_exists($raditdira)) {
    echo "<font color='#33CC00'>Radit ya est&aacute; en este directorio, es posible que funcione!</font>";
} else {
    echo "<font color='#FF0000'>Radit no esta en este directorio. Verifique la ubicacion de los archivos.</font>";
}
?>
<hr>
<p><strong>Y para los de ZaraRadio</strong><br>
  En: Herramientas -&gt; Opciones -&gt; HTH -&gt; Importar desde Archivo -&gt;<br>
  <strong>Copiar y Pegar</strong> esta direccion:<br>
<code><font color="#FF3300" size="+1"><?php $zararadio=str_replace("/","\\",$_SERVER['DOCUMENT_ROOT']."/Currenweather/currenweather.html");echo $zararadio;?></font></code> <a href="javascript:void(1);" onClick="seleccionarCode(this,1);">Seleccionar</a><br>Luego-&gt; Aceptar.</p>
<p><a href="http://www.riotercero.tk/radit.php" target="_blank">Visite nuestra pagina web</a></p>
<hr>
MAXIMA FM 97.1 Rio Tercero, C&oacute;rdoba, Argentina.
</body>
</html>
