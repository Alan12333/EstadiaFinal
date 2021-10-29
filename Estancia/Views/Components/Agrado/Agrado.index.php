<?php
include("Agrado.struct.php");
Init();
?>

<header class="header">
        <div class="cont-100b bkbb flex-f">
            <div class="cont-15 mr-auto"><a href="../User/Perfil" class="wh text-d apple px22">Atras</a></div>
            <div class="cont-50 mr-auto"><h1 class="px36 apple cen wh">Completa las siguientes Prueba</h1></div>
        </div>
    </header>
<br><br><br><br><br><br><br>
<body>
    
    <div>
        
        <select name="dispositivosDeAudio" class="hide" id="dispositivosDeAudio"></select>
        <br><br>
      
        <select name="dispositivosDeVideo" class="hide" id="dispositivosDeVideo"></select>
        <br><br>
        <div class="ale px22 apple" id="Ale">
            <p class="left pointer" onclick="MostrarAlerta()">X</p>
            <br>
            <p id="Mensaje" class="cen "></p>
        </div>
        <video muted="muted" id="video" class="hide"></video>
        <br><br>
        <section id="Pruebas" class="hide">
            <h1 id='texto_principal' class="cen px36 apple"></h1><br>
                <form id='form'>
                    <input type="hidden" name="id_usuario" id="id" value='<?php echo Init();?>'>
                    <input type="hidden" name="action" value="POSTINT">
                    <div class="cont-75 mr-auto border">
                        <p class="px22 cen varela bold">¿Cuanto te agrado la prueba?</p>
                        <br><br>
                        <input type="range" name="calificacion" id="rango"  class="cont-100 px22 pointer" min="0" max="100">
                        <br><br>
                        <p id="contador" class="px22 cen apple"></p>
                        <input type="hidden" id="Realizado">
                        <input type="hidden" id="fecha" name="fecha">
                    </div>
                    <br>
                    
                   <center> <button class='button bkbb wh px22 apple cont-50 hide' id='btn1'>Siguiente</button></center>
                </form>
        </section>
        <p id="duracion"></p>
        <br>
        <center><button id="btnComenzarGrabacion" class="button px22 wh bkbb apple radius-total pad12">Comenzar</button>
        <button id="btnDetenerGrabacion" name="btnstop" class="button px22 wh bkbb apple radius-total pad12 hide">Finalizar</button>
        </center>
       
    </div>
</body>

</html>