<style>
.fondo{
    background-image:url("http://estanciaupp.000webhostapp.com/Estancia/public/image/fondo_error.jpg");
    background-size:cover;
    background-attachment:fixed;
}.icono{width:20px; height:20px;}
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.footer{bottom:0; left:0; right:0}
.img-logo{width:100px; height:40px;}
.header{width: 100%;height: 50px;color: #FFF;position: fixed;top: 0;left: 0;z-index: 100;}
.cont-50{
    width:50%;
}
.line{width:75%; margin:auto; color:silver;}
.mr-auto{
    margin:auto;
}
.cont-100{
    width:100%;
}.cont-35{width:35%;}
.button:hover{
    background:rgb(255, 193, 7);
    transition:1s all ease;
}
.cont-75{width:75%}.mr-12{margin:12px;}
.button{
    width:25%;
    padding:12px;
    background:rgb(149, 43, 140);
    font-size:15px;
    border:0;
    cursor:pointer;
}
.radius-total{border-radius:12px;}
.button2{width:80px;  background:rgb(255, 193, 7);}
.input{
    width:75%;
    padding:12px;
}.px22{font-size:22px;}.pad2{padding:2px;}.pad6{padding:6px;}.pad12{padding:12px;}.text-d{text-decoration:none;}
.apple{
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}.yell{color:yellow;}.cont-50{width:50%;}
.px60{font-size:130px;}.wh{color:white;}.cen{text-align: center;}.flex-f{display:flex;}.bkbla{background:rgb(18, 25, 33);}
</style>
<body class="fondo">
    <header class="header " >
        <div class="cont-100 flex-f" id="header">
            <div class="cont-35 mr-auto pad12">
                <img src="http://estanciaupp.000webhostapp.com/Estancia/public/image/upp.png" alt="" class="img-logo">
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
    <br><br><br><br><br><br><br><br><br><br>
    <div class="cont-50 mr-auto">
        <div class="flex-f mr-auto cont-50">
            <h1 class="apple px60 wh cen">404</h1>
            <h1 class="apple px60 yell cen">&#9888;</h1>
        </div>
        <p class="apple wh px22 cen">Lo sentimos, la pagina que has solicitado no existe.</p>
    </div>
    <br><br>
    <div class="cont-50 mr-auto">
        <div class="cont-75 mr-auto">
            <center>
                <div class="flex-f">
                    <input type="text" class="input" placeholder="Que es lo que buscas?">
                    <button class="button wh apple">Buscar</button>
                </div>
        </center>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="cont-100 bkbla footer">
        <br><br><br><br><br><br>
        <div class="cont-75 mr-auto flex-f">
            <div class="cont-50 mr-auto">
                <img src="http://estanciaupp.000webhostapp.com/Estancia/public/image/upp.png" alt="" class="img-logo"><br><br>
                <p class="wh apple">Mea nibh meis philosophia eu. Duis legimus efficiantur ea sea. Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu. Nihil facilisi indoctum an vix, ut delectus expetendis vis.</p>
            </div>
            <div class="cont-35 mr-auto">
                <br><br>
                <h1 class="px22 wh cen apple">LINKS</h1><br>
                <center>
                <a href="../Estancia" class="wh apple cen text-d pad2">Inicio</a><br><br>
                <a href="Acerca" class="wh apple cen text-d pad2">Acerca</a><br><br>
                <a href="Registro" class="wh apple cen text-d pad2">Registrar</a><br><br>
                <a href="" class="wh apple cen text-d pad2">Contacto</a><br><br>
                </center>
            </div>
            <div class="cont-35 mr-auto">
                <h1 class="wh px22 cen apple">CONTACTANOS</h1>
                <br><br>
                <div class="flex-f">
                    <img src="http://estanciaupp.000webhostapp.com/Estancia/public/image/tel.svg" alt="" class="icono mr-12">
                    <p class="wh apple mr-12">469 209 11 23</p>
                </div><br>
                <div class="flex-f">
                    <img src="http://estanciaupp.000webhostapp.com/Estancia/public/image/mail.svg" alt="" class="icono mr-12">
                    <p class="wh apple mr-12">upp@uppenjamo.edu.mx</p>
                </div>
            </div>
        </div>
        <hr class="line">
        <br><br>
        <div class="cont-75 mr-auto">
            <p class="cen px22 apple wh">©Uppenjamo</p>
        </div>
        <br><br>
    </div>
</body>

<script>
    var head = document.getElementById("header");
    var last_known_scroll_position = 0;
var ticking = false;

function doSomething(scroll_pos) {
    if(scroll_pos>"150")
    {
        head.style.background="rgb(108, 22, 72)";
        head.style.webkitTransition="all 1s";
    }
    else
    {
        head.style.background="transparent"; 
        head.style.webkitTransition="all 1s";
    }
}

window.addEventListener('scroll', function(e) {
  last_known_scroll_position = window.scrollY;
  if (!ticking) {
    window.requestAnimationFrame(function() {
      doSomething(last_known_scroll_position);
      ticking = false;
    });
  }
  ticking = true;
});
  
</script>