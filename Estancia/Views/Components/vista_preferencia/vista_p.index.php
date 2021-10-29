<?php
require_once("vista_p.struct.php");
?>

<header class="header">
                <div class="cont-100 flex-f bkspp" id="header">
                    <div class="cont-35 mr-auto pad12">
                        <img src="https://estanciaupp.000webhostapp.com/Estancia/public/image/upp.png" alt="" class="img-logo">
                    </div>
                    <div class="cont-35 mr-auto pad12"></div>
                    <div class="cont-50 pad12 mr-auto">
                        <a href="../Estancia" class="wh apple text-d pad12 px22">Inicio</a>
                        <a href="Acerca" class="wh apple text-d pad12 px22">Acerca</a>
                        <a href="" class="wh apple text-d pad12 px22">Contactanos</a>
                        <a href="Registro" class="wh apple text-d pad6 px22 button2 radius-total">Iniciar Sesion</a>
                    </div>
                </div>
            </header>
<br><br><br><br><br>


<body>
    
<div class ="cont-75 roboto mr-auto  ">
        <br><br><br>
        <div class="cont-100">
            <div class="ale px22 apple" id="Ale">
                <br>
                <p id="Mensaje" class="cen "></p>
            </div>
            <center><input type="date" placeholder="Buscar" name="fecha" id="buscar" class="px22 txtbox apple radius-total"></center>
            <center><button id="accion" class="cont-35 bkbb wh px22 pointer radius-total">Buscar</button></center>
        </div>
</div> 
    <div class ="cont-75 roboto mr-auto  ">
        <div class = "cont-100b flex-f bksil rad-le-t rad-ri-t  "> 
            <div class="cont-25 mr-auto ">
               <h1 class = " px22 cen">Numero</h1>  
            
            </div>

            <div class="cont-25 mr-auto ">
               <h1 class = " px22 cen">si gusto</h1>  
            
            </div>

            <div class="cont-25 mr-auto ">
               <h1 class = " px22 cen">no gusto</h1>  
            
            </div>

            <div class="cont-25 mr-auto ">
               <h1 class = " px22 cen">lista</h1>  
            
            </div>
        </div>
        <div class = "cont-100 flex-f border rad-le-b rad-ri-b"> 
            <div class="cont-25 px20 mr-auto cen ">
            <p id="Numero"></p>    
            
            </div>

            <div class="cont-25 px20 mr-auto cen">
                <p id="id_gusto"></p>
            </div>

            <div class="cont-25 px20 mr-auto cen ">
                <p id="id_no_gusto"></p>
            </div>

            <div class="cont-25 px20 mr-auto cen ">
                <p id="Lista"></p>
            </div>
        </div>
    </div> 
    
    </body>   

    
