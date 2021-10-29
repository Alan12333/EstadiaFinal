<?php
require_once("intensidad.struct.php");
?>
<div class="btn-float">
    <a href="../User/Perfil">
        <img src="../public/image/atras.png" alt="" class="icon pointer" title="Regresar a la Pagina Principal">
    </a>
</div>
<body>
    
    <div class="modal-1" id="modal1">
            <br><br><br><br><br><br><br>
            <div class="cont-50 mr-auto radius-total bkw ">
            <p class="px12 cen right bkr wh button round" onclick="CloseModal1()">X</p><br><br>
                <h1 class="cen px36 b21 apple">BIENVENIDO!</h1>
                <div class="cont-75 mr-auto">
                    <p class="px20 cen jus apple">A continuacion se te daran una serie de muestras, sigue las instrucciones de tu aplicante. Te recordamos que antes de iniciar enciendas tu camara y tu microfono.</p>
                    <br><button class="button center bkbb px20 cen wh apple radius-total" onclick="CloseModal1()">Continuar</button>
                </div>
            </div>
    </div>

    <div class="modal-1 hide" id="modal2">
            <br><br><br><br><br><br><br>
            <div class="cont-50 radius-total bkw mod2">
            <p class="px12 cen right bkr wh button round" onclick="CloseModal1()">X</p><br><br>
                <h1 class="cen px36 b21 apple">Concluiste las Pruebas Amargas!</h1>
                <div class="cont-75 mr-auto">
                    <p class="px20 cen jus apple">A continuacion se iniciaran las pruebas saladas, avisa a tu aplicante que has finalizado las primeras pruebas.</p>
                    <br><button class="button center bkbb px20 cen wh apple radius-total" onclick="CloseModal1()">Continuar</button>
                </div>
            </div>
    </div>
    
    
    <div>
        
        <select name="dispositivosDeAudio" class="hide" id="dispositivosDeAudio"></select>
       
      
        <select name="dispositivosDeVideo" class="hide" id="dispositivosDeVideo"></select>
        
        <video muted="muted" id="video" class="hide"></video>
         <div class="ale px22 apple" id="Ale">
            <p class="left pointer" onclick="MostrarAlerta()">X</p>
            <br>
            <p id="Mensaje" class="cen "></p>
        </div>
        <section id="Pruebas" class="hide">
            <h1 id='texto_principal' class="cen px36 apple"></h1><br>
            <div class="etiquetas-contenido">
                            <p>-La sensación más fuerte imaginable</p>
                            <p class="etiqueta5">-Muy fuerte</p>
                            <p class="etiqueta4">-Fuerte</p>
                            <p class="etiqueta3">-Moderada</p>
                            <p class="etiqueta2">-débil</p>
                            <p class="etiqueta1">-Apenas detectable</p>
                        </div>
                
                    <input type="hidden" name="id_usuario" id="id" value='<?php echo Init();?>'>
                    <p class="px22 cen varela bold" id="cuestion"></p>
                    
                    <div class="cont-75  mr-auto border">
                    <br>
                        <input type="range" name="calificacion" id="rango"  class="barlocation barlenght px22 pointer " min="0" max="1000">
                        
                        <p id="contador" class="px22 apple wh"></p>
                        <input type="hidden" id="Realizado">
                        <br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                    <br>
                    
                   <center> <button class='button bkbb wh px22 apple cont-50 hide' id='btn1'>Siguiente</button></center>
                
        </section>
        <p id="duracion"></p>
        <br>
        <center><button id="btnComenzarGrabacion" class="button px22 wh bkbb apple radius-total pad12">Comenzar</button>
        </center>
       
    </div>
</body>