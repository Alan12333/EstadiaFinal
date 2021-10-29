<?php
require_once("user.struct.php");
?>
<input type="hidden" id="id" value="<?php Init();?>">

<div class="modal-1 hide" id="modal">
    <br><br>
    <div class="cont-75 bkw mr-auto radius-total apple cen scrolls">
        <h1>Carta de Consentimiento Informado</h1>
        <div class="cont-75 mr-auto">
            <p class="px20">Proyecto: Relación entre genotipos asociados con sensibilidad gustativa a los estímulos amargo y graso, preferencias alimentarias y obesidad. <br><br>
            Responsable técnico. <b>Dr. Jahir Antonio Barajas Ramírez</b></p>
        </div>
        <div class="cont-100 mr-auto">
            Estimado participante:
            <br><br>
            <p class="px16 jus">
                Usted ha sido invitado a participar en el presente estudio, el cual es desarrollado por la Universidad Politécnica de Pénjamo en coordinación con el Centro de Investigación y Asistencia en Tecnología y Diseño del Estado de Jalisco en los estados mexicanos de Guanajuato e Hidalgo.
                Como parte de su participación en este estudio le pediremos que pruebe algunas soluciones preparadas con compuestos químicos que no le ocasionarán daño alguno a la salud. Durante las sesiones de pruebas de sensibilidad gustativa se realizará la adquisición de datos en una plataforma electrónica desarrollada para éste fin. Asimismo, se realizará la toma de grabaciones de videos durante las pruebas con la finalidad de analizar la información contenida en los mismos. Finalmente, los datos serán relacionados con un análisis de la información genética contenida en tres genes posiblemente asociados con esta sensibilidad gustativa y la conformación corporal, por lo que le solicitaremos una muestra de raspado de células bucales para el análisis genético correspondiente.
                Usted no recibirá un pago directo por su participación, sin embargo, estará contribuyendo de forma importante al conocimiento científico de México al proporcionar información valiosa que permitirá establecer asociaciones entre la sensibilidad gustativa, la genética, el estado nutricio y el análisis del comportamiento mediante procesamiento de imágenes. La información obtenida le será proporcionada, si así lo desea, de manera personalizada.
                <br><br>
                Es importante señalar que su nombre permanecerá confidencial ya que los datos recabados serán asociados con una identificación mediante código y por tanto su nombre no se mencionará. Los hallazgos científicos serán potencialmente publicados a nivel internacional, sin embargo, los datos serán analizados y tratados como grupos.
                Su participación en el estudio es completamente voluntaria, es decir, usted no está obligado(a) a permanecer en éste y tiene todo el derecho de negarse a participar sin que esta negativa le traiga consecuencia alguna.
                Si usted tiene alguna pregunta, comentario o preocupación con respecto al proyecto puede comunicarse con el Dr. Jahir Antonio Barajas Ramírez, quien es el investigador responsable del proyecto al correo electrónico <a href="mailto:jabarajas@uppenjamo.edu.mx">jabarajas@uppenjamo.edu.mx</a> en un horario de 15:00 a 20:00 horas.
            </p>
            <br><br><br><button class="button bkbb cont-50 center radius-total px22 wh" onclick="CloseModal()">Aceptar</button>
        </div>
</p>
<br><br><br>
    </div>
</div>

<div class="cont-100 bkbla">
    <div class="cont-50 mr-auto">
        <center>
            <img src="https://www.dzoom.org.es/wp-content/uploads/2017/07/seebensee-2384369-810x540.jpg" alt="" class="round img-2">
            <br>
            <h1 class="px36 sans wh" id="imc"></h1>
        </center>
    </div>
</div>

<div class="cont-100b bkr flex-f">
    <div class="cont-35 bkw mr-auto pointer" id="data">
        <center><div class="icon" id="img1"></div></center>
    </div>
    <div class="cont-35 mr-auto pointer" id="recompensa">
        <center><div class="icon" id="img2"></div></center>
    </div>
    <div class="cont-35 mr-auto pointer" id="Historial">
        <center><div class="icon" id="img3"></div></center>
    </div>
</div>

<section id="Datas">
    <div class="cont-100">
        <br>
        <div class="cont-35 mr-auto">
            <p class="apple px36 cen ">Tu numero es:</p>
            <br>
            <h1 class="px100 apple b21 cen"><?php Init();?></h1>
            <br>
            <a href="../User/Logout" class="text-d"><div class="cont-50  mr-auto px22 button wh apple cen bkbb radius-total">Salir</div></a>
        </div>
    </div>
</section>



<section id="Pruebas" class="hide">
    <div class="ale px22 apple" id="Ale">
        <p class="right pointer wh" onclick="MostrarAlerta()">X</p><br>
        <p id="Mensaje"></p>
    </div>
    <br><br>
    <h1 class="sans px36 cen">PRUEBAS</h1>
    <p class="px16 apple cen">Selecciona una pruba a realizar y ve tu avance de esta prueba.</p>
    <br>
    <div class="cont-50 mr-auto border">
        <center><a id="intensidad" class="text-d"><div class="cont-50 bkbb wh apple button text-d"><p class="px22">Intensidad</p></div></a></center>
        <br>
        <center><div class=" radius-total pad2 wh apple bkbb" id="progress1"></div></center>
    </div>
    <br>
    <div class="cont-50 mr-auto border">
        <center><a href="../Exercise/Agrado" class="text-d"><div class="cont-50 bkg wh apple button text-d"><p class="px22">Agrado</p></div></a></center>
        <br>
        <center><div class=" radius-total pad2 wh apple" id="progress2"></div></center>
    </div>
    <br>
    <div class="cont-50 mr-auto border">
        <center><a  id="botonpref" class="text-d"><div class="cont-50 bko wh apple button text-d"><p class="px22">Preferencias</p></div></a></center>
        <br>
        <center><div class="  radius-total pad2 wh apple" id="progress3"></div></center>
    </div>
    <br>
    <div class="cont-50 mr-auto border">
        <center><a href="../Exercise/UmbralAmargo" class="text-d"><div class="cont-50 bkr wh apple button text-d"><p class="px22">Umbral Amargo</p></div></a></center>
    </div>
    <br>
    <div class="cont-50 mr-auto border">
        <center><a href="../Exercise/UmbralGraso" class="text-d"><div class="cont-50 bkpur wh apple button text-d"><p class="px22">Umbral Graso</p></div></a></center>
    </div>
    <br><br>
</section>
<br><br>
<section id="history" class="hide">
    <div class="cont-75b mr-auto flex-f">
        <div class="cont-25 bkg wh px22 border cen apple"># Visita</div>
        <div class="cont-25 bkg wh px22 border cen apple">Edad</div>
        <div class="cont-25 bkg wh px22 border cen apple">Peso</div>
        <div class="cont-25 bkg wh px22 border cen apple">Altura</div>
    </div>
    <div class="cont-75b mr-auto flex-f">
        <div class="cont-25 bkw bla px22 border"><p class="px22 sans cont-100 cen " id="visita"></p></div>
        <div class="cont-25 bkw bla px22 border"><p class="px22 sans cont-100 cen " id="edad"></p></div>
        <div class="cont-25 bkw bla px22 border"><p class="px22 sans cont-100 cen " id="peso"></p></div>
        <div class="cont-25 bkw bla px22 border"><p class="px22 sans cont-100 cen " id="altura"></p></div>
    </div>
</section>
