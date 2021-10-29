<?php
include("Registro_Us.struct.php");
Init();//Se carga la function Principal

if(isset($_SESSION['log'])==true)
{
    ?>
    <script> window.location="https://estanciaupp.000webhostapp.com/Estancia/User/Perfil"; </script>
    <?php
}
else
{
    ?>
     <div class="ale px22 apple" id="Ale">
        <p class="left pointer" onclick="MostrarAlerta()">X</p>
        <br>
        <p id="Mensaje" class="cen "></p>
    </div>
   <body class="fondo">
       <div class="cont-35 backgrounds">
           <br>
            <center>
                <img src="https://estanciaupp.000webhostapp.com/Estancia/public/image/upp.png" alt="" class="img-logo">
            </center>
            <br>
       </div>
        <div class="cont-35 bkw ">
        <form id="form" class="">
         <center>
         <div class="fake_placeholder ">
            <label>
                <span class="varela">Nombre</span>
                <input type="text" name="Nombre" id="Nombre" class="varela in" autocomplete="off" />
            </label>
        </div>
        <br>
        <div class="fake_placeholder">
            <label>
                <span class="varela">Edad</span>
                <input type="text" name="Edad" id="edad" class="varela in" autocomplete="off" />
            </label>
        </div><br>
        <div class="fake_placeholder">
            <label>
                <span class="varela">Cintura</span>
                <input type="text" class="varela in" name="Cintura" id="cintura"  autocomplete="off">
            </label>
        </div><br>
        <div class="fake_placeholder">
            <label>
                <span class="varela">Peso en Kg</span>
                <input type="text" class="varela in" name="Peso" id="peso"  autocomplete="off">
            </label>
        </div><br>
        <div class="fake_placeholder">
            <label>
                <span class="varela">Estatura mts 1.80</span>
                <input type="text" class="varela in" name="Altura" id="estatura"  autocomplete="off">
            </label>
        </div>
        
        <br>
         <select name="Genero" id="genero" class="txtbox-4 apple px17">
            <option value="#" class="px17" disabled>Selecciona</option>
            <option value="Masculino" class="px17">Masculino</option>
            <option value="Femenino" class="px17">Femenino</option>
         </select><br>
         <div class="cont-50 flex-f">
            <input type="checkbox" name="" id="numeros" class="mr-2">
            <p class="px14 apple mr-2 numeros">Tengo un numero</p>
        </div>
        <div class="fake_placeholder hide" id="numero">
            <label>
                <span class="varela">Ingresa tu Numero</span>
                <input type="text" class="varela in" name="numero" id="num" autocomplete="off">
            </label>
        </div> 
        
         <input type="hidden" name="action" id="action" value="POST">
            <button type="submit" class="button cont-50 bkbb wh px17 radius-total">Aceptar</button>
        </center>
        <br>
    </form>
        </div>
   </body>
    <?php
}
?>
   
  
   