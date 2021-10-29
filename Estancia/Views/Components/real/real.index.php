<?php
require_once("real.struct.php");

?>

<header class="header">
    <div class="cont-100 flex-f bkspp" id="header">
        <div class="cont-35 mr-auto pad12">
            <img src="https://frontera2019.com.mx/Estancia/public/image/upp.png" alt="" class="img-logo">
            </div>
                <div class="cont-35 mr-auto pad12"></div>
                <div class="cont-50 pad12 mr-auto">
                    <a href="../Estancia" class="wh apple text-d pad12 px22">Inicio</a>
                    <a href="Acerca" class="wh apple text-d pad12 px22">Acerca</a>
                    <a href="" class="wh apple text-d pad12 px22">Contactanos</a>
                    <a href="Registro" class="wh apple text-d pad6 px22 button2 radius-total">Iniciar Sesion</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="modal-1 hide" id="modal">
    <br><br><br><br><br><br><br>
    <div class="cont-50 mr-auto bkw radius-total cen ">
        <p class="px22 right silver pointer hov-1" onclick="CerrarModal()">X</p>
        <br>
        <p class="px20 cen">Ingresa tu numero Unico</p>
        <br>
        <input type="text" placeholder="Codigo" class="txtbox px20" id="numero">
        <br>
        <button class="center button bkbb px22 wh cont-50 mr-auto" onclick="Validar()">Ingresar</button>
    </div>
</div>
<div class="lat-bar absol fixed">
    <br><br><br><br><br><br>
    <a href="Results" class="text-d">
       <div class="cont-100 hov-1 flex-f">
            <img src="https://frontera2019.com.mx/Estancia/public/image/res.svg" alt="" class="mr-2" style="width: 20px; height:20px;">
            <p class="wh px16 apple">Resultados</p>
        </div>
    </a>
    <a href="AmargoUmbralResult" class="text-d">
       <div class="cont-100 hov-1 flex-f">
            <img src="https://frontera2019.com.mx/Estancia/public/image/umbral.svg" alt="" class="mr-2" style="width: 20px; height:20px;">
            <p class="wh px16 apple mr-2">Umbral Amargo</p>
        </div>
    </a>
    <a href="GrasoUmbralResult" class="text-d">
       <div class="cont-100 hov-1 flex-f">
            <img src="https://frontera2019.com.mx/Estancia/public/image/umbral.svg" alt="" class="mr-2" style="width: 20px; height:20px;">
            <p class="wh px16 apple mr-2">Umbral Graso</p>
        </div>
    </a>
    <a href="PreferenciaResult" class="text-d">
       <div class="cont-100 hov-1 flex-f">
            <img src="https://frontera2019.com.mx/Estancia/public/image/happy.svg" alt="" class="mr-2" style="width: 20px; height:20px;">
            <p class="wh px16 apple mr-2">Preferencias </p>
        </div>
    </a>
    <a href="IntensidadResult" class="text-d">
       <div class="cont-100 hov-1 flex-f">
            <img src="https://frontera2019.com.mx/Estancia/public/image/inten.svg" alt="" class="mr-2" style="width: 20px; height:20px;">
            <p class="wh px16 apple mr-2">Intensidad</p>
        </div>
    </a>
    <a href="AgradoResult" class="text-d">
       <div class="cont-100 hov-1 flex-f">
            <img src="https://frontera2019.com.mx/Estancia/public/image/tube.svg" alt="" class="mr-2" style="width: 20px; height:20px;">
            <p class="wh px16 apple mr-2">Estimulaciones</p>
        </div>
    </a>
    <a href="Updatelist" class="text-d">
       <div class="cont-100 hov-1 flex-f">
            <img src="https://frontera2019.com.mx/Estancia/public/image/list.svg" alt="" class="mr-2" style="width: 20px; height:20px;">
            <p class="wh px16 apple mr-2">Lista Umbrales</p>
        </div>
    </a>
</div>
<br><br><br><br><br><br>
<div class="cont-65 mr-auto shad">
    <section id='step1' class="">
        <p class='px22 cen apple'>Monitoreo de Umbrales</p>
        <br><br>
        <div class='cont-100b flex'>
            <div class='cont-35 mr-auto shad border'>
                <center> <img src='https://frontera2019.com.mx/Estancia/public/image/monitor.jpg' alt='' style='width: 250px; height:200px'></center>
                <br>
                <p class='cen px16 apple'>Ve las respuestas en tiempo real</p><br>
            </div>
            <div class='cont-35 mr-auto shad border'>
                <center> <img src='https://frontera2019.com.mx/Estancia/public/image/ofice.webp' alt='' style='width: 250px; height:200px'></center>
                <br>
                <p class='cen px16 apple'>Accede y monitorea en cualquier momento</p>
            </div>
        </div>
        <br><br>
        <button class='button cont-50 bkbb center wh px22 radius-total' onclick='AbrirModal()'>Iniciar</button>
    </section>

    <section id='step2' class="hide">
       <div id="usuarios" class="cont-100 flex-f">
            
       </div>
       <div class="cont-100" id="resultados">
            <div class="cont-100b flex-f border">
               
            </div>
       </div>
    </section>
</div> 