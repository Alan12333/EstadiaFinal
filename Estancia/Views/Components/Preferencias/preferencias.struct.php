<?php

if(isset($_SESSION['log'])==true)
{
    
    function Init()// Se cargan los funciones o metodos inicialmente
    {
        return $_SESSION['id'];
    }

    function loadlist()
    {
        $id = strval($_SESSION['id']);
        $url = "https://frontera2019.com.mx/Estancia_Api/Prueba/GETPREFCOUNT/$id";
        $res = file_get_contents($url);
        $hola = json_decode($res);
        return $hola->id_lis;
    }

    function LoadModal()
    {
        $id = strval($_SESSION['id']);
        $url = "https://frontera2019.com.mx/Estancia_Api/Prueba/GETPREFCOUNT/$id";
        $res = file_get_contents($url);
        $hola = json_decode($res);
        if($hola->id_lis=='0')
        {
            echo "
                <div class='modal-1' id='modal1'>
                    <br><br><br><br><br><br>
                    <div class='bkw cont-50 mr-auto'>
                        <br>
                        <p class='px22 cen bold apple'>¡Antes de iniciar!</p>
                        <br><br>
                        <p class='px16 cen'>Lee detenidamente las instrucciones, si tienes alguna, pregunta a la persona encargada
                        de aplicarte la prueba.</p><br>
                        <div class='cont-100 mr-12'>
                            <li class='px14 apple'>Otorga los permisos de Camara y microfono</li><br>
                            <li class='px14 apple'>Al finalizar tu prueba, vuelve a iniciar sesion, ya que solo se puede responder una vez por sesion.</li><br>
                            <li class='px14 apple'>Al aplicar la prueba esta se grabara, te pedimos que no des cambios de movimiento bruscos ni gires tu cabeza hacia los cosatados.</li><br>
                            <button class='button center px16 wh bkbb radius-total' onclick='CerrarModal()'>Comprendo y Acepto</button>
                        </div>
                    </div>
                </div>

            ";
            ?>
            <script>
                function CerrarModal(){
                    var modal = document.getElementById("modal1");
                    modal.style.display='none';
                }
            </script>
            <?php
        }
        else
        {

        }
    }
}
else {
    function Init()
    {
        
    }
}
?>

<link rel="stylesheet" href="../public/css/style.css"> 
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prueba Preferencias</title>