<?php
include("umbralamargo.struct.php");
?>


<link rel="stylesheet" href="../public/css/style.css"> 
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prueba UmbralAmargo</title>
<header class="header">
        <div class="cont-100b bkbb flex-f">
            <div class="cont-15 mr-auto"><a  class="wh text-d apple px22 pointer" onclick="confirmExit()">Atras</a></div>
            <div class="cont-50 mr-auto"><h1 class="px36 apple cen wh">Completa las siguientes pruebas</h1></div>
        </div>
    </header>
    <div class="modal-1 hide" id="modal">
        <br><br><br><br><br><br>
        <div class="cont-50 bkw mr-auto radius-total">
            <p class="px36 cen apple">¡La prueba ha finalizado con exito!</p><br><br>
            <button class="button center bkg px22 wh cen cont-50" onclick="window.location='https://frontera2019.com.mx/Estancia/User/Perfil'">Aceptar</button>
        </div>
    </div>
<br><br><br><br><br><br><br><br>

<body>
     <video muted="muted" id="video" class="hide"></video>
     <div class="ale px22 apple" id="Ale">
        <p class="left pointer" onclick="MostrarAlerta()">X</p>
        <br>
        <p id="Mensaje" class="cen "></p>
    </div>
    <input type="hidden" value="<?php echo Init();?>" id="id">
    <p class="px32 bold cen apple">Prueba de izquierda a derecha las muestras que se te presentan. Elige la muestra que te parece que es más amarga</p>
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
  <input type="hidden" id="respuesta">
  <input type="hidden" id="id_numero">
  <center><button class="cont-35 mr-auto bkbb wh cen px22 apple button radius-total" id="button">Siguiente</button></center>
</body>