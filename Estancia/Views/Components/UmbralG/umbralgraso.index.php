<?php
include("umbralgraso.struct.php");
?>


<header class="header">
        <div class="cont-100b bkbb flex-f">
            <div class="cont-15 mr-auto"><a href="../User/Perfil" class="wh text-d apple px22">Atras</a></div>
            <div class="cont-50 mr-auto"><h1 class="px36 apple cen wh">Completa las siguientes pruebas</h1></div>
        </div>
    </header>
<br><br><br><br><br><br><br><br>

<body>
    <video muted="muted" id="video" class="hide"></video>
    <input type="hidden" value="<?php echo Init();?>" id="id">
    <p class="px32 bold cen apple">Prueba las muestras de izquierda a derecha. Indica cual de las dos muestras te parecio que contiene mas grasa</p>
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