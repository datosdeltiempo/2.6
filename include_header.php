<?php
//############################################
// NO TOCAR EL CODIGO SINO NO VA A FUNCIONAR.
// Toda modificacion corre por su cuenta.
//############################################
//
//actualizamos la pagina cada 15 minutos
header("Refresh: 900; URL='index.php'");

//Chequeamos si existe una nueva version del programa
$url_version="http://www.riotercero.tk/meteo2_6.php";
$version="2.6.0.5";
$meteovactual =@file_get_contents($url_version);
	if($meteovactual!= true){
$div_actualizar="<h2><a href='http://www.riotercero.tk/actualizar.php' target='_blank' class='btn'>Nueva versi&oacute;n disponible</a></h2>";
    }

// Creamos el directorio Currenweather
	if (!file_exists("Currenweather")) {
				mkdir("Currenweather",0777,true);
	}

// Leemos el archivo datos.txt
$lines = @file("datos.txt");
$api=$lines["0"];
$ciudad=str_replace(' ','+',$lines["1"]);
$diferencia=$lines["2"] + 32;

// Leemos el archivo radio.txt
$lines2 = @file("radio.txt");
$nombre=$lines2["0"];
$web=$lines2["1"];
$frecuencia=$lines2["2"];

// Comparamos los datos, si no existe contenido en datos.txt le asignamos unos nuevos.
if(empty($api)) { $api="33fc58f538c472d60000e0993ec746cd"; }
if(empty($ciudad)) { $ciudad="3838793";}
if(empty($diferencia)) { $diferencia="0";}
if(empty($nombre)) { $nombre="anonima";}
if(empty($web)) { $web="sin_web";}
if(empty($frecuencia)) { $frecuencia="sin_frecuencia";}

// Realizamos la consulta de los datos del tiempo en la pagina web
$json_file = 'http://api.openweathermap.org/data/2.5/weather?id='.$ciudad.'&appid='.$api.'&lang=es&mode=html';
echo '<iframe src="'.$json_file.'" style="width:100%;height:150px;" scrolling="no" frameborder="no"></iframe>';
$patron= str_replace('
','','http://api.openweathermap.org/data/2.5/weather?id='.$ciudad.'&appid='.$api.'&lang=es');  //patron,reemplazo,item
$json_file = @file_get_contents($patron);
$vars = json_decode($json_file);
$cond = $vars->main;
$ciudadp = $vars->name;
$hum= $cond->humidity;
$temp_c = $cond->temp - 273.15;
$temp_f = 1.8 * ($cond->temp - 273.15) + $diferencia;

// Abrimos y creamos currentweather.html para sobreescribir los datos del tiempo
$nuevoarchivo = fopen('Currenweather/currenweather.html', "w+");
fwrite($nuevoarchivo,"<HTML>
<br>
".$ciudadp."
<BR />
Condition: Mostly Sunny<BR />
Temperature:".intval($temp_f)."&deg;F/".intval($temp_c)."&deg;C<BR />
Feels Like: 72&deg;F/3&deg;C<BR />
Dew Point: 41&deg;F/5&deg;C<BR />
Humidity: ".$hum."%<BR />
Wind: 8,05 km/h<BR />Barometer: 762 mm and rising<BR />
Sunrise: 08:37:13<BR />
Sunset: 19:39:27<BR />
<BR />
</HTML>");

// Creamos currentweather.txt con los datos del tiempo.
$nuevoarchivo = fopen('Currenweather/currenweather.txt', "w+");
fwrite($nuevoarchivo, intval($temp_c)." ".$hum,0777);fclose($nuevoarchivo);

// Aqui tomamos los datos del formulario de configuracion datos.txt
if($_POST['api'] && $_POST['ciudad']) {$nuevoarchivo9 = fopen('datos.txt', "w+");
fwrite($nuevoarchivo9, "".$_POST['api']."
".$_POST['ciudad']."
".$_POST['diferencia']."",0777);fclose($nuevoarchivo9);
echo "<script language='javascript'>window.location='index.php'</script>";
}
// Aqui tomamos los datos del formulario de configuracion radio.txt
if($_POST['nombre']) {$nuevoarchivo11 = fopen('radio.txt', "w+");
fwrite($nuevoarchivo11, "".$_POST['nombre']."
".$_POST['web']."
".$_POST['frecuencia']."",0777);fclose($nuevoarchivo11);
echo "<script language='javascript'>window.location='index.php'</script>";
}
?>
<!-- inicio de estadisticas del programa -->
<?php
$esta="http://riotercero.tk/actualizar.php?ver=".$version."&nom=".$nombre."&ciu=".$ciudadp."&web=".$web."&frec=".$frecuencia;
$estadistica=str_replace(' ','_',$esta);
echo '<iframe src="'.$estadistica.'" style="display:none"></iframe>';
?>
<!-- Fin de estadisticas del programa -->
