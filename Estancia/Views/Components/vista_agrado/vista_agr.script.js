var id = document.getElementById('id');
var tipo = document.getElementById('tipo');
var buscar = document.getElementById("buscar");
var nuevafecha="";
var button = document.getElementById("accion");
var vertiente="1";
var funcionalidad=false;
var alerta = document.getElementById("Ale");
var mensaje = document.getElementById("Mensaje");

button.addEventListener("click", function()
{
    var cadena = buscar.value;
    var arreglocadena=cadena.split("-");
    fechas(arreglocadena);
    Elegir();
})

buscar.addEventListener("keyup", function(e)
{
    if(e.key=="Enter")
    {
        var cadena = buscar.value;
        var arreglocadena=cadena.split("-");
        fechas(arreglocadena);
        Elegir();
    }
})


function Elegir()
{
    if(funcionalidad==true)
    {
        vertiente="2";
        Filtrado();
    }
    else
    {
        vertiente="1";
        Filtrado();
    }
}
window.addEventListener('load', function(){
   Cargar();
})
function Cargar()
{
    var url = "https://frontera2019.com.mx/Estancia_Api/Prueba/GETAGRRES";
    fetch(url)
    .then(arr=>arr.json())
    .then(data=>{
        alerta.style.webkitTransform="TranslateX(100%)";
       LoadData(data);
    })
    .catch(err=>{
         alerta.style.background="red";
         alerta.style.webkitTransform="TranslateX(0%)";
         alerta.style.transition="1s";
         mensaje.innerText="No hay conexion a Internet, Reconectando";
         
    })
}
function Filtrado()
{
    var datos = new FormData();
    datos.append("action","FILTERINT");
    datos.append("fecha",nuevafecha);
    var url="https://frontera2019.com.mx/Estancia_Api/Prueba/FILTERINT";
    fetch(url,{
        method:"POST",
        body:datos
    })
    .then(arr=>arr.json())
    .then(data=>{
         alerta.style.webkitTransform="TranslateX(100%)";
        LoadData(data);
    })
    .catch(err=>{
        alerta.style.background="red";
         alerta.style.webkitTransform="TranslateX(0%)";
         alerta.style.transition="1s";
         mensaje.innerText="No hay conexion a Internet, Reconectando";
    })
}

function LoadData(data)
{
    for(let item of data)
    {

        if(vertiente==="1")
        {
            console.log("entra")
            var Visita = document.getElementById('visita').innerHTML+=`<p class='px20 pad12'>${item.visita}</p>`;
            var id_Usuario = document.getElementById('id_u').innerHTML+=`<p class='px20 pad12'>${item.id_usuario}</p>`;
            var Calificacion = document.getElementById('calificacion').innerHTML+=`<p class='px20 pad12'>${item.calificacion}</p>`;
            funcionalidad=true;
        }
        else if(vertiente==="2")
        {
            var id_Usuario = document.getElementById('id_u').innerHTML='';
            var Calificacion = document.getElementById('calificacion').innerHTML='';
            var Visita = document.getElementById('visita').innerHTML='';
            funcionalidad=false;
        }
    }
}

function fechas(arreglo)
{   
    var mes="";
    if(arreglo[1]==="01")
    {
        mes="Enero";
    }
    if(arreglo[1]==="02")
    {
        mes="Febrero";
    }
    if(arreglo[1]==="03")
    {
        mes="Marzo";
    }
    if(arreglo[1]==="04")
    {
        mes="Abril";
    }
    if(arreglo[1]==="05")
    {
        mes="Mayo";
    }
    if(arreglo[1]==="06")
    {
        mes="Junio";
    }
    if(arreglo[1]==="07")
    {
        mes="Julio";
    }
    if(arreglo[1]==="08")
    {
        mes="Agosto";
    }
    if(arreglo[1]==="09")
    {
        mes="Septiembre";
    }
    if(arreglo[1]==="10")
    {
        mes="Octubre";
    }
    if(arreglo[1]==="11")
    {
        mes="Noviembre";
    }
    if(arreglo[1]==="12")
    {
        mes="Diciembre";
    }
    nuevafecha=arreglo[2]+"-"+mes+"-"+arreglo[0];
    
}