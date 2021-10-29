<?php
require_once("Results.struct.php");

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
        </div>
    </div>
</header>

<br><br><br>
<br><br><br>
<div class="cont-100">
    <br><br>
    <div class="cont-50 mr-auto border shad">
      
        <div class="cont-100b flex-f">
            <div class="cont-50 mr-auto cen">
                <p class="cen px20 apple">Selecciona resultados</p>
                <select name="" id="filtro1" class="txtbox bksil">
                    <option value="Prueba" class="px20">Prueba</option>
                    <option value="Intensidad" class="px20">Intensidad</option>
                    <option value="Preferencias" class="px20">Preferencias</option>
                    <option value="Agrado" class="px20">Agrado</option>
                    <option value="Amargo" class="px20">Umbral Amargo</option>
                    <option value="Graso" class="px20">Umbral Graso</option>
                </select>
            </div>
            <div class="cont-50 mr-auto cen">
                <p class="cen px20 apple">Selecciona Estado de Usuario</p>
                <select name="" id="estado" class="txtbox bksil">
                    <option value="Estado" class="px20">Estado</option>
                    <option value="No" class="px20">No</option>
                    <option value="Si" class="px20">Si</option>
                </select>
            </div>
        </div>
        <br>
        <div class="cont-100 cen">
            <p class="px17 apple">Filtrar por Numero</p>
            <input type="text" class="txtbox" placeholder="Ingresa el numero de Usuario" id="buscar">
            <input type="hidden" value="" id="paginas">
        </div>
    </div><br>
    <div class="contenedor-load " id="cargar"><div class="loadingio-spinner-double-ring-dz9jfgwtq5u"><div class="ldio-rflbh5yl76i">
        <div></div>
        <div></div>
        <div><div></div></div>
        <div><div></div></div>
    </div></div></div>
    <table id="datos">

    </table>
    <div id="control"></div>
</div>
</body>   