<?php
require_once("preferencias.struct.php");
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
$fecha_actual=strftime("%Y-%m-%d");
LoadModal();
?>

<header class="header">
        <div class="cont-100b bkbb flex-f">
            <div class="cont-15 mr-auto"><a href="../User/Perfil" class="wh text-d apple px22">Atras</a></div>
            <div class="cont-50 mr-auto"><h1 class="px36 apple cen wh">Completa las siguientes pruebas</h1></div>
        </div>
    </header>
<br><br><br><br><br><br><br><br>

<body>
    <input type="hidden" id="fecha" value='<?php echo $fecha_actual; ?>'>
    <video muted="muted" id="video" class="hide"></video>
    <div class="ale px22 apple" id="Ale">
            <p class="left pointer" onclick="MostrarAlerta()">X</p>
            <br>
            <p id="Mensaje" class="cen "></p>
        </div>
    <input type="hidden" value="<?php echo Init();?>" id="id">
    <input type="hidden" value="<?php echo loadlist();?>" id="prueba">
    <p class="px22 bold cen apple">Prueba de izquierda a derecha las muestras que se te presentan a continuacion. Selecciona las muestra que prefieres</p>
  <div class="cont-65 flex-f mr-auto">
    <div class=" mr-auto contentcard radius-total shad pointer" id="img1">
        <br><br><br><br><br><br>
        <p class="cen px50 apple wh bold" id="numero1"></p>
        <input type="hidden" id="option1">
    </div>
    <div class=" mr-auto contentcard radius-total shad pointer" id="img2">
        <br><br><br><br><br><br>
        <p class="cen px50 apple wh bold" id="numero2"></p>
        <input type="hidden" id="option2">
    </div>
  </div>
  <center><button class="cont-35 mr-auto bkbb wh cen px22 apple button radius-total" id="button">Siguiente</button></center>
</body>